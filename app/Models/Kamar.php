<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Katagori;
use App\Models\Gambar;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = "id";

    protected $fillable = [
        'nomor_kamar',
        'harga',
        'kapasitas',
        'keterangan',
        'katagori_id'
    ];

    public function katagori()
    {
        return $this->belongsTo(Katagori::class, 'katagori_id');
    }

    public function gambar()
    {
        return $this->hasMany(Gambar::class);
    }

}