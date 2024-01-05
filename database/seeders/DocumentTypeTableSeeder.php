<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bonusData = [
            [
                'documentType' => 'CC',
            ]
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($bonusData as $data) {
            DocumentType::create($data);
        }
    }
}
