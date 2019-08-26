<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\ketqua;

class UserController extends Controller
{
   public function getDanhSach() {
       $user = User::orderBy('id', 'DESC')->paginate(10);
       return View('admin.user.danhsach', ['user'=>$user]);
   }

   public function getThem() {
       return View('admin.user.them');
   }
   public function postThem(Request $request) {

    $this->validate($request, 
        [
            'email' => 'required|email|unique:users,email',           
            'password'  => 'bail|required|between:5,55',
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

            'ten.required' => 'Bạn chưa nhập họ tên', 

            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',

            'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'so_dien_thoai.numeric' => 'Số điện thoại phải là các chữ số',    
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

        return redirect('admin/user/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id) {
        $user = User::find($id);
        return View('admin.user.sua', ['user'=>$user]);
    }

    public function postSua(Request $request, $id) {
        $user = User::find($id);

        $this->validate($request, 
            [
                'email' => 'required|email',  
                'email' => Rule::unique('users')->ignore($user->id),         
                'password'  => 'bail|required',
                'ten'  => 'bail|required', 
                'so_dien_thoai'  => 'bail|nullable|numeric',
                'dia_chi'  => 'bail|nullable',       
            ],

            [
                'email.required'=>'Bạn chưa nhập email',
                'email.unique'=>'Email đã tồn tại',
                'email.email' => 'Sai định dạng email. Vd email: xxxxx@xxx.com',

                'ten.required' => 'Bạn chưa nhập họ tên',  

                'dia_chi.required' => 'Bạn chưa nhập địa chỉ',

                'so_dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
                'so_dien_thoai.numeric' => 'Số điện thoại phải là các chữ số',  
            ]
        );

        $user->email = $request->email;

        if($request->password != $user->password) {
            $this->validate($request, 
                [       
                    'password'  => 'bail|required|between:5,55',

                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.between' => 'Mật khẩu không được bé hơn 5 kí tự và không được lớn hơn 55 kí tự',
                ]
            );

            $user->password = bcrypt($request->password);
        }

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

        return redirect('admin/user/sua/'.$id)->with('thongbaosua', 'Sửa thành công');
    }

    public function getXoa($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('thongbaoxoa', 'Xoá thành công'); 
    }

    public function getKetQua($id) {
        $user = User::find($id);
        $ketqua = ketqua::where('id_users',$id)->paginate(10);
        return View('admin.user.ketqua', ['user'=>$user,'ketqua'=>$ketqua]);
    }

    public function getXoaKQ($id) {
        $ketqua = ketqua::find($id);
        $ketqua->delete();

        $idU = $ketqua->user->id;

        return redirect('admin/user/ketqua/'.$idU)->with('thongbaoxoa', 'Xoá thành công'); 
    }
}

