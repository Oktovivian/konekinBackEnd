<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudiensTable extends Migration
{
    public function up()
    {
        Schema::create('audiens', function (Blueprint $table) {
            $table->string('idAudiens', 50);
            $table->string('email', 50);
            $table->string('password', 50);
            $table->string('username', 50);
            $table->string('noHP', 50);
            $table->binary('profilePict')->nullable(); // Ubah tipe kolom 'profilePict'
            $table->timestamps();
            $table->string('role',50);

            $table->primary('idAudiens');
        });
    }

    public function down()
    {
        Schema::dropIfExists('audiens');
    }
}
