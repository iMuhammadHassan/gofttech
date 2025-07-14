<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'name' => 'Basic Package',
                'description' => 'This is a basic package with essential features.',
                'price' => 99.99,
                'image' => 'images/basic-package.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Package',
                'description' => 'This package includes additional features and support.',
                'price' => 199.99,
                'image' => 'images/standard-package.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Package',
                'description' => 'Our premium package with all features and premium support.',
                'price' => 299.99,
                'image' => 'images/premium-package.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
