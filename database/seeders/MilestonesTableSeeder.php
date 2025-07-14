<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MilestonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('milestones')->insert([
            'project_id' => 1, // Ensure this ID exists in your projects table
            'milestone_name' => 'Initial Design Phase',
            'milestone_delivery_date' => Carbon::now()->addDays(30), // Example delivery date
            'milestone_status' => 'In Progress',
            'description' => 'Completion of initial design phase of the project.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
