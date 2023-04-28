<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customquestions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cust_id')->index();
            $table->string('type', 2)->index();
            $table->string('gubun', 2)->index();
            $table->string('subject', 300);
            $table->string('content', 500)->nullable();
            $table->string('reply_yn', 2)->nullable();
            // $table->string('reply_exist_yn', 2)->nullable();
            $table->string('reply_flag', 2);
            $table->string('name_yn', 2);
            $table->string('address', 100);
            $table->string('gu', 20)->index();
            $table->string('gfa', 20)->nullable();
            $table->Integer('household')->nullable();
            $table->string('land_area', 20)->nullable();
            $table->string('usage', 200)->nullable();
            $table->Integer('floors_no')->nullable();
            $table->Integer('basement_no')->nullable();
            $table->bigInteger('contract_amt')->nullable();
            $table->string('lang', 3)->index();
            $table->string('password', 200);
            $table->string('created_id', 40)->nullable();
            $table->string('updated_id', 40)->nullable();
            $table->bigInteger('attach_id')->nullable();
            $table->string('accuser_nm', 20);
            $table->string('part_nm', 50);

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
        Schema::dropIfExists('customquestions');
    }
}
