<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nama');
            $table->string('nik');
            $table->enum('jeniskelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('foto')->nullable(); // Kolom untuk menyimpan nama file gambar (boleh diisi null)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data');
    }
}
