<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supongamos que deseas crear tres registros ficticios en la tabla "benefists"
        $planData = [
            [
                'planName' => 'STARTER',
                'planPeriod' => 'M',
                'planPrice' => 49,
                'planDescription' => 'The starting point for an entrepeneur in the USA. Your journey begins here.',
                'feature_id' => 1,
            ],
            [
                'planName' => 'ESSENTIAL',
                'planPeriod' => 'M',
                'planPrice' => 109,
                'planDescription' => 'The plataform and support you need for the US regulations and makert.',
                'feature_id' => 1,
            ],
            [
                'planName' => 'SCALE',
                'planPeriod' => 'M',
                'planPrice' => 419,
                'planDescription' => 'The best package, designed to fully support your company growth.',
                'feature_id' => 1,
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($planData as $data) {
            Plan::create($data);
        }
    }
}
