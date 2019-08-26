<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\dethi;

use App\ketqua;

class KetQuaController extends Controller
{
	public function getDanhSach() {
		$ketqua = ketqua::orderBy('id', 'DESC')->paginate(10);
		return View('admin.ketqua.danhsach', ['ketqua'=>$ketqua]);
	}

	public function getThem() {
		$user = User::all();
		$dethi  = dethi::all();
		return View('admin.ketqua.them', ['user'=>$user, 'dethi'=>$dethi]);
	}

	public function postThem(Request $request) {

        //bail: dừng lại không kiểm tra điều kiện tiếp theo nếu điều kiện trước đó lỗi 
		$this->validate($request, 
			[
				'diem'=>'required',
			],

			[
				'diem.required'=>'Bạn chưa nhập đáp án',
			]
		);

		$ketqua = new ketqua;

		$ketqua->id_users = $request->id_users;
		$ketqua->id_dethi = $request->id_dethi;
		$ketqua->diem = $request->diem;
		$ketqua->ngay_thi = $request->ngay_thi;
		$ketqua->save();

		return redirect('admin/ketqua/them')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id) {
		$ketqua = ketqua::find($id);
		$user = User::all();
		$dethi  = dethi::all();
		return View('admin.ketqua.sua', ['ketqua'=>$ketqua,'user'=>$user, 'dethi'=>$dethi]);
	}

	public function postSua(Request $request, $id) {
		$ketqua = ketqua::find($id);
		
		$this->validate($request, 
			[
				'diem' =>'required',
			],

			[
				'diem.required' => 'Bạn chưa nhập điểm'          
			]
		);

		$ketqua->id_users = $request->id_users;
		$ketqua->id_dethi = $request->id_dethi;
		$ketqua->diem = $request->diem;
		$ketqua->ngay_thi = $request->ngay_thi;

		$ketqua->save();

		return redirect('admin/ketqua/sua/'.$id)->with('thongbaosua', 'Sửa thành công');
	}

	public function getXoa($id) {
		$ketqua = ketqua::find($id);
		$ketqua->delete();

		return redirect('admin/ketqua/danhsach')->with('thongbaoxoa', 'Xoá thành công'); 
	}

}
