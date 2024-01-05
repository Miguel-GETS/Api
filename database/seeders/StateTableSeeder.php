<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supongamos que deseas crear tres registros ficticios en la tabla "benefists"
        $stateData = [
            [
                'stateName' => 'DE - Delaware',
                'benefist_id' => 1,
            ],
            [
                'stateName' => 'FL - Florida',
            ],
            [
                'stateName' => 'NM - New Mexico',
                'benefist_id' => 2,
            ],
            [
                'stateName' => 'TX - Texas',
            ],
            [
                'stateName' => 'WY - Wyoming',
            ],

        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($stateData as $data) {
            State::create($data);
        }
    }
}
