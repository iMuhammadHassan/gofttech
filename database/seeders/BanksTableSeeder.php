<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    /**
     * Seed the banks table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'name' => 'Bank of Example',
                'account_holder' => 'John Doe',
                'account_number' => '123456789',
                'contact_number' => '555-1234',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Bank',
                'account_holder' => 'Jane Smith',
                'account_number' => '987654321',
                'contact_number' => '555-5678',
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ]);
    }
}
