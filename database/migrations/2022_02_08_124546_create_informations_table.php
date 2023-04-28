<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
			$table->string('housing', 20);
			$table->string('construct', 20);
			$table->string('leisure', 20);
			$table->string('civil', 20);
			$table->string('hf_age', 20);
			$table->string('hf_project', 20);
			$table->string('hf_amt', 20);
			$table->string('cf_age', 20);
			$table->string('cf_project', 20);
			$table->string('cf_amt', 20);
			$table->string('ce_age', 20);
			$table->string('ce_project', 20);
			$table->string('ce_amt', 20);
			$table->string('lb_age', 20);
			$table->string('lb_count', 20);
			$table->string('lb_amt', 20);
			$table->string('ent_age', 20);
			$table->string('ent_count', 20);
			$table->string('ent_amt', 20);
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
        Schema::dropIfExists('informations');
    }
}
