<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'title' => 'Office Supplies',
            'price' => 123.45,
            'purchased_date' => Carbon::now()->toDateString(),
            'category' => 'Stationery',
            'project' => 'Project X',
            'bank' => 'Bank ABC',
            'description' => 'Purchased office supplies including pens, papers, and notebooks.',
            'receipt' => 'receipt123.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
