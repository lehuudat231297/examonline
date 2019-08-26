<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\tintuc;

class TinTucController extends Controller
{
    public function getDanhSach() {
        $tintuc = tintuc::orderBy('id', 'DESC')->paginate(10);
        return View('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }
    public function getThem() {
        return View('admin.tintuc.them');
    }
    public function postThem(Request $request) {

        $this->validate($request, 
           [
            'tieu_de' => 'required|min:5|unique:tintuc',
            'noi_dung'  => 'required',
                   // 'ngay_dang' => 'required|date',
            
        ],
        
        [    'tieu_de.required' => 'Tiêu đề không được bỏ trống',
        'tieu_de.unique' => 'Tiêu đề đã tồn tại',
        'tieu_de.min' => 'Tiêu đề không ít hơn 5 ký tự',
        'noi_dung.required' => 'Nội dung không được bỏ trống',
                    // 'ngay_dang.required'=> 'Ngày đăng không được bỏ trống',
                    // 'ngay_dang.date' => 'Ngày đăng phải thuộc kiểu date',
        
    ]
);

        $tintuc = new tintuc;

        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->noi_dung = $request->noi_dung;
        
        // $tintuc->ngay_dang= $request->ngay_dang;

        if($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('loihinhanh', 'Bạn chỉ được chọn file có đuôi jpg, png, gif và jpeg');
            }

            $name = $file->getClientOriginalName();
            $hinh_anh = str_random(5)."_".$name;
            while (file_exists("upload/tintuc/".$hinh_anh)) {
                $hinh_anh = str_random(5)."_".$name;
            }
            $file->move("upload/tintuc", $hinh_anh);
            $tintuc->hinh_anh = $hinh_anh;
        } else {
            $tintuc->hinh_anh = "";
        }
        

        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id) {
        $tintuc = tintuc::find($id);
        return View('admin.tintuc.sua', ['tintuc'=>$tintuc]);
    }

    public function postSua(Request $request, $id) {
        $tintuc = tintuc::find($id);

        $this->validate($request, 
           [
            'tieu_de' => 'required|min:5',
            'noi_dung'  => 'required',        
        ],
        
        [
            'tieu_de.required' => 'Tiêu đề không được bỏ trống',
            
            'tieu_de.min' => 'Tiêu đề không ít hơn 5 ký tự',
            'noi_dung.required' => 'Nội dung không được bỏ trống',
        ]
    );

        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->noi_dung = $request->noi_dung;

        if($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'GIF' && $duoi != 'JPGE') {
                return redirect('admin/tintuc/sua/'.$id)->with('loihinhanh', 'Bạn chỉ được chọn file có đuôi jpg, png, gif và jpeg');
            } else {
               $name = $file->getClientOriginalName();
               $hinh_anh = str_random(5)."_".$name;

               while (file_exists("upload/tintuc/".$hinh_anh)) {
                $hinh_anh = str_random(5)."_".$name;
                }

                $file->move("upload/tintuc",$hinh_anh);

                if($tintuc->hinh_anh != "") {
                    unlink("upload/tintuc/".$tintuc->hinh_anh);
                    $tintuc->hinh_anh = $hinh_anh;
                } else {
                    $tintuc->hinh_anh = $hinh_anh;
                }       
            }      
        } 

    $tintuc->save();

    return redirect('admin/tintuc/sua/'.$id)->with('thongbaosua', 'Sửa thành công');
}

public function getXoa($id) {
    $tintuc = tintuc::find($id);
    $tintuc->delete();

    return redirect('admin/tintuc/danhsach')->with('thongbaoxoa', 'Xoá thành công'); 
}
}
