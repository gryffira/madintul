@extends('layouts.backend.main')
@section('title', 'Upload Video')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Upload Video</span></h4>
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
				<form action="{{ route('video.store') }}" method="POST">
					@csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Video</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li><a data-action="collapse"></a></li>
									<li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body ">

							<div class="form-group ">
								<label>Judul</label>
								<input type="text" class="form-control" placeholder="" name="title">
								
							</div>

							<div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}" style="padding-bottom: 20px">
							<label>URL Video</label>
							<input type="text" class="form-control" placeholder="" name="video">
							@if($errors->has('video'))
							<span class="help-block">{{ $errors->first('video') }}</span>
							@endif
						</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Upload<i class="icon-arrow-right14 position-right"></i></button>
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
