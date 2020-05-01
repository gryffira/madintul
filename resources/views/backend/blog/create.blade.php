@extends('layouts.backend.main')
@section('title', 'Buat Berita')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Buat Berita</span></h4>
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
			<div class="col-12 col-md-8">
				<!-- Basic layout-->
				<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" id='post-form'>
					@csrf
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Berita</h5>
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
								<label>Judul</label>
								<input type="text" class="form-control" placeholder="" name="title">
								@if($errors->has('title'))
								<span class="help-block">{{ $errors->first('title') }}</span>
								@endif
							</div>
			

					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						<label>Isi</label>
						<textarea rows="5" cols="5" class="form-control" name="body"></textarea>
						@if($errors->has('body'))
						<span class="help-block">{{ $errors->first('body') }}</span>
						@endif
					</div>


				</div>
			</div>
			<!-- /basic layout -->
		</div>
		<div class="col-6 col-md-4">

			<!-- /categories -->

			<!-- Categories -->
<!-- 			<div class="panel panel-flat">
				<div class="category-title">
					<span>Categories</span>
					<ul class="icons-list">
						<li><a href="#" data-action="collapse"></a></li>
					</ul>
				</div>
				<div class="category-content">
					<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
						<label>Kategori</label>
						<select class="form-control" name="category_id">
							<option selected>Pilih Kategori</option>
							@foreach($categories as $cat)
							<option value="{{$cat->id}}">{{$cat->title}}</option>
							@endforeach
						</select>
						@if($errors->has('category_id'))
						<span class="help-block">{{ $errors->first('category_id') }}</span>
						@endif
					</div>
				</div>
			</div> -->
			<!-- /categories -->

			<!-- Image -->
			<div class="panel panel-flat">
				<div class="category-title">
					<span>Cover Berita</span>
					<ul class="icons-list">
						<li><a href="#" data-action="collapse"></a></li>
					</ul>
				</div>
				<div class="category-content">
					<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">

						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
								<img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=Landscape' }}" alt="...">
							</div>
							<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
							<div>
								<span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Gambar</span><span class="fileinput-exists">Ganti</span><input type="file" name='image'></span>
								<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
							</div>
						</div>
						@if($errors->has('image'))
						<span class="help-block">{{ $errors->first('image') }}</span>
						@endif
					</div>
				</div>
			</div>

			<div class="panel panel-flat" style="height: 200px">
				<div class="category-title">
					<span>Publish</span>
					<ul class="icons-list">
						<li><a href="#" data-action="collapse"></a></li>
					</ul>
				</div>
				<div class="category-content">
					<div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
						<input class="form-control" type="date" name="published_at">
						@if($errors->has('published_at'))
						<span class="help-block">{{ $errors->first('published_at') }}</span>
						@endif
					</div>
					<div>
						<!-- <button type="submit" style="float: left;" class="btn btn-default text-left" id="draft-btn">Save Draft</button> -->
						
						<button type="submit" style="float: right;" class="btn btn-primary text-right">Upload Berita</button>
						
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /detached content -->
</div>
<!-- /content area -->
</div>

<script>
	var simplemde = new SimpleMDE({ element: $("#body")[0] });
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

 $('#draft-btn').click(function(e){
 	e.preventDefault();
 	$('#published_at').val("");
 	$('#post-form').submit;
 });

</script>

@endsection
