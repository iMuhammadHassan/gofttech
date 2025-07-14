<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proposals')->insert([
            'lead_name' => 'John Doe',
            'valid_till' => Carbon::now()->addDays(30)->toDateString(), // Valid for 30 days from now
            'currency' => 'USD',
            'project' => 'New Website Development',
            'amount' => 5000.00,
            'description' => 'Proposal for the development of a new website, including design and backend development.',
            'signature' => 'john_doe_signature.png',
            'customer_signature' => null, // Assuming the customer signature is not provided yet
            'thank_you_note' => 'Thank you for considering our proposal. We look forward to working with you.',
            'require_customer_signature' => true, // Indicates that a customer signature is required
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
