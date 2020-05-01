@extends('layouts.backend.main')

@section('title', 'List Staff')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">List Staff</span></h4>
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
				<h5 class="panel-title">List Staff</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body border-top-primary ">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="glyphicon glyphicon-plus position-left"></i>Tambah Staff</button>

				<a href="{{ route('backend.staff.export') }}">
					<button class="btn bg-teal-400 position-left" type="submit" style="float: right;"><span>Export to Excel <i class=" icon-file-excel position-right"></i></span></button>
				</a>
			</div>
			<table class="table datatable-responsive-row-control table-bordered">
				<thead>
					<tr>

						<th></th>
						<th>NO</th>
						<td>NIK</td>
						<th width="15%">Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th class="text-center" width="13%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php $currentUser= auth()->user(); ?>

					@foreach($staff as $user)
					<tr>

						<td></td>
						<td>{{$i}}</td>
						<td>{{ $user->nik }}</td>
						<td width="15%">{{ $user->nama_depan }} {{ $user->nama_belakang }}</td>
						<td>{{ $user->jenis_kl }}</td>
						<td>{{ $user->alamat }}</td>
						<td>{{ $user->no_tlp }}</td>
						<td class="text-center" width="13%">
							<ul class="icons-list">
								<li class="text-primary-600">
									<a href="{{ route('staff.edit', $user->id)}}"><i class="icon-pencil7"></i></a>
								</li>
								<li>
									<form action="{{ route('staff.destroy', $user['id'])}}" method="post">
										@csrf
										<input name="_method" type="hidden" value="DELETE">
										<button onclick="return confirm('Anda yakin menghapus User ini?')" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash" style="color: red"></i> 
										</button>
									</form>
								</li>

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
				<h5 class="modal-title">Tambah Staff</h5>
			</div>
			<form action="{{ route('staff.store') }}" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12 form-group {{ $errors->has('nik') ? 'has-error' : '' }}" style="padding-bottom: 20px">
								<label>NIK</label>
								<input type="text" class="form-control" name="nik" required>
								@if($errors->has('nik'))
								<span class="help-block">{{ $errors->first('nik') }}</span>
								@endif
							</div>

							<div class="col-sm-12 form-group {{ $errors->has('nama_depan') ? 'has-error' : '' }}" style="padding-bottom: 20px">
								<label>Nama Depan</label>
								<input type="text"  class="form-control" name="nama_depan">    
								@if($errors->has('nama_depan'))
								<span class="help-block">{{ $errors->first('nama_depan') }}</span>
								@endif
							</div>

							<div class="col-sm-12 form-group " style="padding-bottom: 20px">
								<label>Nama Belakang</label>
								<input type="text"  class="form-control" name="nama_belakang">
							</div>
							<div class="col-sm-12 form-group " style="padding-bottom: 20px">
								<label>Email</label>
								<input type="email"  class="form-control" name="email">
							</div>
							<div class="col-sm-12 form-group {{ $errors->has('jenis_id') ? 'has-error' : '' }}">
								<label>Posisi</label>
								<select class="form-control" name="posisi">
									<option selected>Pilih Posisi</option>
									<option value="Pendidik">Pendidik</option>
									<option value="Pendidik">Kependidikan</option>
								</select>
							</div>
							<div class="col-sm-12 form-group {{ $errors->has('jenis_id') ? 'has-error' : '' }}">
								<label>Hak Akses</label>
								<select class="form-control" name="role">
									<option selected>Pilih Akses</option>
									<option value="staff">Staff</option>
									<option value="admin">Administrator</option>
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