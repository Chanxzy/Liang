<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;
use App\Models\User;

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
    public function users()
    {
        return $this->belongsTo(User::class, 'id_pelanggan','id');
    }
}
