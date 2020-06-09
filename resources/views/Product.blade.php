@extends('master')
@section('content')
<div class="tab1">
    <!-- ----------- -->
<script>
      function addCart(id) {
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                    url : 'AddCart', //gửi dữ liệu sang trang data.php
                    data : {
                        ID: id
                    }, //dữ liệu sẽ được gửi
                                            success : function(data){
                                                alert(data);
                                                location.reload();
                                            }  // Hàm thực thi khi nhận dữ liệu được từ server
                                                        
                                            });
                // $.ajax({
                //     type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                //     url : 'Test', //gửi dữ liệu sang trang data.php
                //     data : {
                //         ID: id
                //     }, //dữ liệu sẽ được gửi
                //     success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                //                 {
                //                     if (data ==='Đăng nhập để tiếp tục') {
                //                         alert(data);
                //                     }else{
                //                         alert('Thêm thành công');
                //                         location.reload();
                //                     $('#myModal3').modal('show');
                //                     }
                                    
                                
                                
                //                 }
                //     });
        

        };
        $(document).ready(function(){ /* PREPARE THE SCRIPT */
            $("select[name='sapxep']").change(function(){/* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
            var Sapxep = $(this).val(); 
            
            if (Sapxep == 1) {
                location.href = '{{ route('sapxep-ten-A-Z') }}';
                
            }
            if (Sapxep == 2) {
                location.href = '{{ route('sapxep-ten-Z-A') }}';
                
            }
            if (Sapxep == 3) {
                location.href = '{{ route('sapxep-gia-C-T') }}';
                
            }
            if (Sapxep == 4) {
                location.href = '{{ route('sapxep-ten-T-C') }}';
                
            }
            if (Sapxep == 0) {
                location.href = '{{ route('khong-sapxep') }}';
                
            }
                
            });
        });
</script>
       <!-- /banner_bottom_agile_info -->
	   <div class="page-head_agile_info_w3l" style="margin-bottom: 2%">
        <div class="container">
            <h3><span>Trang</span> sản phẩm </h3>
            <!--/w3_short-->
                 <div class="services-breadcrumb">
                        <div class="agile_inner_breadcrumb">

                           <ul class="w3_short">
                                <li><a href="index.html">Trang chủ</a><i>|</i></li>
                                <li>Trang sản phẩm</li>
                            </ul>
                         </div>
                </div>
       <!--//w3_short-->
    </div>
</div>
<div class="sort-grid" style="margin-right: 2%;margin-left: 2%">
    <div class="sorting" style="margin-left: 4%">
        <h6>Sắp xếp</h6>
    @if (session()->has('ChiMuc'))
        @if (session()->get('ChiMuc')=='1')
        <select name="sapxep" id="Sapxep" class="frm-field required sect">
            <option value="1">Tên(A - Z)</option> 
            <option value="0">Bình thường</option>
            <option value="2">Tên(Z - A)</option>
            <option value="3">Giá(cao - thấp)</option>
            <option value="4">Giá(thấp - cao)</option>						
        </select>
        @endif
        @if (session()->get('ChiMuc')=='2')
        <select name="sapxep" id="Sapxep" class="frm-field required sect">
            <option value="2">Tên(Z - A)</option>
            <option value="1">Tên(A - Z)</option> 
            <option value="0">Bình thường</option>
            <option value="3">Giá(cao - thấp)</option>
            <option value="4">Giá(thấp - cao)</option>						
        </select>
        @endif
        @if (session()->get('ChiMuc')=='3')
        <select name="sapxep" id="Sapxep" class="frm-field required sect">
            <option value="3">Giá(cao - thấp)</option>
            <option value="1">Tên(A - Z)</option> 
            <option value="0">Bình thường</option>
            <option value="2">Tên(Z - A)</option>
            <option value="4">Giá(thấp - cao)</option>						
        </select>
        @endif
        @if (session()->get('ChiMuc')=='4')
        <select name="sapxep" id="Sapxep" class="frm-field required sect">
            <option value="4">Giá(thấp - cao)</option>
            <option value="1">Tên(A - Z)</option> 
            <option value="0">Bình thường</option>
            <option value="2">Tên(Z - A)</option>
            <option value="3">Giá(cao - thấp)</option>						
        </select>
        @endif
       
        @if (session()->get('ChiMuc')=='0')
            <select name="sapxep" id="Sapxep" class="frm-field required sect">
                <option value="0">Bình thường</option>
                <option value="1">Tên(A - Z)</option> 
                <option value="2">Tên(Z - A)</option>
                <option value="3">Giá(cao - thấp)</option>
                <option value="4">Giá(thấp - cao)</option>						
            </select>
            @endif

        
    @else
    <select name="sapxep" id="Sapxep" class="frm-field required sect">
        <option value="0">Bình thường</option>
        <option value="1">Tên(A - Z)</option> 
        <option value="2">Tên(Z - A)</option>
        <option value="3">Giá(cao - thấp)</option>
        <option value="4">Giá(thấp - cao)</option>						
    </select>

    
    @endif
        
    
        <div class="clearfix"></div>
    </div>
    {{-- <div class="sorting">
        <h6>Showing</h6>
        <select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
            <option value="null">7</option>
            <option value="null">14</option> 
            <option value="null">28</option>					
            <option value="null">35</option>								
        </select>
        <div class="clearfix"></div>
    </div> --}}
    <div class="clearfix"></div>
</div>
 <div class="resp-tabs-container" style="margin-left: 5%;margin-right: 5%" id="ok">
    @foreach ($Product as $item)
    <div class="col-md-3 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
            <div class="men-thumb-item">
                <img src="images/{{ $item ->img }} " alt="" class="pro-image-front">
                <img src="images/{{ $item ->img }} " alt="" class="pro-image-back">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="{{ route('home')}}/if/{{$item ->ID_SP}}" class="link-product-add-cart">Xem thêm</a>
                        
                    </div>
                </div>
                <span class="product-new-top">Mới</span>

            </div>
            <div class="item-info-product ">
                <h4><a href="single.html"> {{ $item ->TenSP }}  </a></h4>
                <div class="info-product-price">
                    <span class="item_price">{{ $item ->Gia *70/100 }}đ</span>
                    <del>{{ $item ->Gia }}đ</del>
                </div>
                <div
                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                    
                        <form >
                            @csrf
                              
                        <input type="button" value="Thêm vào giỏ hàng" class="button ADD" onclick="addCart({{ $item ->ID_SP }})" />
                        </form>
                        

                    
                </div>

            </div>
        </div>
    </div>
   
    @endforeach
    @if (session()->has('Page'))
    <div class="row" style="float: right;">
        {!! $Product->links() !!}
    </div>
    @endif
    </div>
    <!--  -->
    <script>
       $(document).ready(function(){
        $(document).on('click','.pagination a',function(event){
            event.preventDefault();
            var page =$(this).attr('href').split('page=')[1];
            fetch_data(page);
        })
        function fetch_data(page)
            {
            $.ajax({
            url:"product-all-ajax?page="+page,
            success:function(data)
            {
                $('body').html(data);
            }
            });
            }
       });
      </script>
    
    <!--  -->

    <!-- -------------------------- -->

    <div class="clearfix"></div>
</div>
<div class="sale-w3ls" style="margin-top: 10%">
    <div class="container">
        <h6>Khuyến mãi ngắn hạn <span>40%</span></h6>

        <a class="hvr-outline-out button2" href="single.html">Xem thêm </a>
    </div>
</div>

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
<!-- Custom-JavaScript-File-Links -->
<!-- cart-js -->
<!-- <script src="js/minicart.min.js"></script>
<script>

paypal.minicart.render({
    action: '#'
});

if (~window.location.search.indexOf('reset=true')) {
    paypal.minicart.reset();
}
</script> -->

<!-- //cart-js -->
<!-- script for responsive tabs -->
<script>
$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true,   // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function (event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
    $('#verticalTab').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true
    });
});
</script>

<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.countup.js"></script>
<script>
$('.counter').countUp();
</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$(".scroll").click(function(event){		
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
});
});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
$(document).ready(function() {
    /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
    */
                        
    $().UItoTop({ easingType: 'easeOutQuart' });
                        
    });
</script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>

@endsection