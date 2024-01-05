<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Database\Seeder;

class StructureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $structureData = [
            [
                'structureName' => 'LLC',
                'Subtitle' => 'Limited Liability Company',
                'Summary' => 'Chosen by 97% of our clients due to its management flexibility and corporate-level tax exemption.',
                'terminationList' => json_encode([
                    'LLC',
                ]),
            ],
            [
                'structureName' => 'CORP',
                'Subtitle' => 'Corporation',
                'Summary' => 'Popular among startups that are raising capital and large-scale operations.',
                'terminationList' => json_encode([
                    'CORP',
                    'INC',
                    'Corporation',
                ]),
            ],
        ];
         foreach ($structureData as $data) {
            Structure::create($data);
        }
    }
}
