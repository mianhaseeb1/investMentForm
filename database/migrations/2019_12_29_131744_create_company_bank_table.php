<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_bank', function (Blueprint $table) {
            $table->bigIncrements('id');
              $table->integer('company_id');
            $table->string('lending_facility');
            $table->string('facility_limit');
            $table->string('utilisation');
            $table->string('terms_condition');
            $table->string('cover');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_bank');
    }
}
