<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supongamos que deseas crear tres registros ficticios en la tabla "benefists"
        $statusData = [
            [
                'statusName' => 'paid',
            ],
            [
                'statusName' => 'under review',
            ],
            [
                'statusName' => 'rejected',
            ],
            [
                'statusName' => 'in progress',
            ],
            [
                'statusName' => 'completed',
            ],

        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($statusData as $data) {
            Status::create($data);
        }
    }
}
