<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ma_tokos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser')->constrained('ma_users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->text('alamat');
            $table->string('foto');
            $table->time('jam_buka');
            $table->time('jam_tutup');
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
        Schema::dropIfExists('ma_tokos');
    }
}
