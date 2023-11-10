<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKreatorsTable extends Migration
{
    public function up()
    {
        Schema::create('kreators', function (Blueprint $table) {
            $table->id('idKreator');
            $table->string('password', 50);
            $table->string('username', 50);
            $table->string('noHP', 50);
            $table->string('email', 50);
            $table->binary('cv')->nullable(); // Ubah tipe kolom 'cv'
            $table->string('bio', 128)->nullable();
            $table->string('socMed', 128)->nullable();
            $table->string('rekening', 50)->nullable();
            $table->binary('profilPict')->nullable(); // Ubah tipe kolom 'profilPict'
            $table->string('role',50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kreators');
    }
}
