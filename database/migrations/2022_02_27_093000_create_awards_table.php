<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('gubun', 10);    //수상, 인증
            $table->string('agency_ko', 100);
            $table->string('agency_en', 100);
            $table->string('subject_ko', 200);
            $table->string('subject_en', 200);
            $table->string('expo_yn', 2);
            $table->Integer('attach_id');
            $table->date('registed_at');
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
        Schema::dropIfExists('awards');
    }
}
