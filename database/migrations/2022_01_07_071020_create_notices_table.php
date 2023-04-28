<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('news_gubun', 2);
            $table->string('subject', 300);
            $table->longText('content')->nullable();
            $table->string('expo_yn', 2)->nullable();
            $table->Integer('image_id');
            $table->Integer('attach_id');
            $table->string('created_id', 40)->nullable();
            $table->string('updated_id', 40)->nullable();
            $table->string('youtube_url', 200)->nullable();
            $table->string('shortcut_nm', 50)->nullable();
            $table->string('shortcut_url', 200)->nullable();
            $table->string('shortcut_expo_yn', 2)->nullable();
            $table->string('useflag', 2)->nullable();
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
        Schema::dropIfExists('notices');
    }
}
