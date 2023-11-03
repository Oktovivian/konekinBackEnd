<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontensTable extends Migration
{
    public function up()
    {
        Schema::create('kontens', function (Blueprint $table) {
            $table->string('idVideo', 50);
            $table->unsignedBigInteger('idKreator');
            $table->string('videoTitle', 50);
            $table->string('videoDescription', 500);
            $table->string('videoDuration', 50);
            $table->string('videoPrice', 50);
            $table->string('videoURL', 50);
            $table->binary('videoThumbnail'); // Ubah tipe kolom 'videoThumbnail'
            $table->string('videoKategori', 50);
            $table->timestamps();

            $table->primary('idVideo');
            $table->foreign('idKreator')->references('idKreator')->on('kreators');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontens');
    }
}
