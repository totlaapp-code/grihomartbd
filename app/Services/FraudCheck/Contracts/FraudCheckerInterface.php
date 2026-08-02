<?php

namespace App\Services\FraudCheck\Contracts;

interface FraudCheckerInterface
{
    /**
     * Check fraud data for a given phone number.
     *
     * @param  string  $phone
     * @return array{
     *   courier: string,
     *   total: int,
     *   delivered: int,
     *   cancelled: int,
     *   fraud_reports: int,
     *   success_rate: int,
     *   cancel_rate: int,
     *   status: string,
     *   error: string|null
     * }
     */
    public function check(string $phone): array;

    /**
     * Return the display name of this courier.
     */
    public function getName(): string;
}
