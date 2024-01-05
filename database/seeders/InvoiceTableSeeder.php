<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invoiceData = [
            [
                'total' => 20222,

                'holderName' => 'Breiner',
                'holderLastName' => 'Bravo Blanquicet',
                'holderEmail' => 'breiner@breiner',
                'holderDocument' => '0000000',
                'document_type_id'=>1,
                'bonus_id' => 1,
                'payment_id' => 1,
                'company_id' => 1,
                'plan_id' => 1,
                'state_fee_id' => 1,
            ],
            [
                'total' => 20222,

                'holderName' => 'Joseph',
                'holderLastName' => 'Rebodelo Gusman',
                'holderEmail' => 'breiner@breiner',
                'holderDocument' => '11111111',
                'document_type_id'=>1,
                'payment_id' => 1,
                'company_id' => 1,
                'plan_id' => 3,
                'state_fee_id' => 6,
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($invoiceData as $data) {
            Invoice::create($data);
        }
        //'plan_id' => 1,
        //'state_fee_id' => 1,
    }
}
