<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'Engineering'],
            ['name' => 'Marketing'],
            ['name' => 'Sales'],
            ['name' => 'HR'],
            ['name' => 'Finance'],
        ]);
    }
}
