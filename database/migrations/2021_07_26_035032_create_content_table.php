<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->text("category_id");
            $table->text("preview_photo")->nullable();
            $table->text("big_photo")->nullable();
            $table->integer("photo_requirement")->default(1);
            $table->integer("is_active")->default(1);
            $table->bigInteger('downlaod_count');
            $table->text("size")->default("Bilinmiyor");
            $table->longText("description")->nullable();
            $table->bigInteger("like_count")->default(0);
            $table->bigInteger('disslike_count')->default(0);
            $table->text("link");
            $table->integer("download_channel")->default(0);
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
        Schema::dropIfExists('content');
    }
}
