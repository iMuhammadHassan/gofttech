<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            ['name' => 'Software Engineer'],
            ['name' => 'Project Manager'],
            ['name' => 'Business Analyst'],
            ['name' => 'UX Designer'],
            ['name' => 'QA Tester'],
        ]);
    }
}
