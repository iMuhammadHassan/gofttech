<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClientsTableSeeder extends Seeder
{
    /**
     * Seed the clients table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'salutation' => 'Mr.',
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone_no' => '555-1234',
                'password' => Hash::make('password123'), // Use Hash::make for hashed passwords
                'profile' => 'profile1.jpg',
                'country' => 'USA',
                'note' => 'First client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salutation' => 'Ms.',
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone_no' => '555-5678',
                'password' => Hash::make('password123'),
                'profile' => 'profile2.jpg',
                'country' => 'Canada',
                'note' => 'Second client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ]);
    }
}
