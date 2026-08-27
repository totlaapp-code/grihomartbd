<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsNetBdService
{
    protected static string $apiKey = '755Q8aiV5J2NLEw9nhaEnPf4xK55sUP34qmyzNNI';
    protected static string $endpoint = 'https://api.sms.net.bd/sendsms';

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
        // Normalize phone: ensure it starts with 01
        $phone = preg_replace('/\D/', '', $phone);
        if (strlen($phone) == 13 && str_starts_with($phone, '880')) {
            $phone = '0' . substr($phone, 3);
        }

        $template = \App\Models\Information::where('key', 'sms_template_otp')->first()->value ?? 'Grihomartbd অর্ডার #[invoice_id] নিশ্চিত করতে OTP: [otp_code] (১৫ মিনিট বৈধ)। কাউকে শেয়ার করবেন না।';
        $message = str_replace(['[invoice_id]', '[otp_code]'], [$invoiceId, $otp], $template);

        try {
            $response = Http::get(self::$endpoint, [
                'api_key' => self::$apiKey,
                'msg'     => $message,
                'to'      => $phone,
            ]);

            $body = $response->json();

            if ($response->successful() && isset($body['error']) && $body['error'] === 0) {
                Log::info('OTP SMS sent successfully', ['phone' => $phone, 'invoice' => $invoiceId]);
                return true;
            }

            Log::warning('OTP SMS failed', ['response' => $body, 'phone' => $phone]);
            return false;

        } catch (\Exception $e) {
            Log::error('OTP SMS exception', ['error' => $e->getMessage(), 'phone' => $phone]);
            return false;
        }
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
                'api_key' => self::$apiKey,
                'msg'     => $message,
                'to'      => $phone,
            ]);

            $body = $response->json();

            if ($response->successful() && isset($body['error']) && $body['error'] === 0) {
                Log::info('Notification SMS sent successfully', ['phone' => $phone]);
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
