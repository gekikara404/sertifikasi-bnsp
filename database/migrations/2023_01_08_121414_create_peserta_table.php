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
        Schema::create('peserta', function (Blueprint $table) {
            $table->string('id_peserta')->primary();
            $table->string('kd_skema');
            $table->string('nm_peserta');
            $table->string('jekel');
            $table->text('alamat');
            $table->string('no_hp');
            $table->foreign('kd_skema')
                ->references('kd_skema')->on('skema')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
};
