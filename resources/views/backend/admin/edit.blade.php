@extends('layouts.backend.main')
@section('title', 'Edit User')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit User</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
                    <a href="{{ route('posts')}}" class="btn btn-link btn-float has-text"><i class="icon-info3 text-primary"></i><span>Berita</span></a>
                    <a href="{{ route('galeri')}}" class="btn btn-link btn-float has-text"><i class="icon-images2 text-primary"></i> <span>Foto</span></a>
                    <a href="{{ route('videos')}}" class="btn btn-link btn-float has-text"><i class="icon-youtube text-primary"></i> <span>Video</span></a>
                </div>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">
		<div class="row">
			<!-- Detached content -->
			<!-- Basic layout-->
			<form action="{{ route('admin.update', $admin->id) }}" method="post" id='post-form'>
				@csrf
					@method('PATCH')
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">User</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="reload"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body ">

						<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
							<label>Nama</label>
							<input type="text" class="form-control" placeholder="" name="name" value="{{$admin->name}}">
							@if($errors->has('nama'))
							<span class="help-block">{{ $errors->first('nama') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label>Email</label>
							<input type="text" class="form-control" placeholder="" name="email" value="{{$admin->email}}">
							@if($errors->has('email'))
							<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label>Password</label>
							<input type="password" class="form-control" placeholder="" name="password" >
							@if($errors->has('password'))
							<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
							<label>Confirm Password</label>
							<input type="password" class="form-control" placeholder="" name="password_confirmation" >
							@if($errors->has('password_confirmation'))
							<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
							@endif
						</div>

						<div class="text-right">
							<button type="submit" class="btn btn-primary">Save<i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</div>
				</div>
				<!-- /basic layout -->
				

				<!-- /categories -->
				
			</form>
		</div>
	</div>
	<!-- /detached content -->
</div>
<!-- /content area -->

@endsection
