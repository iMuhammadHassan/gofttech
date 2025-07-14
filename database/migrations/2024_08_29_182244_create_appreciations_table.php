<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppreciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appreciations', function (Blueprint $table) {
            $table->id();
            $table->string('award_name');
            $table->decimal('appreciation_amount', 10, 2);
            $table->unsignedBigInteger('employee_id');
            $table->date('date');
            $table->text('summary')->nullable();
            $table->timestamps();
            
            // Foreign key constraint (assuming you have an 'employees' table)
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appreciations');
    }
}
