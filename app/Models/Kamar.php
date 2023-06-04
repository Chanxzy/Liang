<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Katagori;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'Gambar',
        'harga',
        'katagori',
        'kapasitas',
        'keterangan',
    ];

    public function katagori()
    {
        return $this->belongsTo(Katagori::class, 'katagori');
    }
}