<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldJurusanToMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function($table) {
         $table->integer('id_jurusan')->unsigned();
         $table->foreign('id_jurusan')->references('id')->on('jurusans');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function($table) {
        $table->dropColumn('id_jurusan');
        });
    }
}
