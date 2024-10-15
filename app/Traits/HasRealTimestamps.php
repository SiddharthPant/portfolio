<?php

namespace App\Traits;

use DateMalformedStringException;
use Illuminate\Support\Facades\Log;

trait HasRealTimestamps
{
    /**
     * Generate random timestamps for created_at and updated_at columns.
     *
     * @throws DateMalformedStringException
     */
    public function generateTimestamps(string $startDate = '-3 years', string $endDate = 'now'): array
    {
        $created_at = fake()->dateTimeBetween($startDate, $endDate, null);
        $updated_at = clone $created_at;
        $random_days = fake()->numberBetween(1, 30);
        try {
            $updated_at->modify("+$random_days days");
        } catch (DateMalformedStringException $e) {
            Log::error('Failed to modify date: '.$e->getMessage());
            throw $e;
        }

        return [
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
    }
}
