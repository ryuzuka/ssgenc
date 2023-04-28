<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 40)->primary();
            $table->string('name', 50);
            $table->string('password');
            $table->bigInteger('part_id')->nullable();
            $table->bigInteger('access_id')->nullable();
            $table->string('email', 50);
            $table->string('remark', 50)->nullable();
            $table->string('email_yn', 2);
            $table->string('user_type', 2);
            $table->string('created_id', 40);
            $table->string('updated_id', 40);
            $table->string('useflag', 2)->nullable();
            $table->string('password_reset_yn', 2)->nullable();
            $table->bigInteger('login_fail_cnt')->nullable();
            $table->date('password_next');
            $table->date('expired_at');
            $table->datetime('login_at');
            $table->string('session_id', 191);
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
        Schema::dropIfExists('users');
    }
}
