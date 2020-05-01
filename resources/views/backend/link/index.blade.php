@extends('layouts.backend.main')

@section('title', 'List Link')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">List Link</span></h4>
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
				<h5 class="panel-title">List Link</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body border-top-primary ">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="glyphicon glyphicon-plus position-left"></i>Buat Link</button>
			</div>
			<table class="table datatable-responsive-row-control table-bordered">
				<thead>
					<tr>

						<th></th>
						<th>NO</th>
						<th>Judul</th>
						<th>URL</th>
						<th>Jenis Link</th>
						<th>Admin</th>
						<th>Tanggal Dibuat</th>
						<th class="text-center" width="13%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php $currentUser= auth()->user(); ?>
					<?php $superAdmin= 1 ?>
					@foreach($link as $ad)
					<tr>

						<td></td>
						<td>{{$i}}</td>
						<td>{{ $ad->judul }}</td>
						<td>{{ $ad->url}}</td>
						@if($ad->jenis_id == '1')
						<td>Terkait</td>
						@elseif ($ad->jenis_id == '2')
						<td>Informasi</td>
						@endif
						<td>{{ $ad->author->name}}</td>
						<td>{{ $ad->dateFormatted() }}</td>
						<td class="text-center" width="13%">
							<ul class="icons-list">
								<!-- <li class="text-primary-600"><a href="{{ route('link.edit', $ad->id)}}"><i class="icon-pencil7"></i></a></li>
									<li class="text-danger-600 btn-sm"><a href="{{ route('link.destroy', $ad->id)}}"><i class="icon-trash" data-toggle="modal" data-target="#modal_theme_danger"></i></a></li> -->
									@if($currentUser->id == $superAdmin || $ad->author_id == $currentUser->id)
									<li class="text-primary-600"><button class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"><a href="{{ route('link.edit', $ad->id)}}"><i class="icon-pencil7"></i></a></button></li>
									<li><form action="{{ route('link.destroy', $ad['id'])}}" method="post">
										@csrf
										<input name="_method" type="hidden" value="DELETE">
										<button onclick="return confirm('Anda yakin menghapus link ini?')" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash text-danger-600"></i> </button>
									</form>
								</li>
								@else
								<li class="text-primary-600"><button class="btn " onclick="return false" type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"><a href="{{ route('link.edit', $ad->id)}}"><i class="icon-pencil7"  style="color: #B9E5FF"></i></a></button></li>
								<li><form action="{{ route('link.destroy', $ad['id'])}}" method="post">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									<button onclick="return false" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash " style="color: #FFB9B9"></i> </button>
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
				<h5 class="modal-title">Link Terkait</h5>
			</div>
			<form action="{{ route('link.store') }}" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12 form-group {{ $errors->has('judul') ? 'has-error' : '' }}" style="padding-bottom: 20px">
								<label>Judul</label>
								<input type="text" placeholder="Judul yang akan ditampilkan" class="form-control" name="judul">
								@if($errors->has('judul'))
								<span class="help-block">{{ $errors->first('judul') }}</span>
								@endif
							</div>

							<div class="col-sm-12 form-group {{ $errors->has('url') ? 'has-error' : '' }}" style="padding-bottom: 20px">
								<label>Link</label>
								<input type="text" placeholder="Link URL" class="form-control" name="url">
								@if($errors->has('url'))
								<span class="help-block">{{ $errors->first('url') }}</span>
								@endif
							</div>

							<div class="col-sm-12 form-group {{ $errors->has('jenis_id') ? 'has-error' : '' }}">
								<label>Kategori Link</label>
								<select class="form-control" name="jenis_id">
									<option selected>Pilih Kategori</option>
									<option value="1" >Terkait</option>
									<option value="2" >Informasi</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection