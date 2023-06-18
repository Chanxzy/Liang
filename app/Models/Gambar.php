<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;

class Gambar extends Model
{
    use HasFactory;

    protected $table = 'gambar';
    protected $primaryKey = "id";

    protected $fillable = [
        'gambar','kamar_id',
    ];

    public function kamar()
    {
        return $this->belongsTo(Gambar::class, 'kamar_id');
    }
}
