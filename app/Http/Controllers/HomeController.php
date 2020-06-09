<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Sanpham;
use App\Cart;
use App\khachhang;
use App\Hoadon;
use Illuminate\Http\Request;
use lluminate\Database\Eloquent\Collection;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ProductMen = Sanpham::where('Loai', '=', 'Nam')->get();
        $ProductGirl = Sanpham::where('Loai', '=', 'Nữ')->get();
        $ProductPK = Sanpham::where('Loai', '=', 'Phụ kiện')->get();
        $ProductGD = Sanpham::where('Loai', '=', 'Giày dép')->get();
        
 
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }else {
                session()->put('ID_KH',Auth::user()->id);
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','Cart','Edit','ProductGD'));
            }
            
        }
            return view('TrangChu',compact('ProductMen','ProductGirl','ProductPK','ProductGD')); 
        
        
    }
    public function ProductInfo($id)
    {
        $ProductIF = Sanpham::where('ID_SP', '=', $id)->get();
        session()->put('ID_SP',$id);
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('ProductInfo',compact('ProductIF','Cart','Edit'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            return view('ProductInfo',compact('ProductIF','Cart'));
            }
        }
        
        return view('ProductInfo',compact('ProductIF'));
    }
    public function Thanhtoan()
    {
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                foreach ($Cart as $key => $value) {
                    $gia = intval($value->sanphamLK->Gia);
                    $sl = intval($value['SoLuong']);
                   $GiaAll = $gia*$sl  ;
                }
              
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                return view('ThanhToan',compact('Cart','Edit','GiaAll'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            return view('ThanhToan',compact('Cart'));
            }
        }else {
            return view('ThanhToan');  
        }
                 
    }
   
    public function product(Request $request)
    {    
        $Search='%'.$request->search.'%';
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        session()->put('Search',$Search);
        if (session()->has('Loai')) {
            session()->forget('Loai') ;
        }
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->get();
                $ProductCount = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->count();
                return view('Product',compact('Cart','Edit','Product','ProductCount'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->get();
            $ProductCount = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->count();
            return view('Product',compact('Cart','Product','ProductCount','Edit'));
            }
        }else {
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->get();
            $ProductCount = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->count();
            // dd($Product);
            return view('Product',compact('Product','ProductCount'));  
            // return "$Product";
        }
                 
    }
    public function productAll(Request $request)
    {    if (session()->has('ChiMuc')) {
        session()->forget('ChiMuc') ;
    }
        if (session()->has('Loai')) {
            session()->forget('Loai') ;
        }
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Product = Sanpham:: paginate(8);
                session()->put('Page','1');
                return view('Product',compact('Cart','Edit','Product'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Product = Sanpham:: paginate(8);
            session()->put('Page','1');
            return view('Product',compact('Cart','Product','Edit'));
            }
        }else {
            $Product = Sanpham:: paginate(8);
            // dd($Product);
            session()->put('Page','1');
            return view('Product',compact('Product'));  
            // return "$Product";
        }
                 
    }
    public function productAllajax(Request $request)
    {    if (session()->has('ChiMuc')) {
            session()->forget('ChiMuc') ;
        }
        if (session()->has('Loai')) {
            session()->forget('Loai') ;
        }
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Product = Sanpham:: paginate(8);
                return view('Product',compact('Cart','Edit','Product'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Product = Sanpham:: paginate(8);
            return view('Product',compact('Cart','Product','Edit'));
            }
            if($request->ajax()){
                session()->put('ID_KH',Auth::user()->id);
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Product = Sanpham:: paginate(8);
                return view('Product',compact('Cart','Product','Edit'));
              }      
        }else {
            $Product = Sanpham::paginate(8);
            // dd($Product);
            return view('Product',compact('Product'));  
            // return "$Product";
        }
                 
    }
    public function ProductMen(){
        $Product = Sanpham::where('Loai', '=', 'Nam')->get();
        if (session()->has('ChiMuc')) {
            session()->forget('ChiMuc') ;
        }
        if (session()->has('Search')) {
            session()->forget('Search') ;
        }
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                session()->put('Loai','Nam');
                return view('Product',compact('Cart','Edit','Product'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            session()->put('Loai','Nam');
            return view('Product',compact('Cart','Product','Edit'));
            }
        }else {
            session()->put('Loai','Nam');
            return view('Product',compact('Product'));  
            // return "$Product";
        }
    }
    public function ProductGirl(){
        $Product = Sanpham::where('Loai', '=', 'Nữ')->get();
        if (session()->has('ChiMuc')) {
            session()->forget('ChiMuc') ;
        }
        if (session()->has('Search')) {
            session()->forget('Search') ;
        }
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        if(Auth::check()){
            if (Auth::user()->level == 2) {
                session()->put('ID_KH',Auth::user()->id);
                $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                session()->put('Loai','Nữ');
                return view('Product',compact('Cart','Edit','Product'));
            }else {
            session()->put('ID_KH',Auth::user()->id);
            $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
            $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get();
            session()->put('Loai','Nữ');
            return view('Product',compact('Cart','Product','Edit'));
            }
        }else {
            session()->put('Loai','Nữ');
            return view('Product',compact('Product'));  
            // return "$Product";
        }
    }
    // a-Z
    public function SapXep1()
    {   
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        $Search= session()->get('Search');
        if (session()->has('Loai')) {
            $Loai=session()->get('Loai');
            $Product = Sanpham::where('Loai', '=', $Loai)->orderBy('TenSP', 'asc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','1');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','1');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','1');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
                 
        }else {
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->orderBy('TenSP', 'asc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','1');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','1');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','1');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
        }
    }
    // Z-a
    public function SapXep2()
    {   
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        $Search= session()->get('Search');
        if (session()->has('Loai')) {
            $Loai=session()->get('Loai');
            $Product = Sanpham::where('Loai', '=', $Loai)->orderBy('TenSP', 'desc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','2');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','2');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','2');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
                 
        }else {
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->orderBy('TenSP', 'desc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','2');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','2');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','2');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
        }
    }
    //cao-thấp
    public function SapXep3()
    {
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        $Search= session()->get('Search');
        if (session()->has('Loai')) {
            $Loai=session()->get('Loai');
            $Product = Sanpham::where('Loai', '=', $Loai)->orderBy('Gia', 'desc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','3');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','3');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','3');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
                 
        }else {
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->orderBy('Gia', 'desc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','3');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','3');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','3');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
        }
    }
    // thấp -cao
    public function SapXep4()
    {
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        $Search= session()->get('Search');
        if (session()->has('Loai')) {
            $Loai=session()->get('Loai');
            $Product = Sanpham::where('Loai', '=', $Loai)->orderBy('Gia', 'asc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','4');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','4');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','4');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
                 
        }else {
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->orderBy('Gia', 'asc')->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','4');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','4');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','4');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
        }
    }
    //ko
    public function SapXep0()
    {
        if (session()->has('Page')) {
            session()->forget('Page') ;
        }
        if (session()->has('ChiMuc')) {
            session()->forget('ChiMuc') ;
        }
        $Search= session()->get('Search');
        if (session()->has('Loai')) {
            $Loai=session()->get('Loai');
            $Product = Sanpham::where('Loai', '=', $Loai)->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','0');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','0');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','0');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
                 
        }else {
            $Product = Sanpham::where('TenSP', 'like', $Search )->orWhere('Loai', 'like', $Search)->get();
            if(Auth::check()){
                if (Auth::user()->level == 2) {
                    session()->put('ID_KH',Auth::user()->id);
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','0');
                    return view('Product',compact('Cart','Edit','Product'));
                }else {
                    session()->put('ID_KH',Auth::user()->id);
                    $Edit = khachhang::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    $Cart = Cart::where('ID_KH', '=', session()->get('ID_KH'))->get(); 
                    session()->put('ChiMuc','0');
                    return view('Product',compact('Cart','Product','Edit'));
                }
            } else {
                session()->put('ChiMuc','0');
                return view('Product',compact('Product'));  
                // return "$Product";
            }
        }
    }
}
