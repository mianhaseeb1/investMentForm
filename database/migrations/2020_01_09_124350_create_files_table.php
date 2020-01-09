<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('Commercial')->default(null);
            $table->string('Management')->default(null);
            $table->string('Financial')->default(null);
            $table->string('Forecast')->default(null);
            $table->string('Payable')->default(null);
            $table->string('Aging')->default(null);
            $table->string('Ownership')->default(null);
            $table->string('structure')->default(null);
            $table->string('Authorised')->default(null);
            $table->string('Business_plan')->default(null);
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
        Schema::dropIfExists('files');
    }
}
