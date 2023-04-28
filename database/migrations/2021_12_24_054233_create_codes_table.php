<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->string('code_id', 20)->index();
            $table->string('codegroup_id', 20)->index();
            $table->string('code_nm', 50);
            $table->string('conde_nm_en', 50)->nullable();
            $table->string('useflag', 2)->nullable();
            $table->string('view', 2)->nullable();
            $table->timestamps();
        });
        
        DB::statement('ALTER TABLE codes ADD PRIMARY KEY(code_id, codegroup_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
}
