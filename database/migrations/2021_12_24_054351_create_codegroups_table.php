<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodegroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codegroups', function (Blueprint $table) {
            $table->string('codegroup_id', 20)->primary();
            $table->string('codegroup_nm', 50);
            $table->string('remark', 50)->nullable();
            $table->string('useflag', 2)->nullable();
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
        Schema::dropIfExists('codegroups');
    }
}
