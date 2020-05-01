@extends('layouts.backend.main')
@section('title', 'Buat Link')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Buat Link</span></h4>
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
			<form action="{{ route('link.store') }}" method="POST">
				@csrf
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Link</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="reload"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body ">

						<div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
							<label>Judul</label>
							<input type="text" class="form-control" placeholder="" name="judul">
							@if($errors->has('judul'))
							<span class="help-block">{{ $errors->first('judul') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('jenis_id') ? 'has-error' : '' }}">
							<label>Kategori Link</label>
							<select class="form-control" name="jenis_id">
								<option selected>Pilih Kategori</option>
								<option value="1" {{ $link->jenis_id == 1 ? 'selected' : '' }}>Terkait</option>
								<option value="2" {{ $link->jenis_id == 2 ? 'selected' : '' }}>Informasi</option>
							</select>
						</div>

						<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}" style="padding-bottom: 20px">
							<label>URL Link</label>
							<input type="text" class="form-control" placeholder="" name="url">
							@if($errors->has('url'))
							<span class="help-block">{{ $errors->first('url') }}</span>
							@endif
						</div>

						<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
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
