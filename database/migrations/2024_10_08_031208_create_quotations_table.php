<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->enum('type', ['software', 'cyber', 'social']);
            $table->enum('sub_type', ['web', 'app']);
            $table->integer('number_of_screens')->nullable(); // Required for app
            $table->integer('number_of_pages')->nullable();   // Required for web
            $table->enum('design_category', ['normal', 'best', 'animation']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
