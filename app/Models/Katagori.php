<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;

class Katagori extends Model
{
    use HasFactory;

    protected $table = 'katagori';

    protected $fillable = [
        'nama_katagori',
    ];

    public function kamar (){
        return $this->belongsTo(Kamar::class);
    }
}
