<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_management', function (Blueprint $table) {
            $table->bigIncrements('id');
              $table->integer('company_id');
           $table->string('name');
           $table->string('position');
           $table->string('education');
           $table->string('year in company');
           $table->string('year in industry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_management');
    }
}
