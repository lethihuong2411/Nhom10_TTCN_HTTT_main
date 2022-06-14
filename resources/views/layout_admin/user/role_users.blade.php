@extends('layout_admin.master')

@section('content')
<?php

use App\Services\GetSession;
use Illuminate\Support\Facades\Session;

$company_id = GetSession::getCompanyId();

?>
<div class="content-wrapper" style="min-height: 898px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thông tin thành viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hệ thống</a></li>
            <li><a href="#">Tài Khoản</a></li>
            <li class="active">Phân Quyền</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box ">
            <form action="{{route('changerole',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-header">
                    @if(Session::has('thongbao'))
                    <div class="alert alert-success">{{Session::get('thongbao')}} </div>
                    @endif
                </div>
                <div class="box-body">

                    <h4> Họ tên: </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <input name="name" type="text" value="{{$user->full_name}}" class="form-control">
                    </div>
                    @error('name')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Số điện thoại </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input style="padding-left: 20px" name="phone" type="text" value="{{$user->phone}}" id="phone" class="form-control">
                    </div>
                    @error('phone')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror

                    <h4> Địa chỉ : </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input name="address" type="text" value="{{$user->address}}" class="form-control">
                    </div>
                    @error('address')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <h4> Email: </h4>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input name="email" type="text" value="{{$user->email}}" class="form-control">
                    </div>
                    @error('email')
                    <div style="color: red"> {{ $message }} </div>
                    @enderror
                    <div class="input-group-btn">
                        <h4> Vai trò: </h4>
                        <select style=" font-weight:bold;" name="cate" class="form-control">
                            @foreach($all_role as $role)
                            @if($role->id == $user->id_role)
                            <option value="{{$role->id}}" selected>{{$role->display_name}}</option>
                            @elseif($company_id > 0 && Auth::user()->id_role == 1)
                            <option value="{{$role->id}}">{{$role->display_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="text-center">

                        <input type="submit" name="submit" value="Cập nhật" class="btn  btn-success btn-lg">
                    </div>
                </div>

            </form>
        </div>
    </section><!-- /.content -->
</div>
@endsection