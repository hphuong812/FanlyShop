@extends('master')
@section('content')
<script>
   
           function AddHD(ID_KH) {
                       $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST', //Sử dụng kiểu gửi dữ liệu POST
                            url: 'AddHD', //gửi dữ liệu sang trang data.php
                            data:{
                                ID_KH: ID_KH
                            } , //dữ liệu sẽ được gửi
                            success: function (data) {
                                alert(data);
                                // location.reload();
                            }
                        });
           
    
           };
    
    </script>
    @guest
    @else
    <div class="row" style="    margin-top: 5%;margin-bottom: 5%">
        <div class="col-md-6" style="    margin-left: 10%;">
            <h3>
                DANH SÁCH SẢN PHẨM
            </h3>
            <hr>
            <div class="table-responsive" style="    margin-left: 2%; height: 500px; overflow: auto;">
                <table class="table table-striped" style="    font-size: 110%;">
                    <thead>
                        <tr>
                            <th scope="col-1"> </th>
                            <th scope="col-3">Tên sản phẩm</th>
                            <th scope="col-1" class="text-center" style="width: 100px">Số lượng</th>
                            <th scope="col-2" class="text-right">Giá</th>
                            <th scope="col-2"> </th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($Cart as $item)
                           
                     
                        <tr>
                            <td><img src="images/{{ $item->sanphamLK->img }}" style='width: 70px;' />
                            </td>
                            <td>{{ $item->sanphamLK->TenSP }}</td>
    
                            <td><input class="form-control" type="number" value="{{ $item ->SoLuong }}" /></td>
                            <td class="text-right">{{ $item ->sanphamLK->Gia *  $item ->SoLuong  }}</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger deleteCart"
                                    onclick="DeleteCart({{ $item ->ID_SP }})"><i
                                        class="fa fa-trash"></i> </button> </td>
                        </tr>
                        @endforeach
    
    
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
        
        <div class="col-md-3">
            <div>
                <h3>
                    ĐƠN HÀNG
                </h3>
                <div style="    border: 1px solid #ccc;
                                padding: 25px;
                                float: left;
                                width: 100%;
                                border-radius: 5px;
                                margin-top: 5%;">
                                
    
                @foreach ($Edit as $item)
                    <h4>
                        <i class="fa fa-user" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Tên khách hàng:  </strong> {{ $item->TenKhachHang }}
                    </h4>
                    <hr>
                    <h4>
                        <i class="fa fa-envelope" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Email:  </strong> {{ $item->Email }}
                    </h4>
                    <hr>
                    <h4>
                        <i class="fa fa-phone" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Số điện thoại:  </strong> {{ $item->SDT }}
                    </h4>
                    <hr>
                    <h4>
                        <i class="fa fa-thumb-tack" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Địa chỉ:  </strong>{{ $item->DiaChi }}
                    </h4>
                    <hr>
                    <h4>
                        <i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Tổng đơn hàng:  </strong>{{ $GiaAll }} đ
                    </h4>
                    <hr>
                    <h4>
                        <i class="fa fa-ambulance" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Phí vận chuyển:  </strong>20000 đ
                    </h4>
                    <hr>
                    <h4>
                        <i class="fa fa-credit-card" aria-hidden="true" style="margin-right:5%;margin-left:5%"></i><strong> Tổng tiền:  </strong>{{ $GiaAll + 20000 }} đ
                    </h4>
                    <hr>
                   
                        
                        @guest
                        @else
                        <form>
                            @csrf
                    <button style="width: calc(100% + 0px);
                                    border: 0px;
                                    border-radius: 4px;
                                    background: black;
                                    font-weight: bold;
                                    text-align: center;
                                    color: #fff;
                                    font-size: 20px;
                                    text-transform: uppercase;
                                    padding: 15px;
                                    position: relative;
                                    float: left;
                                    text-decoration: none;
                                    margin-top: 10px;" onclick="AddHD({{ session()->get('ID_KH') }})">
                        MUA HÀNG
                    </button>
                </form>
                    @endguest
                  
                @endforeach
    
                </div>
            </div>
        </div>
    </div>
    @endguest
    
@endsection