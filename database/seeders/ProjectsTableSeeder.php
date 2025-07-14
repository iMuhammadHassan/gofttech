<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            'short_code' => 'PROJ123',
            'project_name' => 'Sample Project',
            'start_date' => Carbon::now()->toDateString(),
            'deadline' => Carbon::now()->addMonths(6)->toDateString(),
            'price' => 1000,
            'department_id' => 1, // Make sure this ID exists in the departments table
            'member_id' => 1,
            'client_id' => 1,     // Make sure this ID exists in the employees table
            'initial_requirement' => 'Initial requirements for the sample project.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
