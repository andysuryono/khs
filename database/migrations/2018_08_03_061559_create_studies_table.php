<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_semester')->unsigned();
            $table->integer('id_mahasiswa')->unsigned();
            $table->integer('id_matakuliah')->unsigned();
            $table->integer('nilai');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_semester')->references('id')->on('semesters');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->foreign('id_matakuliah')->references('id')->on('mata_kuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('studies');
    }
}
