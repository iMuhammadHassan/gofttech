<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leaves')->insert([
            'employee_id' => 1, // Ensure this ID exists in your employees table
            'leave_type' => 'Sick Leave',
            'status' => 'Approved',
            'date' => Carbon::now()->toDateString(),
            'reason' => 'Feeling unwell and need rest.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
