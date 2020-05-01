@extends('layouts.backend.main')

@section('title', 'List Santri')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">List Santri</span></h4>
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
				<h5 class="panel-title">List Santri</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body border-top-primary ">
				<button type="button" class="btn btn-primary" style="float: left;" data-toggle="modal" data-target="#modal_form_vertical"><i class="glyphicon glyphicon-plus position-left"></i>Tambah Santri</button>

				<a href="{{ route('backend.santri.export') }}">
					<button class="btn bg-teal-400 position-left" type="submit" style="float: right;"><span>Export to Excel <i class=" icon-file-excel position-right"></i></span></button>
				</a>
			</div>
			<table class="table datatable-responsive-row-control table-bordered">
				<thead>
					<tr>
						<th></th>
						<th>NO</th>
						<th>Nis</th>
						<th width="15%">Nama</th>
						<th width="10%">Jenis Kelamin</th>
						<th width="15%">Tanggal Lahir</th>
						<th width="20%">Alamat</th>
						
						<th class="text-center" width="13%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php $currentUser= auth()->user(); ?>

					@foreach($santri as $user)
					<tr>

						<td></td>
						<td>{{$i}}</td>
						<td>{{ $user->nis }}</td>
						<td width="15%">{{ $user->nama_depan }} {{ $user->nama_belakang }}</td>
						<td width="10%">{{ $user->jenis_kl }}</td>
						<td width="15%">{{ $user->dateFormated()}}</td>
						<td width="20%">{{ $user->alamat }}</td>
						<td class="text-center" width="13%">
							<ul class="icons-list">
								<li class="text-primary-600">
									<a href="{{ route('santri.edit', $user->id)}}"><i class="icon-pencil7"></i></a>
								</li>
								<li>
									<form action="{{ route('santri.destroy', $user['id'])}}" method="post">
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
				<h5 class="modal-title">Tambah Siswa</h5>
			</div>
			<form action="{{ route('santri.store') }}" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12 form-group {{ $errors->has('nis') ? 'has-error' : '' }}" style="padding-bottom: 20px">
								<label>NIS</label>
								<input type="text" class="form-control" name="nis">
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