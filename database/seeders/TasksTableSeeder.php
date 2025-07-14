<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'project_id' => 1, // Ensure this ID exists in your projects table
            'start_date' => Carbon::now()->toDateString(),
            'end_date' => Carbon::now()->addDays(10)->toDateString(), // Example end date
            'assigned_to' => 1, // Ensure this ID exists in your employees table
            'status' => 'Pending',
            'description' => 'Complete the initial setup of the project.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
