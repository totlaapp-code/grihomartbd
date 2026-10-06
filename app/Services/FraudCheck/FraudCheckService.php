<?php

namespace App\Services\FraudCheck;

use App\Services\FraudCheck\Contracts\FraudCheckerInterface;
use App\Services\FraudCheck\Couriers\SteadfastFraudChecker;

class FraudCheckService
{
    /** @var FraudCheckerInterface[] */
    private array $checkers;

    public function __construct()
    {
        // নতুন courier add করতে হলে শুধু এখানে class টা যোগ করুন
        $this->checkers = [
            new SteadfastFraudChecker(),
            // new RedXFraudChecker(),
            // new PathaoFraudChecker(),
        ];
    }

    /**
     * Run fraud check across all registered couriers.
     *
     * @return array{results: array, summary: array}
     */
    public function check(string $phone): array
    {
        $results       = [];
        $totalReports  = 0;
        $allCategories = [];

        // Ratios are independent percentages — not additive raw counts.
        // We use the first courier that has real ratio data as the summary figures.
        $summaryDelivery = null;
        $summaryCancel   = null;
        $summaryBand     = 'none';
        $summaryRange    = null;

        foreach ($this->checkers as $checker) {
            $result    = $checker->check($phone);
            $results[] = $result;

            if ($result['error'] === null) {
                $totalReports += $result['total_reports'];

                // Merge fraud_categories across couriers (sum per category code).
                foreach ($result['fraud_categories'] as $code => $count) {
                    $allCategories[$code] = ($allCategories[$code] ?? 0) + $count;
                }

                // Use the first courier that has actual ratio data for the summary.
                if ($summaryDelivery === null && $result['delivery_ratio'] !== null) {
                    $summaryDelivery = $result['delivery_ratio'];
                    $summaryCancel   = $result['cancel_ratio'];
                    $summaryBand     = $result['volume_band'];
                    $summaryRange    = $result['volume_range'];
                }
            }
        }

        // Sort fraud categories worst-first (highest count first).
        arsort($allCategories);

        return [
            'results' => $results,
            'summary' => [
                // Pre-computed ratios from the API (null = no finished parcels yet).
                'delivery_ratio'   => $summaryDelivery,
                'cancel_ratio'     => $summaryCancel,
                // Volume information.
                'volume_band'      => $summaryBand,
                'volume_range'     => $summaryRange,
                // Cross-merchant fraud reports.
                'total_reports'    => $totalReports,
                'fraud_categories' => $allCategories,
                // Overall status badge.
                'overall_status'   => $this->resolveOverallStatus($summaryDelivery),
            ],
        ];
    }

    /**
     * Derive an overall status from delivery_ratio.
     * null → unknown (no finished parcels; not a clean record)
     * ≥ 70 → good
     * ≥ 40 → warning
     * < 40 → danger
     */
    private function resolveOverallStatus(?int $deliveryRatio): string
    {
        if ($deliveryRatio === null) return 'unknown';
        if ($deliveryRatio >= 70)   return 'good';
        if ($deliveryRatio >= 40)   return 'warning';
        return 'danger';
    }
}
