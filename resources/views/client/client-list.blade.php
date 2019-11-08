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
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">danh sách khách hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row offset-0">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">
                      <h3 class="text-uppercase">Danh sách Khách Hàng</h3>
                    </h3>
                  </div>
                  <div class="col">
                    <div class="text-right">
                      <a class="btn btn-primary" href="/home/thembds">
                        <i class="fas fa-folder"></i>
                        Nhập Khách Hàng
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="text-center text-uppercase">
                        <th style="width:5%">Mã KH</th>
                        <th style="width:20%">Tên khách hàng</th>
                        <th style="width:15%">Số điện thoại</th>
                        <th style="width:20%">Hợp đồng</th>
                        <th style="width:15%">Trình trạng</th>
                        <th style="width:15%">
                            button
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $data)
                <tr>
                  {{-- <td>@if (isset($data->birthday)) {{date("d/m/Y", strtotime())}} @else Không có @endif</td> --}}
                  <td class="text-center">{{$data->id}}</td>
                  <td class="text-uppercase">{{$data->name}}</td>
                  <td class="text-right">{{$data->phone}}</td>
                  <td class="text-right">HD</td>
                  <td class="text-right">Trình Trạng</td>
                  <td class="project-actions text-center">
                  <a class="btn btn-primary btn-sm" href="{{ route('client-view.get',['id' => $data->id])}}">
                        <i class="fas fa-folder">
                        </i>
                        Xem
                    </a>
                    <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Xóa
                    </a>
                </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
<script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{secure_asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "order": [[ 0, "desc" ]],
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

</script>
@stop
