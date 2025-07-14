<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
            [
                'project_title' => 'Website Redesign',
                'main_image' => 'images/website-redesign-main.jpg',
                'inner_image_1' => 'images/website-redesign-inner1.jpg',
                'inner_image_2' => 'images/website-redesign-inner2.jpg',
                'date' => '2024-01-15',
                'domain' => 'example.com',
                'main_description' => 'A complete redesign of the corporate website for a better user experience and updated branding.',
                'inner_description_1' => 'Focused on improving the UI/UX with a modern design.',
                'inner_description_2' => 'Integrated new functionalities to enhance user engagement.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_title' => 'E-commerce Platform',
                'main_image' => 'images/ecommerce-platform-main.jpg',
                'inner_image_1' => 'images/ecommerce-platform-inner1.jpg',
                'inner_image_2' => 'images/ecommerce-platform-inner2.jpg',
                'date' => '2024-03-20',
                'domain' => 'ecommerce-example.com',
                'main_description' => 'Development of a new e-commerce platform with custom features and secure payment options.',
                'inner_description_1' => 'Designed for scalability and performance.',
                'inner_description_2' => 'Implemented advanced security measures for transactions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_title' => 'Mobile App Development',
                'main_image' => 'images/mobile-app-development-main.jpg',
                'inner_image_1' => 'images/mobile-app-development-inner1.jpg',
                'inner_image_2' => 'images/mobile-app-development-inner2.jpg',
                'date' => '2024-05-10',
                'domain' => 'mobileapp-example.com',
                'main_description' => 'Creation of a cross-platform mobile app for both iOS and Android with user-friendly features.',
                'inner_description_1' => 'Focus on responsive design and smooth performance.',
                'inner_description_2' => 'Includes integration with third-party services and APIs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
