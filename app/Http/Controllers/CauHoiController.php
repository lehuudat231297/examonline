<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\monhoc;
use App\dethi;
use App\cauhoi;

class CauHoiController extends Controller
{
	public function getDanhSach() {
		$cauhoi = cauhoi::orderBy('id', 'DESC')->paginate(10);
		return View('admin.cauhoi.danhsach', ['cauhoi'=>$cauhoi]);
	}

	public function getThem($id) {
		$monhoc = monhoc::all();
		$dethi  = dethi::find($id);

		return View('admin.cauhoi.them', ['monhoc'=>$monhoc, 'dethi'=>$dethi]);
	}

	public function postThem(Request $request, $id) {
		$dethi  = dethi::find($id);

        //bail: dừng lại không kiểm tra điều kiện tiếp theo nếu điều kiện trước đó lỗi 
		$this->validate($request, 
			[
				'noi_dung' => 'bail|required|min:1|unique:cauhoi,noi_dung',          
				'phuong_an_a' => 'bail|required',
				'phuong_an_b' => 'bail|required',
				'phuong_an_c' => 'bail|nullable|min:1',
				'phuong_an_d' => 'bail|nullable|min:1',
				'phuong_an_e' => 'bail|nullable|min:1',
				//'do_kho'  => 'bail|nullable|alpha_dash|min:1',
				'dap_an'  => 'bail|required',
			],

			[
				'noi_dung.required'=>'Bạn chưa nhập nội dung',
				'noi_dung.unique'=>'Câu hỏi đã tồn tại',
				'noi_dung.min' => 'Nội dung phải có ít nhất 1 kí tự',

				'phuong_an_a.required'=>'Bạn chưa nhập phương án',

				'phuong_an_b.required'=>'Bạn chưa nhập phương án',

				'phuong_an_c.min'=>'Phương án phải nhiều hơn 1 kí tự',

				'phuong_an_d.min'=>'Phương án phải nhiều hơn 1 kí tự',

				'phuong_an_e.min'=>'Phương án phải nhiều hơn 1 kí tự',

				//'do_kho.alpha_dash'=>'Độ khó phải là chữ cái hoặc số',
				//'do_kho.min'=>'Độ khó phải nhiều hơn 1 kí tự',

				'dap_an.required'=>'Bạn chưa nhập đáp án',
			]
		);


		$cauhoi = new cauhoi;

		$cauhoi->id_dethi = $id;
		$cauhoi->noi_dung = $request->noi_dung;
		$cauhoi->phuong_an_a = $request->phuong_an_a;
		$cauhoi->phuong_an_b = $request->phuong_an_b;
		$cauhoi->phuong_an_c = $request->phuong_an_c;
		$cauhoi->phuong_an_d = $request->phuong_an_d;
		$cauhoi->phuong_an_e = $request->phuong_an_e;
		$cauhoi->do_kho = $request->do_kho;

		if($request->hasFile('hinh_anh')) {
			$file = $request->file('hinh_anh');

			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg') {
				return redirect('admin/cauhoi/them/'.$id)->with('loihinhanh', 'Bạn chỉ được chọn file có đuôi jpg, png, gif và jpeg');
			}

			$name = $file->getClientOriginalName();
			$hinh_anh = str_random(5)."_".$name;
			while (file_exists("upload/cauhoi/".$hinh_anh)) {
				$hinh_anh = str_random(5)."_".$name;
			}
			$file->move("upload/cauhoi", $hinh_anh);
			$cauhoi->hinh_anh = $hinh_anh;
		}

		if($request->dap_an != $request->phuong_an_a && $request->dap_an != $request->phuong_an_b && $request->dap_an != $request->phuong_an_c && $request->dap_an != $request->phuong_an_d && $request->dap_an != $request->phuong_an_e) {
			return redirect('admin/cauhoi/them/'.$id)->with('loidapan', 'Đáp án phải là 1 trong các phương án');
		} else {
			$cauhoi->dap_an = $request->dap_an;
		}

		$cauhoi->save();

		return redirect('admin/dethi/chitiet/'.$id)->with('thongbao', 'Thêm thành công');
	}
	
	public function getSua($id) {
		$monhoc = monhoc::all();
		$dethi  = dethi::all();
		$cauhoi = cauhoi::find($id);      
		return View('admin.cauhoi.sua', ['cauhoi'=>$cauhoi, 'monhoc'=>$monhoc, 'dethi'=>$dethi]);
	}

	public function postSua(Request $request, $id) {
		$cauhoi = cauhoi::find($id);

		//bail: dừng lại không kiểm tra điều kiện tiếp theo nếu điều kiện trước đó lỗi 
		$this->validate($request, 
			[
				'noi_dung' => 'bail|required|min:1', 
				'noi_dung' => Rule::unique('cauhoi')->ignore($cauhoi->id),
				'phuong_an_a' => 'bail|required',
				'phuong_an_b' => 'bail|required',
				'phuong_an_c' => 'bail|nullable|min:1',
				'phuong_an_d' => 'bail|nullable|min:1',
				'phuong_an_e' => 'bail|nullable|min:1',
				//'do_kho'  => 'bail|nullable|alpha_dash|min:1',
				'dap_an'  => 'bail|required',
			],

			[
				'noi_dung.required'=>'Bạn chưa nhập nội dung',
				'noi_dung.unique'=>'Câu hỏi đã tồn tại',
				'noi_dung.min' => 'Nội dung phải có ít nhất 1 kí tự',

				'phuong_an_a.required'=>'Bạn chưa nhập phương án',

				'phuong_an_b.required'=>'Bạn chưa nhập phương án',

				'phuong_an_c.min'=>'Phương án phải nhiều hơn 1 kí tự',

				'phuong_an_d.min'=>'Phương án phải nhiều hơn 1 kí tự',

				'phuong_an_e.min'=>'Phương án phải nhiều hơn 1 kí tự',

				//'do_kho.alpha_dash'=>'Độ khó phải là chữ cái hoặc số',
				//'do_kho.min'=>'Độ khó phải nhiều hơn 1 kí tự',

				'dap_an.required'=>'Bạn chưa nhập đáp án',
			]
		);

		//$cauhoi->id_dethi = $request->dethi;	
		$cauhoi->noi_dung = $request->noi_dung;
		$cauhoi->phuong_an_a = $request->phuong_an_a;
		$cauhoi->phuong_an_b = $request->phuong_an_b;
		$cauhoi->phuong_an_c = $request->phuong_an_c;
		$cauhoi->phuong_an_d = $request->phuong_an_d;
		$cauhoi->phuong_an_e = $request->phuong_an_e;
		$cauhoi->do_kho = $request->do_kho;


		if($request->dap_an != $request->phuong_an_a && $request->dap_an != $request->phuong_an_b && $request->dap_an != $request->phuong_an_c && $request->dap_an != $request->phuong_an_d && $request->dap_an != $request->phuong_an_e) {
			return redirect('admin/cauhoi/sua/'.$id)->with('loidapan', 'Đáp án phải là 1 trong các phương án');
		} else {
			$cauhoi->dap_an = $request->dap_an;
		}

		if($request->hasFile('hinh_anh')) {
			$file = $request->file('hinh_anh');

			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg') {
				return redirect('admin/cauhoi/sua/'.$id)->with('loihinhanh', 'Bạn chỉ được chọn file có đuôi jpg, png, gif và jpeg');
			}

			$name = $file->getClientOriginalName();
			$hinh_anh = str_random(5)."_".$name;
			while (file_exists("upload/cauhoi/".$hinh_anh)) {
				$hinh_anh = str_random(5)."_".$name;
			}
			$file->move("upload/cauhoi", $hinh_anh);

			if($cauhoi->hinh_anh != "") {
				unlink("upload/cauhoi/".$cauhoi->hinh_anh);
				$cauhoi->hinh_anh = $hinh_anh;
			} else {
				$cauhoi->hinh_anh = $hinh_anh;
			}								
		} 

		$cauhoi->save();

		return redirect('admin/dethi/chitiet/'.$cauhoi->id_dethi)->with('thongbaosua', 'Sửa thành công');
	}

	public function getXoa($id) {
		$cauhoi = cauhoi::find($id);
		$cauhoi->delete();

		return redirect('admin/dethi/chitiet/'.$cauhoi->id_dethi)->with('thongbaoxoa', 'Xoá thành công'); 
	} 
}
