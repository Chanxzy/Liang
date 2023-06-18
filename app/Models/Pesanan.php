<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_pelanggan',
        'id_kamar',
        'jumlah',
        'checkin',
        'checkout',
        'status_bayar',
        'bukti',
        'total',
    ];

    public function kamars()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar','id');
    }
}
