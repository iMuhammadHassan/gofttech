<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('short_code');
            $table->string('project_name');
            $table->date('start_date');
            $table->date('deadline');
            $table->decimal('price', 10, 2);
            
            // Foreign keys
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('member_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');

            $table->text('initial_requirement');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
