<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kreator extends Model
{
    protected $table = 'kreators';
    protected $primaryKey = 'idKreator';

    protected $fillable = [
        'password',
        'username',
        'noHP',
        'email',
        'cv',
        'bio',
        'socMed',
        'rekening',
        'profilPict',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'idKreator', 'idKreator');
    }

    public function kontens()
    {
        return $this->hasMany(Konten::class, 'idKreator', 'idKreator');
    }
}
