<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('msg_acc', 2);
            $table->string('key_msg_ko', 200);
            $table->string('key_msg_en', 200);
            $table->string('key_msg_desc_ko', 300);
            $table->string('key_msg_desc_en', 300);
            $table->string('url', 100)->nullable();
            $table->string('link_text_ko', 40)->nullable();
            $table->string('link_text_en', 20)->nullable();
            $table->string('data_1_ko', 20)->nullable();
            $table->string('data_1_en', 20)->nullable();
            $table->string('desc_1_ko', 200)->nullable();
            $table->string('desc_1_en', 200)->nullable();
            $table->string('data_2_ko', 20)->nullable();
            $table->string('data_2_en', 20)->nullable();
            $table->string('desc_2_ko', 200)->nullable();
            $table->string('desc_2_en', 200)->nullable();
            $table->string('expo_yn', 2);
            $table->Integer('attach_id');
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
        Schema::dropIfExists('messages');
    }
}
