<?php

namespace App\Services\FraudCheck\Couriers;

use App\Services\FraudCheck\Contracts\FraudCheckerInterface;
use Illuminate\Support\Facades\Http;

class SteadfastFraudChecker implements FraudCheckerInterface
{
    private string $apiKey;
    private string $secretKey;
    private string $baseUrl = 'https://portal.packzy.com/api/v1';

    public function __construct()
    {
        $this->apiKey    = config('services.steadfast.api_key');
        $this->secretKey = config('services.steadfast.secret_key');
    }

    public function getName(): string
    {
        return 'Steadfast';
    }

    public function check(string $phone): array
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'Api-Key'    => $this->apiKey,
                    'Secret-Key' => $this->secretKey,
                    'Accept'     => 'application/json',
                ])
                ->get("{$this->baseUrl}/fraud_check/{$phone}");

            if (! $response->successful()) {
                return $this->errorResult("Steadfast API error: HTTP {$response->status()}");
            }

            $data = $response->json();

            $total     = intval($data['total_parcels']   ?? 0);
            $delivered = intval($data['total_delivered'] ?? 0);
            $cancelled = intval($data['total_cancelled'] ?? 0);
            $fraudCount = count($data['total_fraud_reports'] ?? []);

            $successRate = $total > 0 ? intval(($delivered / $total) * 100) : 0;
            $cancelRate  = $total > 0 ? intval(($cancelled / $total) * 100) : 0;

            return [
                'courier'       => $this->getName(),
                'total'         => $total,
                'delivered'     => $delivered,
                'cancelled'     => $cancelled,
                'fraud_reports' => $fraudCount,
                'success_rate'  => $successRate,
                'cancel_rate'   => $cancelRate,
                'status'        => $this->resolveStatus($successRate, $cancelRate),
                'error'         => null,
            ];

        } catch (\Exception $e) {
            return $this->errorResult('Connection failed: ' . $e->getMessage());
        }
    }

    /**
     * Determine status badge based on success/cancel rate.
     * good    → success rate >= 70%
     * warning → success rate 40–69%
     * danger  → success rate < 40%
     */
    private function resolveStatus(int $successRate, int $cancelRate): string
    {
        if ($successRate >= 70) return 'good';
        if ($successRate >= 40) return 'warning';
        return 'danger';
    }

    private function errorResult(string $message): array
    {
        return [
            'courier'       => $this->getName(),
            'total'         => 0,
            'delivered'     => 0,
            'cancelled'     => 0,
            'fraud_reports' => 0,
            'success_rate'  => 0,
            'cancel_rate'   => 0,
            'status'        => 'unknown',
            'error'         => $message,
        ];
    }
}
