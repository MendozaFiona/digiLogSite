<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficevisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officevisit', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('visit_id')->references('id')->on('campusvisit');
            $table->integer('office_id')->references('id')->on('office');
        });

        $this_year = (int)date("Y");
        $for_id = ($this_year + 800000) * 1000;

        DB::update("ALTER TABLE officevisit AUTO_INCREMENT = $for_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officevisit');
    }
}
