<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsgpostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esgpostings', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 200);
            $table->string('content', 1000);
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
        Schema::dropIfExists('esgpostings');
    }
}
