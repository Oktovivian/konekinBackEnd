<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('idKreator', 50);
            $table->string('idAudiens', 50);
            $table->string('rekeningTujuan', 50);
            $table->string('videoTitle', 50);
            $table->string('videoPrice', 50);
            $table->dateTime('tglTransaksi');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('idKreator')->references('idKreator')->on('kreators');
            $table->foreign('idAudiens')->references('idAudiens')->on('audiens');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
