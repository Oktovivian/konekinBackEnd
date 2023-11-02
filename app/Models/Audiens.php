<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audiens extends Model
{
    protected $table = 'audiens';
    protected $primaryKey = 'idAudiens';

    protected $fillable = [
        'email',
        'password',
        'username',
        'noHP',
        'profilePict',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'idAudiens', 'idAudiens');
    }

    public function kontens()
    {
        return $this->hasMany(Konten::class, 'idKreator', 'idAudiens');
    }
}
