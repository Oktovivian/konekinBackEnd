<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'kontens';
    protected $primaryKey = 'idVideo';

    protected $fillable = [
        'idKreator',
        'videoTitle',
        'videoDescription',
        'videoDuration',
        'videoPrice',
        'videoURL',
        'videoThumbnail',
        'videoKategori',
    ];

    public function kreator()
    {
        return $this->belongsTo(Kreator::class, 'idKreator', 'idKreator');
    }
}
