<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table='cthoadon';
    public $timestamps = false;
    public function KH()
    {
        return $this->belongsTo('App\khachhang', 'ID_KH', 'ID_KH');
    }
}
