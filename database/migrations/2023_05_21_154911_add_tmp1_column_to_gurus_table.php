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
        Schema::table('gurus', function (Blueprint $table) {
            $table->date('tgl_lahir')->nullable()->after('tmp_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropColumn('tgl_lahir');
        });
    }
};
