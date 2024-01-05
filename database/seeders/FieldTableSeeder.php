<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Termination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terminationData = [
            [
                'businessArea' => 'Investment/Holding',
                
            ],
            [
                'businessArea' => 'Marketing Services or Consulting',
                
            ],
            [
                'businessArea' => 'Online Sales (E-commerce, Dropshipping, B2B, D2C, etc)',
                
            ],
            [
                'businessArea' => 'Software Development, Technology Services, SaaS, Startups, Online Services, Digital Business',
                
            ],
        ];
         foreach ($terminationData as $data) {
            Field::create($data);
        }
    }
}
