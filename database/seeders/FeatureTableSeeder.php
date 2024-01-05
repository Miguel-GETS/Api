<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $featuresData = [
            [
                'forCompInUS' => json_encode([
                    'LLC or Corporation Registration in your State (+ state fees)' => true,
                    'EIN Application with the IRS' => true,
                    'Post Formation Documents Templates' => true,
                    
                ]),
                'forEntInUS' => json_encode([
                    'State Amendment to update address and Registered Agent' => true,
                    'IRS request to update address' => true,
                                    
                ]),
                'features' => json_encode([
                    'Virtual Address with mail scanning' => true,
                    'Registered Agent' => true,
                    'Business Bank Account (*Subject to approval)' => true,
                    'Post-Formation Documents' => true,
                    'Compliance Calendar' => true,
                    'Named Account Executive' => false,
                ]),
                'bookingAndTaxes' => json_encode([
                    'Call with Tax Advisor' => false,
                    'Annual Report or Franchise Tax (State Renewal)' => false,
                    'Business Income Tax Return' => false,
                    'Monthly Bookkeeping and Tax Support' => false,
                    'Accounting Software License Included (Xero)' => false,
                    'Sales Tax/Resale Tax Application and Returns' => false,
                    
                ]),
                'bussinessDissolution' => json_encode([
                    'If you decide to close your business, we have you covered' => 'text',
                    'State Dissolution (+ state fees)' => false,
                    'Final Income Tax or EIN Cancelation' => false,
                    
                ]),
                'ADD_ONS' => json_encode([
                    'ITIN Application ($250/member)' => true,
                    'Individual Income Tax Return ($150/partner)' => false,
                ]),
            ],
            
            
        ];

        // Loop para crear registros en la tabla "features"
        foreach ($featuresData as $data) {
            
            Feature::create($data);
        }

    }
}