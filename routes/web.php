<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function() {
// 	return View('welcome');
// });

Route::get('admin/dangnhap', 'QuanTriController@getDangNhapAdmin');

Route::post('admin/dangnhap', 'QuanTriController@postDangNhapAdmin');

Route::get('admin/dangxuat', 'QuanTriController@getDangXuatAdmin');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function() {

	Route::get('trangchu', 'QuanTriController@getTrangChu');

	Route::group(['prefix'=>'quantri'], function() {

		Route::get('danhsach', 'QuanTriController@getDanhSach');

		Route::get('them', 'QuanTriController@getThem');
		Route::post('them', 'QuanTriController@postThem');

		Route::get('sua/{id}', 'QuanTriController@getSua');
		Route::post('sua/{id}', 'QuanTriController@postSua');

		Route::get('xoa/{id}', 'QuanTriController@getXoa');
	});

	Route::group(['prefix'=>'user'], function() {

		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');

		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');

		Route::get('xoa/{id}', 'UserController@getXoa');

		Route::get('ketqua/{id}', 'UserController@getKetQua');

		Route::get('xoaKQ/{id}', 'UserController@getXoaKQ');
	});

	Route::group(['prefix'=>'monhoc'], function() {

		Route::get('danhsach', 'MonHocController@getDanhSach');

		Route::get('sua/{id}', 'MonHocController@getSua');
		Route::post('sua/{id}', 'MonHocController@postSua');

		Route::get('them', 'MonHocController@getThem');
		Route::post('them', 'MonHocController@postThem');

		Route::get('xoa/{id}', 'MonHocController@getXoa');
	});

	Route::group(['prefix'=>'dethi'], function() {

		Route::get('danhsach', 'DeThiController@getDanhSach');

		Route::get('sua/{id}', 'DeThiController@getSua');
		Route::post('sua/{id}', 'DeThiController@postSua');

		Route::get('them', 'DeThiController@getThem');
		Route::post('them', 'DeThiController@postThem');

		Route::get('xoa/{id}', 'DeThiController@getXoa');

		Route::get('chitiet/{id}', 'DeThiController@getChiTiet');
	});

	Route::group(['prefix'=>'cauhoi'], function() {

		Route::get('danhsach', 'CauHoiController@getDanhSach');

		Route::get('sua/{id}', 'CauHoiController@getSua');
		Route::post('sua/{id}', 'CauHoiController@postSua');

		Route::get('them/{id}', 'CauHoiController@getThem');
		Route::post('them/{id}', 'CauHoiController@postThem');

		Route::get('xoa/{id}', 'CauHoiController@getXoa');
	});

	Route::group(['prefix'=>'ketqua'], function() {

		Route::get('danhsach', 'KetQuaController@getDanhSach');

		Route::get('them', 'KetQuaController@getThem');
		Route::post('them', 'KetQuaController@postThem');

		Route::get('sua/{id}', 'KetQuaController@getSua');
		Route::post('sua/{id}', 'KetQuaController@postSua');

		Route::get('xoa/{id}', 'KetQuaController@getXoa');
	});

	Route::group(['prefix'=>'tintuc'], function() {

		Route::get('danhsach', 'TinTucController@getDanhSach');

		Route::get('sua/{id}', 'TinTucController@getSua');
		Route::post('sua/{id}', 'TinTucController@postSua');

		Route::get('them', 'TinTucController@getThem');
		Route::post('them', 'TinTucController@postThem');

		Route::get('xoa/{id}', 'TinTucController@getXoa');
	});

	Route::group(['prefix'=>'ajax'], function() {
		Route::get('dethi/{id_monhoc}', 'AjaxController@getDeThi');
	});
});


// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

//User
Route::get('dangnhap', 'PageController@getDangNhap');

Route::post('dangnhap', 'PageController@postDangNhap');

Route::get('dangky', 'PageController@getDangKy');

Route::post('dangky', 'PageController@postDangKy');

Route::get('dangxuat', 'PageController@getDangXuat');

Route::get('xacthuc', 'PageController@getXacThuc');

Route::get('dethi/{id}', 'PageController@dethi');

Route::get('cauhoi/{id}', 'PageController@getCauHoi')->middleware('userLogin');

Route::post('cauhoi/{id}', 'PageController@postCauHoi');

Route::get('ketquavuathi/{id}/{diem}', 'PageController@getKetQuaVuaThi')->middleware('userLogin');

Route::get('ketqua', 'PageController@getKetQua')->middleware('userLogin');

Route::get('trangchu', 'PageController@trangchu');

Route::get('lienhe', 'PageController@getLienHe');

Route::post('lienhe', 'PageController@postLienHe');

Route::get('nguoidung', 'PageController@getNguoiDung')->middleware('userLogin');

Route::get('suathongtin', 'PageController@getSuaThongTin')->middleware('userLogin');

Route::post('suathongtin', 'PageController@postSuaThongTin');

Route::get('tintuc', 'PageController@tintuc');

Route::get('xemtin/{id}','PageController@xemtin');



