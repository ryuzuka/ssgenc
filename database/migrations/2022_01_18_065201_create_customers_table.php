<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigInteger('cust_id');
            $table->string('cust_nm', 50)->index();
            $table->string('mobile', 20)->index();
            $table->string('phone', 20);
            $table->string('email', 100)->index();
            $table->string('adult_yn', 2);
            $table->string('privacy_info_yn', 2);
            $table->string('privacy_policy_yn', 2);
            $table->string('company_cd', 2);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE customers ADD PRIMARY KEY(cust_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
