<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectlists', function (Blueprint $table) {
            $table->id();
            $table->string('area', 2)->nullable();
            $table->string('biz_area', 2)->nullable();
            $table->string('gubun', 2)->nullable();
            $table->string('name_ko', 200)->nullable();
            $table->string('name_en', 200)->nullable();
            $table->string('open_yn', 2)->nullable();
            $table->date('from');
            $table->date('to');
            $table->string('project_yn', 2)->nullable();      
            $table->string('address_ko', 200)->nullable();
            $table->string('address_en', 200)->nullable();
            $table->string('volumn_ko', 100)->nullable();
            $table->string('volumn_en', 100)->nullable();
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
        Schema::dropIfExists('projectlists');
    }
}
