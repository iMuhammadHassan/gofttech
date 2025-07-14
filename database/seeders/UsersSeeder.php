<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 3 admins
        DB::table('users')->insert([
            [
                'name' => 'Admin One',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password'),
                'role' => 1, // Admin
            ],
            [
                'name' => 'Admin Two',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password'),
                'role' => 1, // Admin
            ],
            [
                'name' => 'Admin Three',
                'email' => 'admin3@example.com',
                'password' => Hash::make('password'),
                'role' => 1, // Admin
            ],
        ]);

        // Create 3 employees
        DB::table('users')->insert([
            [
                'name' => 'Employee One',
                'email' => 'employee1@example.com',
                'password' => Hash::make('password'),
                'role' => 2, // Employee
            ],
            [
                'name' => 'Employee Two',
                'email' => 'employee2@example.com',
                'password' => Hash::make('password'),
                'role' => 2, // Employee
            ],
            [
                'name' => 'Employee Three',
                'email' => 'employee3@example.com',
                'password' => Hash::make('password'),
                'role' => 2, // Employee
            ],
        ]);

        // Create 3 clients
        DB::table('users')->insert([
            [
                'name' => 'Client One',
                'email' => 'client1@example.com',
                'password' => Hash::make('password'),
                'role' => 3, // Client
            ],
            [
                'name' => 'Client Two',
                'email' => 'client2@example.com',
                'password' => Hash::make('password'),
                'role' => 3, // Client
            ],
            [
                'name' => 'Client Three',
                'email' => 'client3@example.com',
                'password' => Hash::make('password'),
                'role' => 3, // Client
            ],
        ]);
    }
}

