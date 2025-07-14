<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('lead_name');
            $table->date('valid_till');
            $table->string('currency');
            $table->string('project');
            $table->decimal('amount', 15, 2);
            $table->text('description');
            $table->string('signature');
            $table->string('customer_signature')->nullable(); // Make customer_signature nullable
            $table->text('thank_you_note');
            $table->boolean('require_customer_signature')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
