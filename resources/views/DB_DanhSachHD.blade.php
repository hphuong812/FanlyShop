@extends('master_DB')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           
        </div>
        <div class="modal-body">
            <p>Bạn có chắc chắn muốn xóa sản phẩm này!</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="modal-btn-si">Yes</button>
            <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
        </div>
        </div>
    </div>
    </div>

    <div class="alert" role="alert" id="result"></div>
</div>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Danh sách đơn hàng</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh sách đơn hàng</li>
    </ol>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-12">
  <div class="card">
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Tên khách hàng</th>
          <th>Tên sản phẩm</th>
          <th>Loại</th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Ngày thêm</th>
         
          
        </tr>
        </thead>
        <tbody>
        @foreach ($DanhSachHD as $item)
            
        
                  <tr>
                  <td>{{ $item->KH->TenKhachHang }}</td>
                  <td>{{ $item->TenSP }}
                  </td>
                  <td>{{ $item->Loai }}</td>
                  <td>{{ $item->SL }}</td>
                  <td>{{ $item->Gia }}</td>
                  <td>{{ $item->NgayThem }}</td>
                  </tr>
                  @endforeach
        
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

 
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{route('home')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{route('home')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{route('home')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{route('home')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{route('home')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{route('home')}}/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function () {
$("#example1").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>
</body>
</html>
@endsection