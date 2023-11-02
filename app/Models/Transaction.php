<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'idKreator',
        'idAudiens',
        'rekeningTujuan',
        'videoTitle',
        'videoPrice',
        'tglTransaksi',
        'status',
    ];

    public function kreator()
    {
        return $this->belongsTo(Kreator::class, 'idKreator', 'idKreator');
    }

    public function audiens()
    {
        return $this->belongsTo(Audiens::class, 'idAudiens', 'idAudiens');
    }
}
