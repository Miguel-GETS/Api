<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BenefistsTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(StructureTableSeeder::class);
        $this->call(StateFeeTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(TerminatTableSeeder::class);
        $this->call(FieldTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(BonusTableSeeder::class);
        $this->call(DocumentTypeTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);

    }
}
