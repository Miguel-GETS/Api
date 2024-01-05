<?php

namespace Database\Seeders;

use App\Models\Bonus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bonusData = [
            [
                'bonusName' => 'DescuentosGets',
                'bonusCode' => '12345678',
                'bonusDescriptions' => 'Este es un bono para los trabajadores de la empresa GET Company',
               
                
            ],
            [
                'bonusName' => 'Bono Familiar',
                'bonusCode' => '12345678',
                'bonusDescriptions' => 'Este es un bono la familia GET Company',
               
                
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($bonusData as $data) {
            Bonus::create($data);
        }
    }
}
