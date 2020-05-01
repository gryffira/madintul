@extends('layouts.backend.main')
@section('title', 'Edit Agenda')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit Agenda</span></h4>
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
				<form action="{{ route('agenda.update', $event->id) }}" method="POST" enctype="multipart/form-data" id='post-form'>
					@csrf
					@method('PATCH')
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Agenda</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li><a data-action="collapse"></a></li>
									<li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body ">


							<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
								<label>Judul Agenda</label>
								<input type="text" class="form-control" placeholder="" name="title" value="{{$event->title}}">
								@if($errors->has('title'))
								<span class="help-block">{{ $errors->first('title') }}</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('tanggal_acara') ? 'has-error' : '' }}">
								<label>Tanggal Agenda</label>
								<input class="form-control" type="date" name="tanggal_acara" value="{{$event->tanggal_acara}}">
								@if($errors->has('tanggal_acara'))
								<span class="help-block">{{ $errors->first('tanggal_acara') }}</span>
								@endif
							</div>


							<div class="form-group {{ $errors->has('tempat') ? 'has-error' : '' }}">
								<label>Alamat</label>
								<input type="text" class="form-control" placeholder="" name="tempat" value="{{$event->tempat}}">
								@if($errors->has('tempat'))
								<span class="help-block">{{ $errors->first('tempat') }}</span>
								@endif
							</div>

							<div class="form-group" style="padding-bottom: 20px">
								<label>URL Tempat</label>
								<input type="text" class="form-control" placeholder="" name="url_tempat" value="{{$event->url_tempat}}">
							</div>

							<div class="form-group {{ $errors->has('isi') ? 'has-error' : '' }}">
								<label>Isi Acara</label>
								<textarea rows="5" cols="5" class="form-control" name="isi">{{$event->isi}}</textarea>
								@if($errors->has('isi'))
								<span class="help-block">{{ $errors->first('isi') }}</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
								<div><label>Gambar</label></div>
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 100px;">
										<img src="{{ $event->image_url  ? $event->image_url  : 'http://placehold.it/200x150&text=Landscape' }}" alt="...">
										<input name="image" value="{{$event->image}}">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 100px;"></div>
									<div>
										<span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Gambar</span><span class="fileinput-exists">Ganti</span><input type="file" name='image'></span>
										<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
									</div>
								</div>
								@if($errors->has('image'))
								<span class="help-block">{{ $errors->first('image') }}</span>
								@endif
							</div>

							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
					</div>
				</form>
		</div>
		<!-- /detached content -->
	</div>
	<!-- /content area -->
</div>

<script>
	var simplemde = new SimpleMDE({ element: $("#isi")[0] });
	// var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

	//  $('textarea').each(function () {
 //        var simplemde = new SimpleMDE({
 //            element: this,
 //            spellChecker: false
 //        });
 //        simplemde.render();
 //        $("#application-modal").focus(function () {
 //            simplemde.codemirror.refresh();
 //        });
 //    });
</script>

@endsection
