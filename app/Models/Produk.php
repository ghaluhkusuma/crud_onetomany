<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'penjual_id',   
        'namaproduk',
        'harga'
        
       
    ];
    public function penjual()
    {

        
        return $this->hasMany(Penjual::class);
    }
}
