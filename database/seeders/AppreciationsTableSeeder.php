<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppreciationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appreciations')->insert([
            [
                'award_name' => 'Employee of the Month',
                'appreciation_amount' => 500.00,
                'employee_id' => 1,
                'date' => Carbon::now(),
                'summary' => 'Outstanding performance and dedication',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
