<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->integer('birth_year')->unsigned();
            $table->integer('death_year')->unsigned()->nullable();
            $table->integer('mother_relative_id')->unsigned()->nullable();
            $table->foreign('mother_relative_id')->references('id')->on('relatives')->onDelete('set null');
            $table->integer('father_relative_id')->unsigned()->nullable();
            $table->foreign('father_relative_id')->references('id')->on('relatives')->onDelete('set null');;
            $table->integer('husband_relative_id')->unsigned()->nullable();
            $table->foreign('husband_relative_id')->references('id')->on('relatives')->onDelete('set null');;
            $table->integer('wife_relative_id')->unsigned()->nullable();
            $table->foreign('wife_relative_id')->references('id')->on('relatives')->onDelete('set null');;
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
        Schema::dropIfExists('relatives');
    }
}
