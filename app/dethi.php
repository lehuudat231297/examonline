<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dethi extends Model
{
    //public $timestamps = false;
    protected $table = "dethi";

    public function monhoc() {
    	return $this->belongsTo('App\monhoc', 'id_monhoc', 'id'); 
    }
 
    public function cauhoi() {
    	return $this->hasMany('App\cauhoi', 'id_dethi', 'id');
    }

    public function ketqua() {
    	return $this->hasMany('App\ketqua', 'id_dethi', 'id');
    }

}