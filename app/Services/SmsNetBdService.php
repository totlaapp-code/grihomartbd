<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsNetBdService
{
    protected static string $apiKey = '';

    public static function getApiKey(): string
    {
        return env('SMS_API_KEY', '755Q8aiV5J2NLEw9nhaEnPf4xK55sUP34qmyzNNI');
    }
    protected static string $endpoint = 'https://api.sms.net.bd/sendsms';

    /**
     * Get real-time SMS balance from sms.net.bd with 3-min cache.
     *
     * @return float|null
     */
    public static function getBalance(): ?float
    {
        try {
            return \Illuminate\Support\Facades\Cache::remember('sms_net_bd_balance', 180, function () {
                $response = Http::timeout(5)->get('https://api.sms.net.bd/user/balance/', [
                    'api_key' => self::getApiKey(),
                ]);
                $data = $response->json();
                if ($response->successful() && isset($data['error']) && $data['error'] === 0 && isset($data['data']['balance'])) {
                    return (float) $data['data']['balance'];
                }
                return null;
            });
        } catch (\Exception $e) {
            Log::warning('Failed to fetch SMS balance: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send an OTP SMS to the customer.
     *
     * @param string $phone   Customer phone number (BD format)
     * @param string $otp     6-digit OTP
     * @param string $invoiceId  Order invoice ID
     * @return bool
     */
    public static function sendOtp(string $phone, string $otp, string $invoiceId): bool
    {
        $status = \App\Models\Information::where('key', 'sms_status_otp')->first()->value ?? 'ON';
        if ($status == 'OFF') {
            Log::info('OTP SMS is turned OFF in settings');
            return false;
        }

        // Normalize phone: ensure it starts with 01
        $phone = preg_replace('/\D/', '', $phone);
        if (strlen($phone) == 13 && str_starts_with($phone, '880')) {
            $phone = '0' . substr($phone, 3);
        }

        $template = \App\Models\Information::where('key', 'sms_template_otp')->first()->value ?? 'Grihomartbd অর্ডার #[invoice_id] নিশ্চিত করতে OTP: [otp_code] (১৫ মিনিট বৈধ)। কাউকে শেয়ার করবেন না।';
        $message = str_replace(['[invoice_id]', '[otp_code]'], [$invoiceId, $otp], $template);

        return self::sendNotification($phone, $message);
    }

    /**
     * Send Order Confirmed SMS to the customer.
     *
     * @param string $phone
     * @param string $invoiceId
     * @param mixed $subTotal
     * @return string 'sent', 'failed', or 'disabled'
     */
    public static function sendOrderConfirmed(string $phone, string $invoiceId, $subTotal): string
    {
        $status = \App\Models\Information::where('key', 'sms_status_confirmed')->first()->value ?? 'ON';
        if ($status == 'OFF') {
            Log::info('Order Confirmed SMS is turned OFF in settings');
            return 'disabled';
        }

        // Normalize phone
        $phone = preg_replace('/\D/', '', $phone);
        if (strlen($phone) == 13 && str_starts_with($phone, '880')) {
            $phone = '0' . substr($phone, 3);
        }

        $template = \App\Models\Information::where('key', 'sms_template_confirmed')->first()->value 
            ?? 'আপনার [invoice_id] নম্বরের অর্ডারটি সফলভাবে কনফার্ম হয়েছে। মোট বিল: [sub_total] টাকা। ধন্যবাদ! - GrihomartBD';
        $message = str_replace(['[invoice_id]', '[sub_total]'], [$invoiceId, (string) $subTotal], $template);

        return self::sendNotification($phone, $message) ? 'sent' : 'failed';
    }

    /**
     * Send Order Shipped / Courier tracking SMS to the customer.
     *
     * @param string $phone
     * @param string $invoiceId
     * @param mixed $subTotal
     * @param string|null $trackingLink
     * @return string 'sent', 'failed', or 'disabled'
     */
    public static function sendOrderShipped(string $phone, string $invoiceId, $subTotal, ?string $trackingLink = ''): string
    {
        $status = \App\Models\Information::where('key', 'sms_status_shipped')->first()->value ?? 'ON';
        if ($status == 'OFF') {
            Log::info('Order Shipped SMS is turned OFF in settings');
            return 'disabled';
        }

        // Normalize phone
        $phone = preg_replace('/\D/', '', $phone);
        if (strlen($phone) == 13 && str_starts_with($phone, '880')) {
            $phone = '0' . substr($phone, 3);
        }

        $template = \App\Models\Information::where('key', 'sms_template_shipped')->first()->value 
            ?? 'আপনার [invoice_id] নম্বরের অর্ডারটি কুরিয়ারে পাঠানো হয়েছে। মোট বিল: [sub_total] টাকা। ট্র্যাকিং লিংক: [tracking_link]';
        $message = str_replace(
            ['[invoice_id]', '[sub_total]', '[tracking_link]'],
            [$invoiceId, (string) $subTotal, (string) ($trackingLink ?? '')],
            $template
        );

        return self::sendNotification($phone, $message) ? 'sent' : 'failed';
    }

    /**
     * Send a general notification SMS.
     *
     * @param string $phone   Customer phone number
     * @param string $message The message body
     * @return bool
     */
    public static function sendNotification(string $phone, string $message): bool
    {
        // Normalize phone: ensure it starts with 01
        $phone = preg_replace('/\D/', '', $phone);
        if (strlen($phone) == 13 && str_starts_with($phone, '880')) {
            $phone = '0' . substr($phone, 3);
        }

        try {
            $response = Http::get(self::$endpoint, [
                'api_key' => self::getApiKey(),
                'msg'     => $message,
                'to'      => $phone,
            ]);

            $body = $response->json();

            if ($response->successful() && isset($body['error']) && $body['error'] === 0) {
                Log::info('Notification SMS sent successfully', ['phone' => $phone]);
                // Invalidate balance cache so balance updates
                \Illuminate\Support\Facades\Cache::forget('sms_net_bd_balance');
                return true;
            }

            Log::warning('Notification SMS failed', ['response' => $body, 'phone' => $phone]);
            return false;

        } catch (\Exception $e) {
            Log::error('Notification SMS exception', ['error' => $e->getMessage(), 'phone' => $phone]);
            return false;
        }
    }
}
