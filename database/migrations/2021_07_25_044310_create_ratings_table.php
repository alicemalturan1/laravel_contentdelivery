<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->text("content_id");
            $table->integer("rate_ds");//download speed
            $table->integer("rate_ls");//link safety
            $table->integer("rate_ab");//accessibility
            $table->text("message");
            $table->text("user_id")->nullable();
            $table->integer('is_guest')->default(0);
            $table->text("guest_name")->nullable();
            $table->text("guest_email")->nullable();

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
        Schema::dropIfExists('ratings');
    }
}
