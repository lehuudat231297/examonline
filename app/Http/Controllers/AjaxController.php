<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\monhoc;
use App\dethi;
use App\cauhoi;

class AjaxController extends Controller
{
    public function getDeThi($id_monhoc) {
    	$dethi = dethi::where('id_monhoc', $id_monhoc)->get(); 
    	foreach ($dethi as $dt) {
    		echo "<option value='".$dt->id."'>".$dt->ten_de_thi."</option>";
    	}
    } 
}
