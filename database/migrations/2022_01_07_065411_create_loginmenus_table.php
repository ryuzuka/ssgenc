<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginmenus', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 40);
            $table->bigInteger('menu_id');
            $table->string('menu_nm', 50);
            $table->string('menu_act', 20);
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
        Schema::dropIfExists('loginmenus');
    }
}
