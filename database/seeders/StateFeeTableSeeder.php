<?php

namespace Database\Seeders;

use App\Models\StateFee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateFeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supongamos que deseas crear tres registros ficticios en la tabla "benefists"
        $stateFeeData = [
            [
                'state_id' => 1,
                'structure_id' => 1,
                'feePrice' => 110.00,
            ],
            [
                'state_id' => 1,
                'structure_id' => 2,
                'feePrice' => 109.00,
            ],
            [
                'state_id' => 2,
                'structure_id' => 1,
                'feePrice' => 125.00,
            ],
            [
                'state_id' => 2,
                'structure_id' => 2,
                'feePrice' => 70.00,
            ],
            [
                'state_id' => 3,
                'structure_id' => 1,
                'feePrice' => 51.95,
            ],
            [
                'state_id' => 3,
                'structure_id' => 2,
                'feePrice' => 100.00,
            ],
            [
                'state_id' => 4,
                'structure_id' => 1,
                'feePrice' => 300.00,
            ],
            [
                'state_id' => 4,
                'structure_id' => 2,
                'feePrice' => 300.00,
            ],
            [
                'state_id' => 5,
                'structure_id' => 1,
                'feePrice' => 102.00,
            ],
            [
                'state_id' => 5,
                'structure_id' => 2,
                'feePrice' => 102.00,
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($stateFeeData as $data) {
            StateFee::create($data);
        }
    }
}
