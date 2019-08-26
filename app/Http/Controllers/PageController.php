<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\monhoc;

use App\dethi;

use App\cauhoi;

use App\tintuc;

use App\User;

use App\ketqua;

//use Illuminate\Support\Facades\Mail;
use Mail;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function __construct() {
    	$monhoc = monhoc::all();
    	$dethi = dethi::all();
    	$tintuc = tintuc::all();

    	view()->share('monhoc', $monhoc);
    	view()->share('tintuc', $tintuc);
    }

    function trangchu() {       
        return view('pages.trangchu');
    }

    function getXacThuc() {
        return view('pages.verify');
    }

    function getLienHe() {    	
        return view('pages.lienhe');
    }

    function postLienHe(Request $request) {

        $this->validate($request,
            [
                'name'  => 'bail|required',
                'email' => 'bail|required|email',
                'phone' => 'bail|required|numeric',
                'subject' => 'bail|required',
                'issues' => 'bail|required'
            ],

            [
                'name.required'=>'Bạn chưa nhập tên',

                'email.required'=>'Bạn chưa nhập email',
                'email.email' => 'Sai định dạng email',

                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại không đúng',

                'subject.required' => 'Bạn chưa nhập tiêu đề',

                'issues.required' => 'Bạn chưa nhập nội dung'
            ]
        );

        $data = ['ten'=>$request->name, 'email'=>$request->email, 'sodienthoai'=>$request->phone, 'tieude'=>$request->subject,'noidung'=>$request->issues];

        Mail::send('pages.guimail', $data, function($mess) {
            $mess->from('ledao251092@gmail.com');
            $mess->to('ledao251092@gmail.com')->subject('Thư liên hệ');
        }); 
        return redirect('lienhe')->with('thongbao', 'Gửi thành công');
    }

    function tintuc() {     
        $tintuc = tintuc::orderBy('id', 'DESC')->paginate(5);
        return view('pages.tintuc',['tintuc'=>$tintuc]);
    }
    
    function xemtin($id){
     $tintuc = tintuc::find($id);
     return view('pages.xemtin', ['tintuc'=>$tintuc]);
 }

 

 function getNguoiDung() {
    return view('pages.nguoidung');
}   

function getSuaThongTin(Request $request) {


    return view('pages.suathongtin');
}

function postSuaThongTin(Request $request) {

    $this->validate($request, 
        [          
            'ten'  => 'bail|required',  
            'so_dien_thoai'  => 'bail|nullable|numeric',
            'dia_chi'  => 'bail|nullable',      
        ],

        [
            'ten.required' => 'Bạn chưa nhập họ tên', 

            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',

            'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'so_dien_thoai.numeric' => 'Số điện thoại phải là các chữ số',  
        ]
    );

    if($request->hasFile('hinh_anh')) {
        $file = $request->file('hinh_anh');

        $duoi = $file->getClientOriginalExtension();
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg') {
            return redirect('suathongtin')->with('loihinhanh', 'Bạn chỉ được chọn file có đuôi jpg, png, gif và jpeg');
        }

        $nameI = $file->getClientOriginalName();
        $hinh_anh = str_random(5)."_".$nameI;
        while (file_exists("upload/thisinh/".$hinh_anh)) {
            $hinh_anh = str_random(5)."_".$nameI;
        }
        $file->move("upload/thisinh", $hinh_anh);

        if( Auth::user()->hinh_anh != "") {
            unlink("upload/thisinh/".Auth::user()->hinh_anh);
            Auth::user()->hinh_anh = $hinh_anh;
        } else {
            Auth::user()->hinh_anh = $hinh_anh;
        }                               
    } 

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

        Auth::user()->password = bcrypt($request->password);
    }

    Auth::user()->name = $request->ten;

    $dateOfBirth = $request->year;
    $dateOfBirth .= '-';
    $dateOfBirth .= $request->month;
    $dateOfBirth .= '-';
    $dateOfBirth .= $request->day;
    Auth::user()->ngay_sinh = $dateOfBirth;

    Auth::user()->gioi_tinh = $request->gioi_tinh;

    Auth::user()->dia_chi = $request->dia_chi;
    
    Auth::user()->so_dien_thoai = $request->so_dien_thoai;

    Auth::user()->save();

    return redirect('suathongtin')->with('thongbao', 'Sửa thành công');
}

function dethi($id) {
    $monhocchon = monhoc::find($id);
    $dethi = dethi::where('id_monhoc', $id)->paginate(5);  

    return view('pages.dethi', ['monhocchon'=>$monhocchon, 'dethi'=>$dethi]);
}

function getCauHoi($id) {
    $dethi = dethi::find($id);
    $cauhoi = cauhoi::all();

    $tg = $dethi->thoi_gian;

    return view('pages.cauhoi', ['dethi'=>$dethi, 'cauhoi'=>$cauhoi], compact('tg'));
}

function postCauHoi(Request $request, $id) {

    $dethi = dethi::find($id);
    $cauhoi = cauhoi::all();

    $diemTong = $dethi->diem_toi_da;
    $diemCau = $diemTong / ($dethi->so_cau_hoi);
    $diem = 0;
    $i=1;
    foreach ($dethi->cauhoi as $ch) {
        if($request->$i == $ch->dap_an) {
            $diem += $diemCau;
        }
        $i++;
    }

    setcookie('minutes');
    setcookie('seconds'); 

    $ketqua = new ketqua;

    $ketqua->id_users = Auth::user()->id;
    $ketqua->id_dethi = $dethi->id;
    $ketqua->diem = $diem;

    $ketqua->save();

    return redirect('ketquavuathi/'.$id.'/'.$diem);
}

function getKetQuaVuaThi($id, $diem) {
    $dethi = dethi::find($id);
            // return view('pages.ketqua', ['dethi'=>$dethi])->with('diem', $diem);
    return view('pages.ketquavuathi', ['dethi'=>$dethi], compact('diem'));
}

function getKetQua() {
    $ketqua = ketqua::where('id_users', Auth::user()->id)->orderBy('id', 'DESC')->get();

    return view('pages.ketqua', ['ketqua'=>$ketqua]);
}

function getDangNhap() {
    return view('pages.dangnhap');
}

function postDangNhap(Request $request) {
    $this->validate($request, 
        [
            'email' => 'bail|required|email',
            'password'  => 'bail|required|between:5,55',
        ],

        [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Sai định dạng email. Vd email: xxxxx@xxx.com',

            'password.required'  => 'Bạn chưa nhập mật khẩu',
            'password.between' => 'Mật khẩu không được bé hơn 5 kí tự và không được lớn hơn 55 kí tự',
        ]
    );

    if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
        return redirect('trangchu');
    } else {
        return redirect('dangnhap')->with('thongbao', 'Sai tài khoản hoặc mật khẩu');
    }
}

function getDangXuat() {
    Auth::logout();
    return redirect('trangchu');
}


function getDangKy() {
    return view('pages.dangky');
}

function postDangKy(Request $request) {
    $this->validate($request, 
        [
            'email' => 'required|email|unique:users,email',           
            'password'  => 'bail|required|between:5,55',
            'passwordAgain'  => 'bail|required|same:password',
            'ten'  => 'bail|required',  
            'so_dien_thoai'  => 'bail|nullable|numeric',
            'dia_chi'  => 'bail|nullable',      
        ],

        [
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Email đã tồn tại',
            'email.email' => 'Sai định dạng email. Vd email: xxxxx@xxx.com',

            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.between' => 'Mật khẩu không được bé hơn 5 kí tự và không được lớn hơn 55 kí tự',

            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp',

            'ten.required' => 'Bạn chưa nhập họ tên', 

            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',

            'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'so_dien_thoai.alpha_num' => 'Số điện thoại phải là các chữ số',  
        ]
    );

    $user = new User;

    $user->email = $request->email;

    $user->password = bcrypt($request->password);

    $user->name = $request->ten;

    $dateOfBirth = $request->year;
    $dateOfBirth .= '-';
    $dateOfBirth .= $request->month;
    $dateOfBirth .= '-';
    $dateOfBirth .= $request->day;
    $user->ngay_sinh = $dateOfBirth;

    $user->gioi_tinh = $request->gioi_tinh;

    $user->dia_chi = $request->dia_chi;
    
    $user->so_dien_thoai = $request->so_dien_thoai;

    $user->save();

    return redirect('dangky')->with('thongbao', 'Đăng ký thành công');
}

}
