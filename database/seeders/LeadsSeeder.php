<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LeadsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leads')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone_number' => '123-456-7890',
                'lead_source' => 'Website',
                'status' => 'New',
                'lead_note' => 'Interested in our new product launch.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone_number' => '987-654-3210',
                'lead_source' => 'Referral',
                'status' => 'Contacted',
                'lead_note' => 'Referred by a current customer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'phone_number' => '555-555-5555',
                'lead_source' => 'Social Media',
                'status' => 'Qualified',
                'lead_note' => 'Showed interest in our latest promotions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
