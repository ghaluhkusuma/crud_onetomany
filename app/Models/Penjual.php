<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',   
        'alamat',
             
       
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
