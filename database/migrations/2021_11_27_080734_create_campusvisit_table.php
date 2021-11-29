<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusvisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campusvisit', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('contact');
            $table->string('vehicle_type')->nullable();
            $table->string('plate_num')->nullable();
            $table->date('date');
            $table->time('time_in');
        });

        $this_year = (int)date("Y");
        $for_id = ($this_year + 600000) * 1000;

        DB::update("ALTER TABLE campusvisit AUTO_INCREMENT = $for_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campusvisit');
    }
}
