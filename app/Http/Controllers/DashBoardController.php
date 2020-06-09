<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Sanpham;
use App\Cart;
use App\khachhang;
use App\Hoadon;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function dashboard()
    {
       
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
         $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
        if(Auth::check()){
            if (Auth::user()->level == 1) {
                $DoanhThu= Hoadon::all()->sum('Gia');
                // sp yêu thích
                $SanPhamYeuThich= Hoadon::all();
                $i1=0;
                $i3=0;
                $i2=0;
                $i4=0;
                foreach ($SanPhamYeuThich as $key => $value) {
                    if ($value['Loai'] ==='Nam') {
                        $i1++;
                      }elseif ($value['Loai']==='Nữ') {
                        $i2++;
                      }elseif ($value['Loai']==='Giày dép') {
                        $i3++;
                      }else{
                        $i4++;
                      }
                }
                if ($i1>$i2 and $i1 > $i3 and $i1 > $i4) {
                    $LoaiYeuThich = 'Nam';
                  }elseif ($i2>$i1 and $i2 > $i3 and $i2 > $i4) {
                    $LoaiYeuThich ='Nữ';
                  }elseif ($i3>$i1 and $i3 > $i2 and $i3 > $i4) {
                    $LoaiYeuThich ='Giày dép';
                  }else{
                    $LoaiYeuThich = 'Phụ kiện';
                  }
                  // Sản phẩm bán chạy
                  $SoLuongChay= Hoadon::all()->max('SL');
                  $SanPhamBanChay = Hoadon::where('SL','=',$SoLuongChay)->get();
                  //Số Lượng đã bán
                  $SoLuongBan= Hoadon::all()->sum('SL');
                  // lấy tình trạng sản phẩm
                  $TinhTrangSP= Sanpham::all();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";

                return view('DB_TrangChu',compact('DoanhThu','LoaiYeuThich','SanPhamBanChay','SoLuongBan','TinhTrangSP'));
            }else {
                session()->put('ID_KH',Auth::user()->id);

                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
        }else {
           
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
                 
    }
    public function ThemSP(){
        if(Auth::check()){
            if (Auth::user()->level == 1) {
                return view('DB_ThemSP');
            }else {
                return "Không có quyền truy cập";
            }
        }else {
            $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
            $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
             $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
            $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
    }
    public function DanhSachSP()
    {
       
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
         $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
        if(Auth::check()){
            if (Auth::user()->level == 1) {
               
                  // lấy tình trạng sản phẩm
                  $DanhSachSP= Sanpham::all();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";

                return view('DB_DanhSachSP',compact('DanhSachSP'));
            }else {
                session()->put('ID_KH',Auth::user()->id);

                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
        }else {
           
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
                 
    }
    public function DanhSachSPTK(Request $request)
    {
       
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
         $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
        if(Auth::check()){
            if (Auth::user()->level == 1) {
                  // lấy tình trạng sản phẩm
                  $Search = '%'.$request->search.'%';
                  $DanhSachSP= Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->get();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";

                return view('DB_DanhSachSP',compact('DanhSachSP'));
            }else {
                session()->put('ID_KH',Auth::user()->id);

                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
        }else {
           
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
                 
    }
    public function DanhSachHD()
    {
       
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
         $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
        if(Auth::check()){
            if (Auth::user()->level == 1) {
               
                  // lấy tình trạng sản phẩm
                  $DanhSachHD= Hoadon::all();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";

                return view('DB_DanhSachHD',compact('DanhSachHD'));
            }else {
                session()->put('ID_KH',Auth::user()->id);

                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
        }else {
           
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
                 
    }
    public function DanhSachKH()
    {
       
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
         $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
        if(Auth::check()){
            if (Auth::user()->level == 1) {
               
                  // lấy tình trạng sản phẩm
                  $DanhSachKH= khachhang::all();
                // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";

                return view('DB_DanhSachKH',compact('DanhSachKH'));
            }else {
                session()->put('ID_KH',Auth::user()->id);

                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
        }else {
           
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
                 
    }
    public function editor(){
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
         $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
        if(Auth::check()){
            if (Auth::user()->level == 1) {
                return view('DB_Editor');
            }else {
                session()->put('ID_KH',Auth::user()->id);

                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
        }else {
           
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        }
    }
    public function DeleteProduct(Request $request){
        $ID_SP= $request->ID_SP;
      
         $Find = Sanpham::where('ID_SP', '=',  $ID_SP)->delete();
              if ( $Find) {
                if(Auth::check()){
                    if (Auth::user()->level == 1) {
                       
                          // lấy tình trạng sản phẩm
                          $DanhSachSP= Sanpham::all();
                        // return "$i1 $i2 $i3 $i4 $LoaiYeuThich $SanPhamBanChay ";
        
                        return view('DB_DanhSachSP',compact('DanhSachSP'));
                        }else {
                        session()->put('ID_KH',Auth::user()->id);
        
                        $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                        $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                        return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
                    }
                }
              }
                        // return "Xóa thành công  $ID_SP";
                    

    }
}
