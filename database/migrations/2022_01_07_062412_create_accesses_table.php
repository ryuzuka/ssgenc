<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->bigInteger('access_id');
            $table->bigInteger('menu_id');
            $table->string('access_nm', 50);
            $table->date('expired_at');
            $table->string('created_id', 40)->nullable();
            $table->string('updated_id', 40)->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE accesses ADD PRIMARY KEY(access_id, menu_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses');
    }
}
