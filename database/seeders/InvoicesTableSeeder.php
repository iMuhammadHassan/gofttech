<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            'invoice_number' => 'INV-2024-0001',
            'date' => Carbon::now()->toDateString(),
            'due_date' => Carbon::now()->addDays(30)->toDateString(), // Due in 30 days
            'currency' => 'USD',
            'client_id' => 1, // Assuming client_id 1 exists in 'clients' table
            'project_id' => 1, // Assuming project_id 1 exists in 'projects' table
            'bank_id' => 1, // Assuming bank_id 1 exists in 'banks' table
            'thank_you_note' => 'Thank you for your business. Please let us know if you have any questions.',
            'paid_amount' => false, // Invoice is not paid
            'signature' => 'signature_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
