<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigInteger('file_id');
            $table->bigInteger('file_seq');
            $table->string('file_ext', 20);
            $table->string('file_nm', 200);
            $table->string('file_nm_uuid', 200);
            $table->string('file_view_id', 50)->index();
            $table->string('file_text', 200);
            $table->Integer('file_size');
            $table->string('useflag', 2);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE files ADD PRIMARY KEY(file_id, file_seq)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
