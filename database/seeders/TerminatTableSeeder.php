<?php

namespace Database\Seeders;

use App\Models\Termination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terminationData = [
            [
                'terminationName' => 'LLC',
                
            ],
            [
                'terminationName' => 'CORP',
                
            ],
            [
                'terminationName' => 'INC',
                
            ],
            [
                'terminationName' => 'Corporation',
                
            ],
        ];
         foreach ($terminationData as $data) {
            Termination::create($data);
        }
    }
}
