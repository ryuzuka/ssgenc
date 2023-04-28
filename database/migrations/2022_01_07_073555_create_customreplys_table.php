<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomreplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customreplys', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('seq');
            $table->string('subject', 200);
            $table->string('content', 3000);
            $table->string('charger', 20);
            $table->bigInteger('attach_id');
            $table->string('created_id', 40)->nullable();
            $table->string('updated_id', 40)->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE customreplys ADD PRIMARY KEY(id, seq)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customreplys');
    }
}
