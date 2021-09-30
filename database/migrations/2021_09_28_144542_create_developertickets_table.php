<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperticketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developertickets', function (Blueprint $table) {
            $table->id();
            $table->text("title")->nullable();
            $table->text("subject")->nullable();
            $table->text("content");
            $table->text("reply_id")->nullable();
            $table->integer("is_developer")->default(0);
            $table->text('from_id')->nullable();
            $table->text("token");
            $table->integer("is_locked");
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
        Schema::dropIfExists('developertickets');
    }
}
