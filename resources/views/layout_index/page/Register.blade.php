@extends('layout_index.master')
@section('content')
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <!--************************************
            Main Start
          *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
             Coming Soon Start
           *************************************-->
        <div class="tg-comingsoonholder">

            <div class="tg-comingsooncontent">
                <div class="tg-comingsoonhead">
                    <h2 style="color: rgb(72, 167, 77)">Đăng Ký tài khoản</h2>
                    <form action="{{url('signup')}}" method="post" class="tg-formtheme tg-formnewsletter">
                        @csrf
                        @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}} </div>
                        @endif
                        <div class="form-group">
                            <label><b>Họ và tên :</b></label>
                            <input type="text" name="fullname" class="form-control" placeholder="Họ Tên . . . . . ">
                            @error('fullname')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                            <br><br>
                            <label><b>Username</b></label>
                            <input style="text-transform :none; " type="email" name="username" class="form-control" placeholder="Email . . . . . ">

                            @error('username')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                            <br><br>
                            <label><b>Mật Khẩu:</b></label>
                            <input type="Password" name="password" class="form-control" placeholder="Password . . . . . ">

                            @error('password')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                            <br><br>
                            <label><b>Xác nhận lại mật khẩu :</b></label>
                            <input type="Password" name="re_password" class="form-control" placeholder="Xác nhận password . . . . . ">

                            @error('re_password')
                            <p style="color:red">{{ $message }}</p>
                            @enderror

                            <br><br>
                            <label><b> Địa chỉ :</b></label>
                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ . . . . .">

                            @error('address')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                            <br><br>
                            <label><b>Số điện thoại</b></label>
                            <input type="text" name="phone" class="form-control" placeholder="Điện thoại . . . . . ">

                            @error('phone')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                            <br><br>
                            <div style="margin-left:130px" class=" tg-btns">

                                <button class="tg-btn"> <b> Đăng Ký </b></button>

                            </div>

                            <p style="margin-top:50px"><b>Đã có tài khoản /</b> <a href="{{ route('login') }}">Đăng Nhập Tại Đây</a></p>
                    </form>

                </div>
            </div>

            <!--************************************
             Coming Soon End
           *************************************-->
    </main>
    <!--************************************
            Main End
          *************************************-->
    <!--************************************


          *************************************-->
</div>
<!--************************************
           Wrapper End
         *************************************-->
@endsection