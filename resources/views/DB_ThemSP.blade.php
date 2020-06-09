@extends('master_DB')
@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-left: 10% ;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style=" padding-top: 5%;">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form_input">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="TenSP" placeholder="Nhập tên sản phẩm" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">loại sản phẩm</label>
                    <select name="Type" class="form-control" id="exampleFormControlSelect1">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Giày dép</option>
                        <option>Phụ kiện</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Số lượng sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="SL" placeholder="nhập số lượng sản phẩm" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Giá sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="Gia" placeholder="nhập Giá sản phẩm" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" >
                        <label class="custom-file-label" for="exampleInputFile" id="textchange">Chọn ảnh</label>
                        <input type="hidden" name="Img" id="IMG" value="null">
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" style="text-align: center;">
                  <button type="submit" id="gui" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  $(document).ready(function()
    { 
        var submit = $("#gui");
       
        submit.click(function()
        {
          var value = $( "#textchange" ).text();
          $( "input#IMG" ).val(value);
            //Lấy toàn bộ dữ liệu trong Form
            var data = $('form#form_input').serialize();
            $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            //Sử dụng phương thức Ajax.
            $.ajax({
                type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                url : 'AddSP', //gửi dữ liệu sang trang data.php
                data : data, //dữ liệu sẽ được gửi
                success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            { 
                           
                                alert(data);
                            
                                location.reload();
                                // window.location.href = "https://www.google.com";
                            
                            }
                });
                return false;
            });
        });

</script>
<!-- <script>
    //Hàm đọc giá trị và hiện thị thông tin
    function textthaydoi() {
        var value = $( this ).val();
        $( "input#IMG" ).val(value);
    }

    //Bắt sự kiện keyup của textbox
    $( "#textchange" ).keyup(textthaydoi);

    //Cho #inputext phát sinh một sự kiện keyup ban đầu
    $( "#textchange" ).keyup();

</script> -->

<!-- jQuery -->
<script src="{{route('home')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{route('home')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{route('home')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="{{route('home')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{route('home')}}/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

@endsection