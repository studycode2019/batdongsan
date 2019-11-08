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
              <li class="breadcrumb-item active">Sửa thông tin khách hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Thất bại!</h4> {!! $error !!}
      </div>
    @endforeach
    @endif
    @foreach($clients as $data)
        <div class="row offset-3">
            <div class="col-6">
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin khách hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/update" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="#"/>
                <div class="card-body">
                  <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input name="phone" pattern="[0-9]{10}" class="form-control" id="phone" value="{{ $data->phone }}" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="name">Tên khách hàng:</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="birthday">Ngày sinh:</label>
                    <input name="birthday" type="date" class="form-control" id="birthday" value="{{ $data->birthday }}">
                  </div>
                  <div class="form-group">
                    <label for="zalo">Zalo:</label>
                    <input name="zalo" type="number" class="form-control" id="zalo" value="{{ $data->zalo }}" >
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="text" class="form-control" id="email" value="{{ $data->email }}" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/update/{{$data->id}}" class="btn btn-info btn-block"><b>Lưu thay đổi</b></a>
                    <a onclick="history.go(-1);" class="btn">Quay lại</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
        @endforeach
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
@stop
