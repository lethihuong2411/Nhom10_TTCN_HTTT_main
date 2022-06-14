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
					<h2 style="color: rgb(72, 167, 77)">Đăng Nhập</h2>
					<form action="{{url('login')}}" method="post" class="tg-formtheme tg-formnewsletter">
						@csrf
						@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('messege')}} </div>
						@endif
						<div class="form-group">
							<label><b>Tên Đăng Nhập :</b></label>
							<input style="text-transform: none" type="text" name="username" class="form-control" placeholder="Username . . . . ." autocomplete="off">
							@error('username')
							<p style="color:red">{{ $message }}</p>
							@enderror
							<br><br>
							<label><b>Mật Khẩu:</b></label>
							<input type="password" name="password" class="form-control" placeholder="Password . . . . .">
							@error('password')
							<p style="color:red">{{ $message }}</p>
							@enderror
							<br><br>

							<div style="margin-left:130px" class=" tg-btns">
								<button class="tg-btn"> <b> Đăng Nhập </b></button>
							</div>
						</div>

						<p style="margin-top:50px"><b>Chưa có tài khoản </b><a href=" {{route('signup')}}">Đăng ký ngay !!</a></p>
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