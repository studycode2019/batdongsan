@extends('layouts.master')
@section('title', 'BDS')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="text-uppercase">KHÁCH HÀNG: {{$client->name}}</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thông tin khách hàng</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-check"></i> Thành công!</h5>
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif
      @foreach($clients as $data)
      <div class="row">
        <!-- /.col -->
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center">{{$data->name}}</h3>
              <!--<p class="text-muted text-center">Software Engineer</p>-->
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Số điện thoại</b> <a class="float-right" href="#">{{$data->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Ngày sinh</b> <a class="float-right">{{$data->birthday}}</a>
                </li>
                <li class="list-group-item">
                  <b>Zalo</b><a class="float-right" href="#">{{$data->zalo}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b><a class="float-right">{{$data->email}}</a>
                </li>
              </ul>
              <a href="#" class="btn btn-block btn-default" id="btnThemphieuchi">
              <i class="fa fa-arrow-right"></i> Thêm phiếu chi (F6)
              </a>
              <a href="#" class="btn btn-block btn-default" id="btnThemphieuthu">
              <i class="fa fa-arrow-left"></i> Thêm phiếu thu (F7)
              </a>
              <a href="#" class="btn btn-block btn-default" id="btnThembiennhan">
              <i class="fa fa-book"></i> Thêm biên nhận (F8)
              </a>
              <a href="#" class="btn btn-block btn-default" id="btnThemvaolop">
              <i class="fa fa-university"></i> Thêm vào lớp (F9)
              </a>
            <a href="/client-edit/{{$data->id}}" class="btn btn-info btn-block"><b>Sửa thông tin</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-9">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Danh sách Hợp Đồng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Ngày/Tháng</th>
                    <th>Mã HD</th>
                    <th>Loại HD</th>
                    <th>Tiến độ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($client->tickets as $data) --}}
                  <tr>
                    <td>date</td>
                    <td>id</td>
                    <td>data</td>
                    <td>
                      <span class="#">name</span>
                    </td>
                    <td><a href="#" class="btn btn-primary">Xem</a></td>
                  </tr>
                  {{-- @endforeach --}}
                  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card card-info">
            <div class="card-header">
              <h3 class="card-title">Danh sách lớp đã tham gia</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tên lớp</th>
                    <th>Ưu đãi</th>
                    <th>Học phí</th>
                    <th>Đã thu</th>
                    <th>Còn lại</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($client->courseStudents as $data) --}}
                  <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td><a href="#" class="btn btn-primary">Sửa</a></td>
                  </tr>
                  {{-- @endforeach --}}
                  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "order": [[ 1, "desc" ]],
        "language": {
          "sProcessing":   "Đang xử lý...",
          "sLengthMenu":   "Xem _MENU_ mục",
          "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
          "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
          "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
          "sInfoFiltered": "(được lọc từ _MAX_ mục)",
          "sInfoPostFix":  "",
          "sSearch":       "Tìm:",
          "sUrl":          "",
          "oPaginate": {
            "sFirst":    "Đầu",
            "sPrevious": "Trước",
            "sNext":     "Tiếp",
            "sLast":     "Cuối"
          }
        }
    });
    $("#example2").DataTable({
        "order": [[ 1, "desc" ]],
        "language": {
          "sProcessing":   "Đang xử lý...",
          "sLengthMenu":   "Xem _MENU_ mục",
          "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
          "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
          "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
          "sInfoFiltered": "(được lọc từ _MAX_ mục)",
          "sInfoPostFix":  "",
          "sSearch":       "Tìm:",
          "sUrl":          "",
          "oPaginate": {
            "sFirst":    "Đầu",
            "sPrevious": "Trước",
            "sNext":     "Tiếp",
            "sLast":     "Cuối"
          }
        }
    });
  });
  window.onkeydown = function(evt) {
    if (evt.keyCode == 117) //F6
        document.getElementById("btnThemphieuchi").click();
    if (evt.keyCode == 118) //F7
        document.getElementById("btnThemphieuthu").click();
    if (evt.keyCode == 119) //F8
        document.getElementById("btnThembiennhan").click();
    if (evt.keyCode == 120) //F9
        document.getElementById("btnThemvaolop").click();
  };
</script>
@stop
