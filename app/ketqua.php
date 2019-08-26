<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketqua extends Model
{
    protected $table = "ketqua";

    const UPDATED_AT = null;

    public function dethi() {
    	return $this->belongsTo('App\dethi', 'id_dethi', 'id');
    }

    public function User() {
    	return $this->belongsTo('App\User','id_users', 'id');
    }
}
