<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainpopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainpopups', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 200);
            $table->string('descript', 300);
            $table->string('url', 300)->nullable();
            $table->string('link_text', 40)->nullable();
            $table->string('expo_yn', 2)->index();
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
        Schema::dropIfExists('mainpopups');
    }
}
