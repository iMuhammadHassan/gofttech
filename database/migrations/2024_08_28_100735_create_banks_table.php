<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Bank Name
            $table->string('account_holder'); // Account Holder Name
            $table->string('account_number'); // Account Number
            $table->string('contact_number'); // Contact Number
            $table->enum('status', ['Active', 'Inactive']); // Status
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
