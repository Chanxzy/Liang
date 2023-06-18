<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;

class Katagori extends Model
{
    use HasFactory;

    protected $table = 'katagori';
    protected $primaryKey = "id";

    protected $fillable = [
        'nama_katagori', 'id',
    ];

    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }
}
