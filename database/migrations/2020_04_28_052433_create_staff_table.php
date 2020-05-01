<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nik');
          $table->string('nama_depan');
          $table->string('nama_belakang');
          $table->string('jenis_kl');
          $table->string('tempat_lahir');
          $table->text('alamat');
          $table->string('ijazah_terakhir');
          $table->string('tahun_ijazah_trkhr');
          $table->string('nuptk');
          $table->string('agama');
          $table->string('no_tlp');
          $table->string('status_kawin');
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
        Schema::dropIfExists('staff');
    }
}
