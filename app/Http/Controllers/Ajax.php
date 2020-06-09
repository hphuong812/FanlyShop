<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\khachhang;
use App\Hoadon;
use App\Sanpham;
class Ajax extends Controller
{
   public function AddCart(Request $request){
       $Qlt= $request ->Qlt;
       $ID_SP = session()->get('ID_SP');
       if ( session()->has('ID_KH')) {
        $ID_KH=session()->get('ID_KH');
        $FindC = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->count();
        // $Find = array_filter($Find);
            if ($FindC != 0) {
                $Find = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->get();
                foreach ($Find as $value) {
                    $QltAll = $value['SoLuong']+$Qlt;
                }
                $Update = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->update(['SoLuong'=>$QltAll]);
                if ($Update) {
                    return "Đã tăng số lượng lên $QltAll thành công";
                }
            }else {         
                    $Insert = new Cart;
                    $Insert->ID_KH =$ID_KH;
                    $Insert->ID_SP =$ID_SP;
                    $Insert->SoLuong =$Qlt;
                    $Insert->save();
                if ($Insert) {
               return "Thêm thành công";
                }
                
                    
            }
                
        // return "$Qlt $ID_SP $ID_KH  $y $QltAll";

        }else {
            return "Đăng nhập để tiếp tục";
        }
       
    }
    public function AddCart2(Request $request){
        $ID_SP= $request->ID;
        if ( session()->has('ID_KH')) {
            $ID_KH=session()->get('ID_KH');
            $FindC2 = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->count();
            // $Find = array_filter($Find);
                if ($FindC2 != 0) {
                    $Find = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->get();
                    foreach ($Find as $value) {
                        $AddOne = $value['SoLuong']+1;
                    }
                    $Update = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->update(['SoLuong'=>$AddOne]);
                    if ($Update) {
                        return "Thêm thành công";
                    }
                }else {         
                    $Insert = new Cart;
                    $Insert->ID_KH =$ID_KH;
                    $Insert->ID_SP =$ID_SP;
                    $Insert->SoLuong = 1;
                    $Insert->save();
                if ($Insert) {
               return "Thêm thành công";
                }
                
                    
            }
                    
            // return "$Qlt $ID_SP $ID_KH  $y $QltAll";
    
            }else {
                return "Đăng nhập để tiếp tục";
            }
        
    }
    public function deleteCart(Request $request){
        $ID_SP= $request->ID_SP;
        if ( session()->has('ID_KH')) {
            $ID_KH=session()->get('ID_KH');
            $Find = Cart::where('ID_KH', '=',  $ID_KH)->where('ID_SP', '=',  $ID_SP)->delete();
              
                        return "Xóa thành công";
                    
               
            }else {
                return "Đăng nhập để tiếp tục";
            }
      
    }
    public function Edit(Request $request){
         $Name= $request->name;
         $Email= $request->email;
         $SDT= $request->SDT;
         $DiaChi= $request->DiaChi;
         $x=0;
        if ( session()->has('ID_KH')) {
            if ($Name=="") {
                return "Chưa nhập Tên";
               
            }elseif ($Email=="") {
                return "Chưa nhập email";
 
            }elseif ($SDT=="") {
                return "Chưa nhập số điện thoại";
            }
            elseif ($DiaChi=="") {
                return "Chưa nhập địa chỉ";
                
            }else {
                $ID_KH=session()->get('ID_KH');
                $Edit = khachhang::where('ID_KH', '!=', session()->get('ID_KH'))->get();
                foreach ($Edit as $value) {
                  if ($Email == $value['Email']) {
                      $x++;
                  } 
                }
                if ($x>=1) {
                   return "Email đã tồn tại";
                }else {
                    $Update = khachhang::where('ID_KH', '=',  $ID_KH)->update(['TenKhachHang'=>$Name, 'Email'=>$Email, 'SDT'=>$SDT, 'DiaChi'=>$DiaChi]);
                    if ($Update) {
                        return "Sửa thành công";
                    }
                }
                                   
               
            }
                     
                      
        }else {
            return "Đăng nhập để tiếp tục";
        }
      
    }
    public function AddHD(Request $request){
        if ( session()->has('ID_KH')){
            $ID_KH=session()->get('ID_KH');       
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            foreach ($Cart as $key => $value) {
                $Insert = new Hoadon;
                $Insert->ID_KH =$ID_KH;
                $Insert->ID_SP=$value->ID_SP;
                $Insert->TenSP = $value->sanphamLK->TenSP;
                $Insert->Loai = $value->sanphamLK->Loai;
                $Insert->SL = $value->SoLuong ;
                $Insert->Gia = $value->sanphamLK->Gia * $value->SoLuong ;
                $Insert->save();
            }
            return "thêm thành công";
        }else {
            return "Đăng nhập để tiếp tục";
        }
        
    }
    public function AddSP(Request $request){
  
                $Insert = new Sanpham;
                $Insert->TenSP = $request->TenSP;
                $Insert->Loai =  $request->Type;
                $Insert->Gia =  $request->Gia ;
                $Insert->SL = $request->SL ;
                $Insert->img =  $request->Img ;
                $Insert->save();
            if ($Insert) {
                return "thêm thành công";
            }else {
                return "Lỗi";
            }
           
        
    }
    
}
