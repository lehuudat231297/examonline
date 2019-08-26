<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\monhoc;

class MonHocController extends Controller
{
	public function getDanhSach() {
		$monhoc = monhoc::orderBy('id', 'DESC')->paginate(10);
		return View('admin.monhoc.danhsach', ['monhoc'=>$monhoc]);
	}


	public function getThem() {
		return View('admin.monhoc.them');
	}
	public function postThem(Request $request) {

		$this->validate($request,
			[
				'ten_mon_hoc' => 'required|min:1|max:155|unique:monhoc,ten_mon_hoc',
			],

			[
				'ten_mon_hoc.required'=>'Bạn chưa nhập tên môn học',
				'ten_mon_hoc.unique'=>'Môn học đã tồn tại',
				'ten_mon_hoc.min' => 'Tên môn học phải có độ dài từ 1 đến 155 kí tự',
				'ten_mon_hoc.max' => 'Tên môn học phải có độ dài từ 1 đến 155 kí tự',
			]
		);

		$monhoc = new monhoc;

		$monhoc->ten_mon_hoc = $request->ten_mon_hoc;

		$monhoc->save();

		return redirect('admin/monhoc/them')->with('thongbao', 'Thêm thành công');
	}


	public function getSua($id) {
		$monhoc = monhoc::find($id);
		return View('admin.monhoc.sua', ['monhoc'=>$monhoc]);
	}

	public function postSua(Request $request, $id) {
		$monhoc = monhoc::find($id);

		$this->validate($request,
			[
				'ten_mon_hoc' => 'required|min:1|max:155|unique:monhoc,ten_mon_hoc',
			],

			[
				'ten_mon_hoc.required'=>'Bạn chưa nhập tên môn học',
				'ten_mon_hoc.unique'=>'Môn học đã tồn tại',
				'ten_mon_hoc.min' => 'Tên môn học phải có độ dài từ 1 đến 155 kí tự',
				'ten_mon_hoc.max' => 'Tên môn học phải có độ dài từ 1 đến 155 kí tự',
			]
		);

		$monhoc->ten_mon_hoc = $request->ten_mon_hoc;

		$monhoc->save();

		return redirect('admin/monhoc/sua/'.$id)->with('thongbaosua', 'Sửa thành công');
	}

	public function getXoa($id) {
		$monhoc = monhoc::find($id);
		$monhoc->delete();

		return redirect('admin/monhoc/danhsach')->with('thongbaoxoa', 'Xoá thành công');
	}
}
