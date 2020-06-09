<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='giohang';
    public $timestamps = false;
    public function sanphamLK()
    {
        return $this->belongsTo('App\Sanpham', 'ID_SP', 'ID_SP');
    }
}
