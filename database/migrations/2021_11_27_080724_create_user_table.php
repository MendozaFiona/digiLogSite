<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('office_id')->references('id')->on('office')->nullable();
            $table->string('admin_id')->references('id')->on('admin')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role_id');
        });

        $this_year = (int)date("Y");
        $for_id = ($this_year + 100000) * 1000;

        DB::update("ALTER TABLE user AUTO_INCREMENT = $for_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
