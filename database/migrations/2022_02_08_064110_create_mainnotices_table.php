<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainnoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainnotices', function (Blueprint $table) {
            $table->id();
            $table->string('subject_ko', 200);
            $table->string('subject_en', 200);
            $table->string('url', 300)->nullable();
            $table->string('link_text_ko', 40)->nullable();
            $table->string('link_text_en', 20)->nullable();
            $table->string('expo_yn', 2);
            $table->string('created_id', 40)->nullable();
            $table->string('updated_id', 40)->nullable();
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
        Schema::dropIfExists('mainnotices');
    }
}
