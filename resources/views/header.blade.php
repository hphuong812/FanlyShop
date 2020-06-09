<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Fanly Shop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--//tags -->
    <base href="{{ asset('') }}">



    <link href="{{route('home')}}/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
    <link href="{{route('home')}}/css/cart.css" rel='stylesheet' type='text/css' media="all" />

    <!-- //for bootstrap working -->

    <link href="{{route('home')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{route('home')}}/css/flexslider.css" type="text/css" media="screen" />
    <link href="{{route('home')}}/css/font-awesome.css" rel="stylesheet">
    <link href="{{route('home')}}/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
    <link href="{{route('home')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link
        href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
        rel='stylesheet' type='text/css'>
</head>

<body>
    <script>
        // function addCart(id) {
        //             $.ajaxSetup({
        //             headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.ajax({
        //             type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
        //             url : 'Test', //gửi dữ liệu sang trang data.php
        //             data : {
        //                 ID: id
        //             }, //dữ liệu sẽ được gửi
        //                                     success : function(data){
        //                                         alert(data);
        //                                         location.reload();
        //                                     }  // Hàm thực thi khi nhận dữ liệu được từ server

        //                                     });



        // };
        function DeleteCart(ID_SP) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST', //Sử dụng kiểu gửi dữ liệu POST
                url: 'deleteCart', //gửi dữ liệu sang trang data.php
                data: {
                    ID_SP: ID_SP

                }, //dữ liệu sẽ được gửi
                success: function (data) {
                    alert(data);
                    // location.reload();
                }
            });


        };
    </script>

    <!-- js -->
    <script type="text/javascript" src="{{route('home')}}/js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <script src="{{route('home')}}/js/modernizr.custom.js"></script>
    <!-- Custom-JavaScript-File-Links -->
    <!-- cart-js -->
    <!-- <script src="js/minicart.min.js"></script> -->
    <!-- script for responsive tabs -->
    <script src="{{route('home')}}/js/easy-responsive-tabs.js"></script>
    <!-- //script for responsive tabs -->
    <!-- stats -->
    <script src="{{route('home')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{route('home')}}/js/jquery.countup.js"></script>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{route('home')}}/js/move-top.js"></script>
    <script type="text/javascript" src="{{route('home')}}/js/jquery.easing.min.js"></script>
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{route('home')}}/js/bootstrap.js"></script>
    <!-- header -->
    <div class="header" id="home">
        <div class="container">
            <ul>
                {{--  @if (Auth::check() == false)
                    <li><i class="fa fa-bar-chart-o" aria-hidden="true"></i> <a
                        href="index2.php">ok nha </a></li>
                    @endif  --}}
                @guest

                <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt"
                            aria-hidden="true"></i> Đăng nhập </a></li>
                <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i> Đăng ký </a></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i> SĐT : 0889654742</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a
                        href="mailto:info@example.com">hnphuong.18it1@sict.udn.vn</a></li>

                @else
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"
                            aria-hidden="true"></i> Đăng xuất </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <li><i class="fa fa-phone" aria-hidden="true"></i> SĐT : 0889654742</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a href="mailto:info@example.com">hnphuong.18it1@sict.udn.vn</a></li>

                @if( Auth::user()->level == 1)
                <li><i class="fa fa-bar-chart-o" aria-hidden="true"></i> <a href="{{route('home')}}/dashboard">Quản lý </a></li>
                @elseif( Auth::user()->level == 2)

                <li><i class="fa fa-bar-chart-o" aria-hidden="true"></i> <a href="#" data-toggle="modal"
                        data-target="#myModalE">Sửa thông tin cá nhân </a></li>
                @endif
                @endguest

            </ul>
        </div>
    </div>
    <!-- //header -->
    <!-- header-bot -->
    <div class="header-bot">
        <div class="header-bot_inner_wthreeinfo_header_mid">
            <div class="col-md-4 header-middle">
                <form method="POST" action="{{ route('product') }}">
                    @csrf
                    <input type="search" name="search" placeholder="Tìm kiếm..." required="">
                    <input type="submit" value=" ">
                    <div class="clearfix"></div>
                </form>
            </div>
            <!-- header-bot -->
            <div class="col-md-4 logo_agile">
                <h1><a href="{{ route('home') }}"><span>F</span>anly Shop </a></h1>
            </div>
            <!-- header-bot -->
            <div class="col-md-4 agileits-social top_content">
                <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                    <li class="share">Chia sẻ : </li>
                    <li><a href="#" class="facebook">
                            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        </a></li>
                    <li><a href="#" class="twitter">
                            <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                        </a></li>
                    <li><a href="#" class="instagram">
                            <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                        </a></li>
                    <li><a href="#" class="pinterest">
                            <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        </a></li>
                </ul>



            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //header-bot -->

    <!-- Modal1 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body modal-body-sub_agile">
                    <div class="col-md-8 modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign">Đăng nhập</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="styled-input agile-styled-input-top">
                                <input id="email" type="email" name="email" required autocomplete="email" autofocus
                                    required="">
                                <label>Email</label>
                                <span></span>
                            </div>
                            <div class="styled-input">
                                <input id="password" type="password" name="password" required="">
                                <label>Mật khẩu</label>
                                <span></span>
                            </div>
                            <input type="submit" value="Đăng nhập">
                        </form>

                        <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                            <li><a href="#" class="facebook">
                                    <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="twitter">
                                    <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="instagram">
                                    <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="pinterest">
                                    <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                </a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p><a href="#" data-toggle="modal" data-target="#myModal2"> Bạn chưa có tài khoản?</a></p>

                    </div>
                    <div class="col-md-4 modal_body_right modal_body_right1">
                        <img src="{{route('home')}}/images/log_pic.jpg" alt=" " />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- //Modal content-->
        </div>
    </div>
    <!-- //Modal1 -->
    <!-- Modal2 -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body modal-body-sub_agile">
                    <div class="col-md-8 modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign">Đăng ký</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="styled-input agile-styled-input-top">
                                <input id="name" type="text" name="name" required="">
                                <label>Họ và tên</label>
                                <span></span>

                            </div>

                            <div class="styled-input">
                                <input id="email" type="email" name="email" required="">
                                <label>Email</label>
                                <span></span>

                            </div>
                            <div class="styled-input">
                                <input id="password" type="password" name="password" required="">
                                <label>Mật khẩu</label>
                                <span></span>
                            </div>
                            <div class="styled-input">
                                <input id="password-confirm" type="password" name="password_confirmation" required="">
                                <label>Nhập lại mật khẩu</label>
                                <span></span>
                            </div>
                            <input type="submit" value="Đăng ký">
                        </form>
                        <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                            <li><a href="#" class="facebook">
                                    <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="twitter">
                                    <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="instagram">
                                    <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="pinterest">
                                    <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                </a></li>
                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div class="col-md-4 modal_body_right modal_body_right1">
                        <img src="{{route('home')}}/images/log_pic.jpg" alt=" " />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- //Modal content-->
        </div>
    </div>
    <!-- //Modal2 -->
    {{-- modalE --}}
    <div class="modal fade" id="myModalE" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body modal-body-sub_agile">
                    <div class="col-md-8 modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign">Sửa thông tin</h3>
                        @guest
                        @else
                        @foreach ($Edit as $item)
                        <form id="Edit">
                            @csrf
                            <div class="styled-input agile-styled-input-top">
                                <input id="name" type="text" name="name" value="{{ $item->TenKhachHang }}" required="">
                                <label>Họ và tên</label>
                                <span></span>

                            </div>

                            <div class="styled-input">
                                <input id="email" type="email" name="email" value="{{ $item->Email }}" required="">
                                <label>Email</label>
                                <span></span>

                            </div>
                            <div class="styled-input">
                                <input id="SDT" type="text" name="SDT" value="{{ $item->SDT }}" required="">
                                <label>Số điện thoại</label>
                                <span></span>
                            </div>
                            <div class="styled-input">
                                <input id="Diachi" type="text" name="DiaChi" value="{{ $item->DiaChi }}" required="">
                                <label>Địa chỉ</label>
                                <span></span>
                            </div>
                            <input type="submit" id="SendDataEdit" value="Xác nhận">
                        </form>
                        @endforeach
                        @endguest

                        {{-- <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
                            <li><a href="#" class="facebook">
                                    <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="twitter">
                                    <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="instagram">
                                    <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                </a></li>
                            <li><a href="#" class="pinterest">
                                    <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                </a></li>
                        </ul> --}}
                        <div class="clearfix"></div>

                    </div>
                    <div class="col-md-4 modal_body_right modal_body_right1">
                        <img src="{{route('home')}}/images/log_pic.jpg" alt=" " />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- //Modal content-->
        </div>
    </div>
    <!-- banner -->
    <div class="ban-top">
        <div class="container">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li class="active menu__item menu__item--current"><a class="menu__link"
                                        href="{{ route('home') }}">Trang chủ<span class="sr-only">(current)</span></a>
                                </li>
                                <li class=" menu__item"><a class="menu__link" href="{{ route('product-all') }}">Sản phẩm</a></li>
                                <li class=" menu__item"><a class="menu__link" href="{{ route('product-men') }}">Nam</a></li>
                                <li class=" menu__item"><a class="menu__link" href="{{ route('product-girl') }}">Nữ</a></li>
                                {{-- <li class="dropdown menu__item">
                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Nam<span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                                <a href="mens.html"><img src="{{route('home')}}/images/top2.jpg"
                                                        alt=" " /></a>
                                            </div>
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="mens.html">Quần áo</a></li>
                                                    <li><a href="mens.html">Ví</a></li>
                                                    <li><a href="mens.html">Giày dép</a></li>
                                                    <li><a href="mens.html">Đồng hồ</a></li>
                                                    <li><a href="mens.html">Phụ kiện</a></li>

                                                </ul>
                                            </div>
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="mens.html">Túi</a></li>
                                                    <li><a href="mens.html">Mũ</a></li>
                                                    <li><a href="mens.html">Trang sức</a></li>
                                                    <li><a href="mens.html">Kính</a></li>
                                                    <li><a href="mens.html">Nước hoa</a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown menu__item">
                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Nữ<span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="womens.html">Quần áo</a></li>
                                                    <li><a href="womens.html">Ví</a></li>
                                                    <li><a href="womens.html">Giày dép</a></li>
                                                    <li><a href="womens.html">Đồng hồ</a></li>
                                                    <li><a href="womens.html">Phụ kiện</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="womens.html">Túi</a></li>
                                                    <li><a href="womens.html">Mũ</a></li>
                                                    <li><a href="womens.html">Trang sức</a></li>
                                                    <li><a href="womens.html">Kính</a></li>
                                                    <li><a href="womens.html">Nước hoa</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                                <a href="womens.html"><img src="{{route('home')}}/images/top1.jpg"
                                                        alt=" " /></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li> --}}
                                <li class=" menu__item"><a class="menu__link" href="contact.html">Liên hệ</a></li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="top_nav_right">
                <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                    <form method="" class="last">
                        @csrf
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="display" value="1">
                        <button class="w3view-cart" id="Cart" type="button" name="Cart" value=""><i
                                class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </form>

                </div>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    {{--  <script>
        // $('#myForm').submit(function (e) {
        //     e.preventDefault();

        //         $.ajax({
        //         type: 'POST',
        //         cache: false,
        //         url: 'ajax',
        //         data: {
        //         "_token": '{{ csrf_token() }}',
        // "name": $("#inputname2").val(),
        // "email": $("#inputemail2").val(),
        // },
        // success: function (data) {
        // alert(data);
        // },

        // });
        // });
        $(document).ready(function () {

            var submit = $("#Send");
            submit.click(function () {


                //Lấy toàn bộ dữ liệu trong Form
                var data = $('form#Signup').serialize();

                //Sử dụng phương thức Ajax.
                $.ajax({
                    type: 'POST', //Sử dụng kiểu gửi dữ liệu POST
                    cache: false,
                    url: 'Signup', //gửi dữ liệu sang trang data.php
                    data: { "_token": '{{ csrf_token() }}', data }, //dữ liệu sẽ được gửi
                    success: function (data) // Hàm thực thi khi nhận dữ liệu được từ server
                    {
                        // if(data == 'false')
                        // {
                        // alert('Nhập sai thông tin');
                        // }else{
                        // alert(data);
                        // // window.location.href = "https://www.google.com";
                        // }
                        alert(data);
                    }
                });

            });
        });
    </script> --}}

    <script>
        $(document).ready(function () {

            var submit = $("#SendDataEdit");
            submit.click(function () {

                //Lấy toàn bộ dữ liệu trong Form
                var data = $('form#Edit').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //Sử dụng phương thức Ajax.
                $.ajax({
                    type: 'POST', //Sử dụng kiểu gửi dữ liệu POST
                    url: 'Edit', //gửi dữ liệu sang trang data.php
                    data: data, //dữ liệu sẽ được gửi
                    success: function (data)  // Hàm thực thi khi nhận dữ liệu được từ server
                    {
                        alert(data);
                        location.reload();
                    }
                });
                return false;
            });
        });

    </script>
    <script>
        $(document).on('click', '#Cart', function () {
            $('#myModal3').modal('show');
        });

    </script>
    <!-- //banner-top -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body modal-body-sub_agile">
                    <div class="col-md-12">
                        <h3 class="agileinfo_sign">Giỏ hàng</h3>
                        <hr>
                        <form id="">

                            <div class="row" style="font-size: 1rem; height: 300px; overflow: auto;">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col-2"> </th>
                                                    <th scope="col-3">Tên sản phẩm</th>
                                                    <th scope="col-1" class="text-center" style="width: 100px">Số lượng
                                                    </th>
                                                    <th scope="col-2" class="text-right">Giá</th>
                                                    <th scope="col-2"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ( session()->has('ID_KH'))
                                                @foreach ($Cart as $item)
                                                <tr>
                                                    <td><img src="images/{{ $item->sanphamLK->img }}"
                                                            style='width: 50px;' />
                                                    </td>
                                                    <td>{{ $item->sanphamLK->TenSP }}</td>

                                                    <td><input class="form-control" type="number"
                                                            value="{{ $item ->SoLuong }}" /></td>
                                                    <td class="text-right">
                                                        {{ $item ->sanphamLK->Gia *  $item ->SoLuong  }}</td>

                                                    <td class="text-right">
                                                        <form> @csrf <button class="btn btn-sm btn-danger deleteCart"
                                                                onclick="DeleteCart({{ $item ->ID_SP }})"><i
                                                                    class="fa fa-trash"></i> </button> </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif



                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>le
                            <br>
                            <div class="col-2">
                                <h5 style="margin-top: 2%;">Giá tiền: đ</h5>

                                <br>
                                <h5>Giao hàng: 20 000đ</h5>

                                <br>
                                <h5><strong>Tổng tiền: đ</strong></h5>

                                </h5>
                            </div>

                        </form>
                        @guest
                        @else
                        <a href="{{ route('home') }}/thanhtoan">
                            <input type="button"  value="THANH TOÁN" 
                                style="float: right;margin-top: -15%;" onclick="OKCart()">
                        </a>
                        @endguest
                            

                        

                        <div class="clearfix"></div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- //Modal content-->
        </div>
    </div>
    <script>
        function OKCart() {

            window.location.replace({{ route('home') }}"/thanhtoan");
        };
        $(document).on('click', '#ThanhToan', function () {
            //Lấy toàn bộ dữ liệu trong Form
            var data = $('form#ThanhToan').serialize();
            // var data = document.getElementById("ID").value;
            //Sử dụng phương thức Ajax.
            $.ajax({
                type: 'GET', //Sử dụng kiểu gửi dữ liệu POST
                url: 'OKCart.php', //gửi dữ liệu sang trang data.php
                data:
                    data
                , //dữ liệu sẽ được gửi
                success: function (data)  // Hàm thực thi khi nhận dữ liệu được từ server
                {



                }
            });
            return false;
        });

    </script>