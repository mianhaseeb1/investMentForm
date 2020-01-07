<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('company_id');
             $table->string('primary_suppliers');
             $table->string('country');
              $table->string('type_of_product');
              $table->string('quantity');
              $table->string('% of sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_suppliers');
    }
}
