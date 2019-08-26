<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cauhoi extends Model
{
    public $timestamps = false;
    protected $table = "cauhoi";

    public function dethi() {
    	return $this->belongsTo('App\dethi', 'id_dethi', 'id');
    }
}
