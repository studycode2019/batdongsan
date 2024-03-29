@extends('layouts.master')
@section('title','BDS')
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
              <li class="breadcrumb-item active">Nhập khách hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

    {{-- @if (count($errors) > 0) --}}
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Thất bại!</h4> {!! $error !!}
      </div>
    @endforeach
    {{-- @endif --}}
      <div class="row offset-3">
          <div class="col-6">
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm thông tin khách hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('store.post')}}" method="post">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputSdt">Số điện thoại *:</label>
                    <input name="phone" type="number" class="form-control" id="phone" @if(isset($phone)) value="{{$phone}}" readonly="readonly" @endif>
                  </div>
                  <div class="form-group">
                    <label for="name">Tên khách hàng *:</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nhập vào tên khách hàng" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="birthday">Ngày sinh:</label>
                    <input name="birthday" type="date" class="form-control" id="birthday" required>
                  </div>
                  <p style="color: red; font-weight: bold">THÔNG TIN DƯỚI ĐÂY LÀ BẮT BUỘC ĐỐI VỚI KHÁCH HÀNG</p>
                  <div class="form-group">
                    <label for="zalo">Zalo:</label>
                    <input name="zalo" type="number" class="form-control" id="zalo" placeholder="Số điện thoại Zalo">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Địa chỉ thư điện tử" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm vào</button>
                  <a onclick="history.go(-1);" class="btn">Quay lại</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
