<?php

namespace Database\Seeders;

use App\Models\Bonus;
use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bonusData = [
            [
                'RolName' => 'Client',
            ],
            [
                'RolName' => 'Admin',
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($bonusData as $data) {
            Rol::create($data);
        }
    }
}
