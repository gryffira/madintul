@extends('layouts.backend.main')

@section('title', 'List Foto')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">List Foto</span></h4>
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
		@if(session('message'))
		<div class="alert alert-success">
			{{ session('message')}}
		</div>
		@endif
		<!-- Basic datatable -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">List Foto</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body border-top-primary ">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="glyphicon glyphicon-plus position-left"></i>Upload Foto</button>
			</div>
			<table class="table datatable-responsive-row-control table-bordered">
				<thead>
					<tr>

						<th></th>
						<th>NO</th>
						<th>Nama</th>
						<th>Foto</th>
						<th>Admin</th>
						<th>Tanggal Diupload</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php $currentUser= auth()->user(); ?>
					<?php $superAdmin= 1 ?>
					@foreach($photo as $foto)
					<tr>
						<td></td>
						<td>{{$i}}</td>
						<td>{{ $foto->name }}</td>
						<td><div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
										<img src="{{ $foto->image_url ? $foto->image_url : 'http://placehold.it/200x150&text=no+image' }}" alt="...">
									</div></td>
						<td>{{ $foto->author->name}}</td>
						<td>{{ $foto->dateFormat() }}</td>
						<td class="text-center">
							<ul class="icons-list">
								@if($currentUser->id == $superAdmin || $foto->author_id == $currentUser->id)
								<li><form action="{{ route('photo.destroy', $foto['id'])}}" method="post">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									<button onclick="return confirm('Anda yakin menghapus Foto ini?')" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash text-danger-600"></i> </button>
								</form>
							</li>
							@else
							<li><form action="{{ route('photo.destroy', $foto['id'])}}" method="post">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									<button onclick="return false"  class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash " style="color: #FFB9B9"></i> </button>
								</form>
							</li>
							@endif
							</ul>
						</td>
					</tr>
					<?php $i++ ?>
					@endforeach
				</tbody>
			</table>

		</div>
		<!-- /basic datatable -->
	</div>
</div>
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Upload Foto</h5>
			</div>
			<form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data" >
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-sm-12 ">
							<label>Judul</label>
							<input type="text" class="form-control" placeholder="" name="name">
						</div>

						<div class="form-group col-sm-12 {{ $errors->has('image') ? 'has-error' : '' }}">
							<div><label>Cover Iklan</label></div>
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 100px;">
									<img src="{{ ($foto->image_thumb_url) ? $foto->image_thumb_url : 'http://placehold.it/200x150&text=Landscape' }}" alt="...">
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
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection