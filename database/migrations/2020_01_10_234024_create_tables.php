<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dep_name', 100)->unique();
            $table->timestamps();
        });

        Schema::create('poss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pos_name', 100)->unique();
            $table->integer('dep_id')->unsigned();
            $table->foreign('dep_id')->references('id')->on('deps');
            $table->timestamps();
        });

        Schema::create('emps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_name', 100)->unique();
            $table->string('image_path', 256)->nullable();
            $table->date('birth_day')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('nation', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('notes', 512)->nullable();
            $table->integer('pos_id')->unsigned();
            $table->foreign('pos_id')->references('id')->on('poss');
            $table->double('salary')->nullable();
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proj_name', 100)->unique();
            $table->string('description', 512)->nullable();
            $table->string('image_path', 256)->nullable();
            $table->date('start')->nullable();
            $table->date('finish')->nullable();
            $table->integer('dep_id')->unsigned();
            $table->foreign('dep_id')->references('id')->on('deps');
            $table->string('status', 50);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prod_name', 100)->unique();
            $table->string('description', 512)->nullable();
            $table->string('image_path', 256)->nullable();
            $table->double('price')->nullable();
            $table->string('status', 50);
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
        Schema::dropIfExists('deps');
        Schema::dropIfExists('poss');
        Schema::dropIfExists('emps');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('products');
    }
}
