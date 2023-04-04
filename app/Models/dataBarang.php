<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\dataBarang as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class dataBarang extends Model
{
    protected $table="dataBarang";  
    public $timestamps= false;  
    protected  $primaryKey = 'kode_barang';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_barang',
        'harga',
        'qty',
    ];
};