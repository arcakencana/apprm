<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pasien;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('no_rm');
            $table->integer('no_rm_lama')->nullable($value = true);
            $table->string('nama_kk');
            $table->string('nama_anggota');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->bigInteger('no_bpjs');
            $table->string('no_telp');
            $table->bigInteger('no_nik');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        $pasien = new Pasien;
        $pasien->no_rm          = 11000;
        $pasien->no_rm_lama     = 11000;
        $pasien->nama_kk        = 'ZAINUDIN';
        $pasien->nama_anggota   = 'ZAINUDIN';
        $pasien->tgl_lahir      = '1967-01-07';
        $pasien->alamat         = 'BUKIT RAYA';
        $pasien->no_bpjs        = 0;
        $pasien->no_telp        = 0;
        $pasien->no_nik         = 1404031712070044;
        $pasien->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
