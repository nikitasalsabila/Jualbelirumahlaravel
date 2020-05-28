<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarKontrakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_kontrakans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kontrakan_id');
            $table->string('user_id');
            $table->string('nama');
            $table->string('nohp');
            $table->string('email');
            $table->text('isi');
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
        Schema::dropIfExists('komentar_kontrakans');
    }
}
