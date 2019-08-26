<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\dethi;
use App\monhoc;
use App\cauhoi;

class DeThiController extends Controller
{
    public function getDanhSach() {
    	$dethi = dethi::orderBy('id', 'DESC')->paginate(10);
        
    	return View('admin.dethi.danhsach', ['dethi'=>$dethi]);
    }

    public function getThem() {
    	$monhoc = monhoc::all();
    	return View('admin.dethi.them', ['monhoc'=>$monhoc]);
    }

    public function postThem(Request $request) {

        //bail: dừng lại không kiểm tra điều kiện tiếp theo nếu điều kiện trước đó lỗi 
        $this->validate($request, 
        [
        	'ten_de_thi' => 'bail|required|between:1,555|unique:dethi,ten_de_thi',          
        	'so_cau_hoi' => 'bail|required|integer|min:1',
        	'diem_toi_da'=> 'bail|required|numeric|min:1',
        	'thoi_gian'  => 'bail|required|integer|min:1',
        	//'ngay_tao'   => 'bail|required|date|after_or_equal:2019-01-01',
        	'mat_khau'   => 'bail|nullable',
        	'nguoi_tao'  => 'bail|nullable',
        ],

        [
            'ten_de_thi.required'=>'Bạn chưa nhập tên đề thi',
            'ten_de_thi.unique'=>'Đề thi đã tồn tại',
            'ten_de_thi.between' => 'Đề thi phải có độ dài từ 1 đến 555 kí tự',
            
            'so_cau_hoi.required'=>'Bạn chưa nhập số câu hỏi',
            'so_cau_hoi.integer' => 'Số câu hỏi phải là số nguyên dương',
            'so_cau_hoi.min'=>'Số câu hỏi không được nhỏ hơn 1',

            'diem_toi_da.required'=>'Bạn chưa nhập điểm tối đa',
            'diem_toi_da.numeric' => 'Điểm tối đa phải là số',
            'diem_toi_da.min'=>'Điểm tối đa không được nhỏ hơn 1',

            'thoi_gian.required'=>'Bạn chưa nhập thời gian',
            'thoi_gian.integer'=>'Thời gian phải là số nguyên dương',
            'thoi_gian.min'=>'Thời gian không được nhỏ hơn 1',

            //'ngay_tao.required'=>'Bạn chưa nhập ngày tạo',
            //'ngay_tao.date'=>'Bạn phải nhập đúng đinh dạng ngày. Vd: 2019-01-01',
            //'ngay_tao.after_or_equal'=>'Ngày tạo phải bằng hoặc sau ngày 01-01-2019'
        ]
    );

        $dethi = new dethi;

        $dethi->id_monhoc = $request->monhoc;
        $dethi->ten_de_thi = $request->ten_de_thi;
        $dethi->so_cau_hoi = $request->so_cau_hoi;
        $dethi->diem_toi_da = $request->diem_toi_da;
        $dethi->thoi_gian = $request->thoi_gian;
        //$dethi->ngay_tao = $request->ngay_tao;
        $dethi->mat_khau = $request->mat_khau;
        $dethi->nguoi_tao = $request->nguoi_tao;
  
        $dethi->save();

        return redirect('admin/dethi/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id) {
    	$monhoc = monhoc::all();
        $dethi  = dethi::find($id);      
        return View('admin.dethi.sua', ['dethi'=>$dethi, 'monhoc'=>$monhoc]);
    }

    public function postSua(Request $request, $id) {
    	$dethi = dethi::find($id);

		//bail: dừng lại không kiểm tra điều kiện tiếp theo nếu điều kiện trước đó lỗi 
    	$this->validate($request, 
    		[
    			'ten_de_thi' => 'bail|required|between:1,555', 
                'ten_de_thi' =>  Rule::unique('dethi')->ignore($dethi->id),   
    			'so_cau_hoi' => 'bail|required|integer|min:1',
    			'diem_toi_da'=> 'bail|required|numeric|min:1',
    			'thoi_gian'  => 'bail|required|integer|min:1',
    			//'ngay_tao'   => 'bail|required|date|after_or_equal:2019-01-01',
    			'mat_khau'   => 'bail|nullable',
    			'nguoi_tao'  => 'bail|nullable',
    		],

    		[
    			'ten_de_thi.required'=>'Bạn chưa nhập tên đề thi',
    			'ten_de_thi.unique'=>'Đề thi đã tồn tại',
    			'ten_de_thi.between' => 'Đề thi phải có độ dài từ 1 đến 555 kí tự',

    			'so_cau_hoi.required'=>'Bạn chưa nhập số câu hỏi',
    			'so_cau_hoi.integer' => 'Số câu hỏi phải là số nguyên dương',
    			'so_cau_hoi.min'=>'Số câu hỏi không được nhỏ hơn 1',

    			'diem_toi_da.required'=>'Bạn chưa nhập điểm tối đa',
    			'diem_toi_da.numeric' => 'Điểm tối đa phải là số',
    			'diem_toi_da.min'=>'Điểm tối đa không được nhỏ hơn 1',

    			'thoi_gian.required'=>'Bạn chưa nhập thời gian',
    			'thoi_gian.integer'=>'Thời gian phải là số nguyên dương',
    			'thoi_gian.min'=>'Thời gian không được nhỏ hơn 1',

    			//'ngay_tao.required'=>'Bạn chưa nhập ngày tạo',
    			//'ngay_tao.date'=>'Bạn phải nhập đúng đinh dạng ngày. Vd: 2019-01-01',
    			//'ngay_tao.after_or_equal'=>'Ngày tạo phải bằng hoặc sau ngày 01-01-2019'
    		]
    	);

        $dethi->id_monhoc = $request->monhoc;
        $dethi->ten_de_thi = $request->ten_de_thi;
        $dethi->so_cau_hoi = $request->so_cau_hoi;
        $dethi->diem_toi_da = $request->diem_toi_da;
        $dethi->thoi_gian = $request->thoi_gian;
        //$dethi->ngay_tao = $request->ngay_tao;
        $dethi->mat_khau = $request->mat_khau;
        $dethi->nguoi_tao = $request->nguoi_tao;

        $dethi->save();

        return redirect('admin/dethi/sua/'.$id)->with('thongbaosua', 'Sửa thành công');
    }

    public function getXoa($id) {
        $dethi = dethi::find($id);
        $dethi->delete();

        return redirect('admin/dethi/danhsach')->with('thongbaoxoa', 'Xoá thành công'); 
    }

    public function getChiTiet($id) {
        $monhoc = monhoc::all();
        $dethi = dethi::find($id);  
        $cauhoi = cauhoi::where('id_dethi', $id)->paginate(20);

        $schHT = count($dethi->cauhoi);
        $sch = $dethi->so_cau_hoi;

        return View('admin.dethi.chitiet', ['dethi'=>$dethi, 'monhoc'=>$monhoc, 'cauhoi'=>$cauhoi], compact('schHT', 'sch'));
    }
}
