<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 200);
            $table->date('hold_at');
            $table->integer('round');
            $table->string('vote_st', 2);
            $table->string('dir_a_nm', 50);
            $table->string('dir_a_yn', 2);
            $table->string('dir_b_nm', 50);
            $table->string('dir_b_yn', 2);
            $table->string('dir_c_nm', 50);
            $table->string('dir_c_yn', 2);
            $table->string('dir_d_nm', 50);
            $table->string('dir_d_yn', 2);
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
        Schema::dropIfExists('meetings');
    }
}
