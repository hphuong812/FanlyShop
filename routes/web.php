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
use App\Sanpham;
use App\Cart;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/if/{id?}', 'HomeController@ProductInfo')->name('IF');
Auth::routes();
//product:
Route::post('Add', 'Ajax@AddCart');
Route::post('Edit', 'Ajax@Edit');
// Route::get('/Update', function () {
//     $x= '4';
//     $y='1';
//     $c='1';
//     $insert = new Cart;
//     $insert->ID_KH =$y;
//     $insert->ID_SP =$x;
//     $insert->SoLuong =$c;
//     $insert->save();
// });
Route::post('AddCart', 'Ajax@AddCart2');
Route::post('deleteCart', 'Ajax@deleteCart');
// Route::get('/hhhhhhh', function () {
//     $tart = Cart::where('ID_KH', '=','1')->sanphamLK->get();
//     echo $tart;
// });

// Route::get('/home', 'HomeController@index');

Route::get('/thanhtoan', 'HomeController@Thanhtoan')->name('thanhtoan');
Route::post('AddHD', 'Ajax@AddHD');
Route::post('/product', 'HomeController@product')->name('product');
Route::get('/product-all', 'HomeController@productAll')->name('product-all');
Route::get('product-all-ajax', 'HomeController@productAllajax')->name('product-all-ajax');
Route::get('/product-men', 'HomeController@ProductMen')->name('product-men');
Route::get('/product-girl', 'HomeController@ProductGirl')->name('product-girl');
Route::get('sapxep-ten-A-Z', 'HomeController@SapXep1')->name('sapxep-ten-A-Z');
Route::get('sapxep-ten-Z-A', 'HomeController@SapXep2')->name('sapxep-ten-Z-A');
Route::get('sapxep-gia-C-T', 'HomeController@SapXep3')->name('sapxep-gia-C-T');
Route::get('sapxep-ten-T-C', 'HomeController@SapXep4')->name('sapxep-ten-T-C');
Route::get('khong-sapxep', 'HomeController@SapXep0')->name('khong-sapxep');
//
Route::get('/dashboard', 'DashBoardController@dashboard');
Route::get('/themSP', 'DashBoardController@ThemSP');
Route::post('/AddSP', 'Ajax@AddSP');
Route::get('/danhsachSP', 'DashBoardController@DanhSachSP');
Route::post('/danhsachSPTK', 'DashBoardController@DanhSachSPTK');
Route::get('/danhsachHD', 'DashBoardController@DanhSachHD');
Route::get('/danhsachKH', 'DashBoardController@DanhSachKH');
Route::get('/editor', 'DashBoardController@editor');

Route::post('Xoa', 'DashBoardController@DeleteProduct');