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
                ->get("{$this->baseUrl}/fraud_check/score/{$phone}");

            if (! $response->successful()) {
                return $this->errorResult("Steadfast API error: HTTP {$response->status()}");
            }

            $data = $response->json();

            // delivery_ratio and cancellation_ratio are pre-computed whole-percent values
            // from the API. They are null (not 0) when no parcels have finished yet.
            // Null means "unknown" — do NOT treat it as a clean record.
            $deliveryRatio     = array_key_exists('delivery_ratio', $data)     ? ($data['delivery_ratio']     !== null ? intval($data['delivery_ratio'])     : null) : null;
            $cancellationRatio = array_key_exists('cancellation_ratio', $data) ? ($data['cancellation_ratio'] !== null ? intval($data['cancellation_ratio']) : null) : null;

            // Volume info — volume_range is null when no parcels have finished.
            $volumeBand  = $data['volume_band']  ?? 'none';
            $volumeRange = $data['volume_range'] ?? null;

            // Cross-merchant fraud reports.
            $totalReports    = intval($data['total_reports'] ?? 0);
            $fraudCategories = $data['fraud_categories'] ?? [];

            // Scoring is permanently disabled; score/level are always null per API spec.
            $scoringDisabled = (bool) ($data['scoring_disabled'] ?? true);

            // Status badge derived from delivery_ratio (null → unknown).
            $status = $this->resolveStatus($deliveryRatio);

            return [
                'courier'          => $this->getName(),
                // Pre-computed ratios from the API (null = no finished parcels).
                'delivery_ratio'   => $deliveryRatio,
                'cancel_ratio'     => $cancellationRatio,
                // Volume information.
                'volume_band'      => $volumeBand,
                'volume_range'     => $volumeRange,
                // Cross-merchant fraud reports.
                'total_reports'    => $totalReports,
                'fraud_categories' => $fraudCategories,
                // Scoring disabled; kept for forward compatibility.
                'scoring_disabled' => $scoringDisabled,
                'status'           => $status,
                'error'            => null,
            ];

        } catch (\Exception $e) {
            return $this->errorResult('Connection failed: ' . $e->getMessage());
        }
    }

    /**
     * Determine a status badge from the API's delivery_ratio.
     *
     * null → unknown  (no finished parcels; do NOT render as clean)
     * ≥ 70 → good
     * ≥ 40 → warning
     * < 40 → danger
     */
    private function resolveStatus(?int $deliveryRatio): string
    {
        if ($deliveryRatio === null) return 'unknown';
        if ($deliveryRatio >= 70)   return 'good';
        if ($deliveryRatio >= 40)   return 'warning';
        return 'danger';
    }

    private function errorResult(string $message): array
    {
        return [
            'courier'          => $this->getName(),
            'delivery_ratio'   => null,
            'cancel_ratio'     => null,
            'volume_band'      => 'none',
            'volume_range'     => null,
            'total_reports'    => 0,
            'fraud_categories' => [],
            'scoring_disabled' => true,
            'status'           => 'unknown',
            'error'            => $message,
        ];
    }
}
