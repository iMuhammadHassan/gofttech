<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('assigned_to')->constrained('employees')->onDelete('cascade');
            $table->string('status')->default('Pending');
            $table->text('description');
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
