<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\quantri;

use App\User;

use App\dethi;

use App\monhoc;

use App\tintuc;

class QuanTriController extends Controller
{
    public function getDanhSach() {
    	$quantri = quantri::orderBy('id', 'DESC')->paginate(10);
    	return View('admin.quantri.danhsach', ['quantri'=>$quantri]);
    }

    public function getThem() {
    	return View('admin.quantri.them');
    }

    public function postThem(Request $request) {

        $this->validate($request, 
            [
                'tai_khoan' => 'required|between:5,55|unique:quantris,tai_khoan',           
                'password'  => 'bail|required',
                'ho_ten'  => 'bail|required',
                'email'  => 'bail|required|email',
                'so_dien_thoai'  => 'bail|required|numeric',
                'dia_chi'  => 'bail|required',
                'quyen'  => 'bail|required|numeric',
            ],

            [
                'tai_khoan.required'=>'Bạn chưa nhập tài khoản',
                'tai_khoan.unique'=>'Tài khoản đã tồn tại',
                'tai_khoan.between' => 'Tài khoản phải có độ dài từ 5 đến 55 kí tự',

                'password.required' => 'Bạn chưa nhập mật khẩu',

                'ho_ten.required' => 'Bạn chưa nhập họ tên',

                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Sai định dạng email. Vd email: xxxxx@xxx.com',

                'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
                'so_dien_thoai.numeric' => 'Số điện thoại phải là các chữ số',

                'dia_chi.required' => 'Bạn chưa nhập địa chỉ',

                'quyen.required' => 'Bạn chưa nhập quyền',
                'quyen.numeric' => '0: Siêu quản trị - 1: Quản trị',
            ]
        );

        $quantri = new quantri;

        $quantri->tai_khoan = $request->tai_khoan;

        $quantri->password = bcrypt($request->password);

        $quantri->ho_ten = $request->ho_ten;

        $dateOfBirth = $request->year;
        $dateOfBirth .= '-';
        $dateOfBirth .= $request->month;
        $dateOfBirth .= '-';
        $dateOfBirth .= $request->day;
        $quantri->ngay_sinh = $dateOfBirth;

        $quantri->gioi_tinh = $request->gioi_tinh;

        $quantri->email = $request->email;

        $quantri->so_dien_thoai = $request->so_dien_thoai;

        $quantri->dia_chi = $request->dia_chi;

        $quantri->quyen = $request->quyen;

        $quantri->save();

        return redirect('admin/quantri/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id) {
        $quantri = quantri::find($id);
        return View('admin.quantri.sua', ['quantri'=>$quantri]);
    }

    public function postSua(Request $request, $id) {
        $quantri = quantri::find($id);

        $this->validate($request, 
            [
                'ho_ten'  => 'bail|required',
                'email'  => 'bail|required|email',
                'so_dien_thoai'  => 'bail|required|numeric',
                'dia_chi'  => 'bail|required',
            ],

            [
                'ho_ten.required' => 'Bạn chưa nhập họ tên',

                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Sai định dạng email. Vd email: xxxxx@xxx.com',

                'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
                'so_dien_thoai.numeric' => 'Số điện thoại phải là các chữ số',

                'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
            ]
        );

        if($request->changePassword == "on") {
            $this->validate($request, 
                [       
                    'password'  => 'bail|required|between:5,55',
                    'passwordAgain'  => 'bail|required|same:password',

                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.between' => 'Mật khẩu không được bé hơn 5 kí tự và không được lớn hơn 55 kí tự',

                    'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp',
                ]
            );

            $quantri->password = bcrypt($request->password);
        }
        
        $quantri->ho_ten = $request->ho_ten;

        $dateOfBirth = $request->year;
        $dateOfBirth .= '-';
        $dateOfBirth .= $request->month;
        $dateOfBirth .= '-';
        $dateOfBirth .= $request->day;
        $quantri->ngay_sinh = $dateOfBirth;
        
        $quantri->gioi_tinh = $request->gioi_tinh;

        $quantri->email = $request->email;

        $quantri->so_dien_thoai = $request->so_dien_thoai;

        $quantri->dia_chi = $request->dia_chi;

        $quantri->quyen = $request->quyen;

        $quantri->save();

        return redirect('admin/quantri/sua/'.$id)->with('thongbaosua', 'Sửa thành công');
    }

    public function getXoa($id) {
        $quantri = quantri::find($id);
        $quantri->delete();

        return redirect('admin/quantri/danhsach')->with('thongbaoxoa', 'Xoá thành công'); 
    }

    public function getDangNhapAdmin() {
        return View('admin.login');
    }

    public function postDangNhapAdmin(Request $request) {
        $this->validate($request, 
            [
                'tai_khoan' => 'required',
                'password'  => 'required|between:5,55',
            ],

            [
                'tai_khoan.required' => 'Bạn chưa nhập tài khoản',

                'password.required'  => 'Bạn chưa nhập mật khẩu',
                'password.between' => 'Mật khẩu không được bé hơn 5 kí tự và không được lớn hơn 55 kí tự',
            ]
        );

        if(Auth::guard('quantri')->attempt(['tai_khoan'=>$request->tai_khoan, 'password'=>$request->password])) {
            return redirect('admin/trangchu');
        } else {
            return redirect('admin/dangnhap')->with('thongbao', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function getDangXuatAdmin() {
        Auth::guard('quantri')->logout();
        return redirect('admin/dangnhap');
    }

    public function getTrangChu() {
        $user = User::all();
        $dethi = dethi::all();
        $monhoc = monhoc::all();
        $tintuc = tintuc::all();

        $u = count($user);
        $dt = count($dethi);
        $mh = count($monhoc);
        $tt = count($tintuc);

        return view('admin.trangchu', compact('u', 'dt', 'mh', 'tt'));    }
}
