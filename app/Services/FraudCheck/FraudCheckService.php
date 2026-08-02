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
        $results = [];
        $totalParcels   = 0;
        $totalDelivered = 0;
        $totalCancelled = 0;
        $totalFrauds    = 0;

        foreach ($this->checkers as $checker) {
            $result    = $checker->check($phone);
            $results[] = $result;

            if ($result['error'] === null) {
                $totalParcels   += $result['total'];
                $totalDelivered += $result['delivered'];
                $totalCancelled += $result['cancelled'];
                $totalFrauds    += $result['fraud_reports'];
            }
        }

        $overallSuccess = $totalParcels > 0
            ? intval(($totalDelivered / $totalParcels) * 100)
            : 0;

        $overallCancel  = $totalParcels > 0
            ? intval(($totalCancelled / $totalParcels) * 100)
            : 0;

        return [
            'results' => $results,
            'summary' => [
                'total_parcels'   => $totalParcels,
                'total_delivered' => $totalDelivered,
                'total_cancelled' => $totalCancelled,
                'total_frauds'    => $totalFrauds,
                'success_rate'    => $overallSuccess,
                'cancel_rate'     => $overallCancel,
                'overall_status'  => $this->resolveOverallStatus($overallSuccess),
            ],
        ];
    }

    private function resolveOverallStatus(int $successRate): string
    {
        if ($successRate >= 70) return 'good';
        if ($successRate >= 40) return 'warning';
        return 'danger';
    }
}
