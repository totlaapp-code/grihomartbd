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
}
