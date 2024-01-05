<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    
    public function run(): void
    {
        // Supongamos que deseas crear tres registros ficticios en la tabla "benefists"
         $companyData = [
            [
                'companyName' => 'Get',
                'termination_id' => 1,
                'businessAbout' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxx',
                'fullName' => 'Breiner Bravo',
                'countryCode' => '+1 US',
                 'phoneNumber' => '3202302865',
                'emailAddress' => 'breiner@bravo',

                'status_id' => 1,
                'field_id' => 4,
                
            ],
            [
                'companyName' => 'Simbiotica',
                'termination_id' => 3,
                'parValue' => 10320,
                'AuthorizedShares'=>12,
                'businessAbout' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxx',

                'fullName' => 'Joseph Rodelo',
                'countryCode' => '+1 UK',
                'phoneNumber' => '3202302865',
                'emailAddress' => 'Joseph@Joseph',

                'status_id' => 1,               
                'field_id' => 2,
                
            ],
        ];

        // Loop para crear registros en la tabla "benefists"
        foreach ($companyData as $data) {
            Company::create($data);
        }
    }
}
