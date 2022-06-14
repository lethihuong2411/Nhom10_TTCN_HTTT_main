@extends('layout_admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 898px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa nhà xuất bản
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống </a></li>
      <li><a href="#">Nhà xuất bản</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box box-info">

      @if(Session::has('thongbao'))
      <div class="alert alert-success">{{Session::get('thongbao')}} </div>
      @endif
      <div class="box-body">
        <form action="{{route('companies.update',[$companies['id']])}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <h4> Tên nhà xuất bản : </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
            <input type="text" name="name" class="form-control" value="{{$companies->name}}" placeholder="Tên nhà cung cấp . . . . . . . . .">
          </div>
          @error('name')
          <div style="color: red"> {{ $message }} </div>
          @enderror
          <h4> Email : </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" name="email" class="form-control" value="{{$companies->email}}" placeholder="Email . . . . . . . . .">
          </div>
          @error('email')
          <div style="color: red"> {{ $message }} </div>
          @enderror

          <h4> Địa chỉ : </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-book"></i></span>
            <input type="text" name="address" class="form-control" value="{{$companies->address}}" placeholder="Địa chỉ . . . . . . . . .">
          </div>
          @error('address')
          <div style="color: red"> {{ $message }} </div>
          @enderror
          <h4> Số điện thoại </h4>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" name="phone" class="form-control" value="{{$companies->phone_number}}" placeholder="Số điện thoại . . . . . . . . .">
          </div>
          @error('phone')
          <div style="color: red"> {{ $message }} </div>
          @enderror
          <br>

          <div class="form-group">
            <label for="exampleInputFile">Ảnh nhà sản xuất</label>
            <input name="img" type="file" id="exampleInputFile" onchange="changeImg(this)">
            <img id="avatar" class="thumbnail" width="100px" height="100px" src="{{asset('images/companies/'.$companies->image)}}">
          </div>
          @error('img')
          <div style="color: red"> {{ $message }} </div>
          @enderror
          <br>
          <div class="text-center">
            <button class=" btn  btn-success btn-lg" style="border-color: #4a4235;background-color:#4a4235;"> Cập nhật </button>
          </div>
        </form>
      </div>
  </section><!-- /.content -->
</div>
@endsection
@section('js')
<script type="text/javascript">
  function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      //Sự kiện file đã được load vào website
      reader.onload = function(e) {
        //Thay đổi đường dẫn ảnh
        $('#avatar').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
      $('#avatar').show();
    }
  }
  $(document).ready(function() {
    $('#avatar').click(function() {
      $('#imgbook').click();
    });
  });
</script>
@stop