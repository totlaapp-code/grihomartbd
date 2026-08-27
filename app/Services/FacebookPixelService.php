<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacebookPixelService
{
    /**
     * Send a Conversion API event to Facebook.
     *
     * @param string $eventName
     * @param array $userData
     * @param array $customData
     * @param string|null $eventId
     * @return void
     */
    public static function sendCapiEvent($eventName, $userData = [], $customData = [], $eventId = null)
    {
        $accessToken = config('services.facebook.capi_token');
        $pixelId = config('services.facebook.pixel_id');
        
        if (!$accessToken || !$pixelId) {
            return;
        }

        // Set standard client parameters if not already set
        if (!isset($userData['client_ip_address'])) {
            $userData['client_ip_address'] = request()->ip();
        }
        if (!isset($userData['client_user_agent'])) {
            $userData['client_user_agent'] = request()->userAgent();
        }

        // Retrieve Facebook cookies if available
        if (request()->hasCookie('_fbp')) {
            $userData['fbp'] = request()->cookie('_fbp');
        }
        if (request()->hasCookie('_fbc')) {
            $userData['fbc'] = request()->cookie('_fbc');
        }

        $eventData = [
            'data' => [
                [
                    'event_name' => $eventName,
                    'event_time' => time(),
                    'event_source_url' => url()->current(),
                    'action_source' => 'website',
                    'user_data' => $userData,
                    'custom_data' => $customData,
                    'event_id' => $eventId,
                ]
            ],
        ];

        $testEventCode = config('services.facebook.test_event_code');
        if (!empty($testEventCode)) {
            $eventData['test_event_code'] = $testEventCode;
        }

        try {
            $response = Http::post("https://graph.facebook.com/v20.0/{$pixelId}/events?access_token={$accessToken}", $eventData);
            Log::info('FB CAPI event sent successfully', [
                'event' => $eventName,
                'response' => $response->body(),
                'status' => $response->status()
            ]);
        } catch (\Exception $e) {
            Log::error('FB CAPI event failed to send', [
                'event' => $eventName,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Send a CAPI Purchase event for a specific Order instance (e.g. on Ready to Ship status).
     * Guaranteed to execute only once using order's is_pixel_fired column.
     *
     * @param \App\Models\Order $order
     * @return bool
     */
    public static function sendOrderPurchaseEvent($order)
    {
        if (!$order || $order->is_pixel_fired) {
            return false;
        }

        $customer = $order->customers ?: \App\Models\Customer::where('order_id', $order->id)->first();
        $orderProducts = ($order->orderproducts && $order->orderproducts->count() > 0)
            ? $order->orderproducts
            : \App\Models\Orderproduct::where('order_id', $order->id)->get();

        $phone = $customer ? preg_replace('/\D/', '', $customer->customerPhone ?? '') : '';
        if (strlen($phone) == 11 && strpos($phone, '01') === 0) {
            $phone = '88' . $phone;
        }

        $customerName = $customer ? trim($customer->customerName ?? '') : '';

        // External ID — highest impact parameter (+15.68% conversions match quality)
        $externalId = $customer ? (string) $customer->id : (string) $order->id;
        $userData = [
            'country'     => [hash('sha256', 'bd')],
            'external_id' => [hash('sha256', $externalId)],
        ];

        if (!empty($phone)) {
            $userData['ph'] = [hash('sha256', $phone)];
        }

        if (!empty($customerName)) {
            $nameParts = explode(' ', strtolower($customerName));
            $userData['fn'] = [hash('sha256', $nameParts[0])];
            if (count($nameParts) > 1) {
                $userData['ln'] = [hash('sha256', end($nameParts))];
            }
        }

        if ($customer && !empty($customer->customerEmail)) {
            $userData['em'] = [hash('sha256', strtolower(trim($customer->customerEmail)))];
        }

        // City detection — city_id=null usually means "Inside Dhaka" delivery
        $cityName = null;
        if ($order->city_id) {
            // city_id is set (Outside Dhaka / other cities)
            if ($order->relationLoaded('cities') && $order->cities) {
                $cityName = $order->cities->cityName;
            } else {
                $city = \App\Models\City::find($order->city_id);
                if ($city) {
                    $cityName = $city->cityName;
                }
            }
        } elseif ($order->zone_id) {
            // zone_id exists — look up zone → city
            $zone = \App\Models\Zone::find($order->zone_id);
            if ($zone && $zone->city_id) {
                $city = \App\Models\City::find($zone->city_id);
                $cityName = $city ? $city->cityName : 'dhaka';
            } else {
                $cityName = 'dhaka'; // zone found but no city_id → still Dhaka
            }
        } else {
            // no city_id, no zone_id → Inside Dhaka (default)
            $cityName = 'dhaka';
        }

        if (!empty($cityName)) {
            $userData['ct'] = [hash('sha256', strtolower(trim(preg_replace('/[^a-zA-Z]/', '', $cityName))))];
        }

        $contentIds = [];
        $contents = [];
        if ($orderProducts) {
            foreach ($orderProducts as $op) {
                $contentIds[] = (string) $op->product_id;
                $contents[] = [
                    'id' => (string) $op->product_id,
                    'quantity' => (int) $op->quantity,
                    'item_price' => (float) $op->productPrice,
                ];
            }
        }

        $totalAmount = (float) ($order->subTotal + ($order->vat ?? 0));

        $customData = [
            'currency' => 'BDT',
            'value' => $totalAmount,
            'content_type' => 'product',
        ];

        if (!empty($contentIds)) {
            $customData['content_ids'] = $contentIds;
            $customData['contents'] = $contents;
        }

        $eventId = 'TRX45324' . ($order->id ?? $order->invoiceID);

        self::sendCapiEvent('Purchase', $userData, $customData, $eventId);

        $order->is_pixel_fired = true;
        $order->save();

        return true;
    }
}
