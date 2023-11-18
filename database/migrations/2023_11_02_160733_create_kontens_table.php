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
            $table->foreign('category_id')->references('id')->on('content_categories')->onDelete('set null'); // Tambahkan foreign key untuk kategori

        });
    }

    public function category()
    {
        return $this->belongsTo(ContentCategory::class, 'category_id', 'id');
    }

    public function down()
    {
        Schema::dropIfExists('kontens');
    }
}
