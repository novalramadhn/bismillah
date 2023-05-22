<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->string('nip');
            $table->string('nama_guru');
            $table->enum('jk', ['L','P']);
            $table->string('alamat');
            $table->unsignedInteger('mapel_id');
            $table->timestamps();

            $table->foreign('mapel_id')->references('id')->on('mapels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
};
