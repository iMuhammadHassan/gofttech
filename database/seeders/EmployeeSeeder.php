<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'employee_name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'), // Encrypt the password
            'gender' => 'Male',
            'dob' => '1990-01-01',
            'department_id' => 1, // Replace with a valid department ID
            'designation_id' => 1, // Replace with a valid designation ID
            'mobile_no' => '1234567890',
            'join_date' => '2023-08-01',
            'picture' => null,
            'address' => '123 Main Street, City, Country',
        ]);
    }
}
