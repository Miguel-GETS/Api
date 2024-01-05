<?php

namespace Database\Seeders;

use App\Models\Benefist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supongamos que deseas crear tres registros ficticios en la tabla "benefists"
        $benefistsData = [
            [
                'benefistName' => 'EXPRESS PROCESS',
                'benefistPrice' => 50.00,
            ],
            [
                'benefistName' => 'PRIVATE OWNERSHIP INFORMATION',
                'benefistPrice' => 0.0,
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($benefistsData as $data) {
            Benefist::create($data);
        }
    }
}
