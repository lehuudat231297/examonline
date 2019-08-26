<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monhoc extends Model
{
	public $timestamps = false;
	
    protected $table = "monhoc";

    public function dethi() {
    	return $this->hasMany('App\dethi', 'id_monhoc', 'id');
    }

    public function cauhoi() {
    	return $this->hasManyThrough('App\cauhoi', 'App\dethi', 'id_monhoc', 'id_dethi', 'id');
    }
}
