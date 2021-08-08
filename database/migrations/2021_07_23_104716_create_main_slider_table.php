<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_slider', function (Blueprint $table) {
            $table->id();
            $table->integer('queqe');
            $table->longText("photo");
            $table->text("title");
            $table->text("description")->nullable();
            $table->text("button1_link")->nullable();
            $table->text("button2_link")->nullable();
            $table->text("button1_text")->nullable();
            $table->text("button2_text")->nullable();
            $table->integer('button1_active')->default(0);
            $table->integer('button2_active')->default(0);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('main_slider');
    }
}
