<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transactions');
            $table->unsignedBigInteger('idKreator');
            $table->string('idAudiens');
            $table->string('rekeningTujuan', 50);
            $table->string('videoTitle', 50);
            $table->string('videoPrice', 50);
            $table->dateTime('tglTransaksi');
            $table->boolean('status');
            $table->timestamps();

           
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
