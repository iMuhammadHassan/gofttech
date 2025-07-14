<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('project_title');
            $table->string('main_image')->nullable();
            $table->string('inner_image_1')->nullable();
            $table->string('inner_image_2')->nullable();
            $table->date('date');
            $table->string('domain');
            $table->text('main_description')->nullable();
            $table->text('inner_description_1')->nullable();
            $table->text('inner_description_2')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
}
