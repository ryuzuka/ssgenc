<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->bigIncrements('login_id')->uniqid();
            $table->string('user_id', 40)->index();
            $table->string('login_ip', 50)->nullable();
            $table->datetime('in_time');
            $table->datetime('out_time');
            $table->string('err_code', 20)->nullable();
            $table->string('err_msg', 50)->nullable();
            $table->string('login_yn')->nullable();
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
        Schema::dropIfExists('logins');
    }
}
