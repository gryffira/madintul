@extends('layouts.backend.main')
@section('title', 'Tambah Staff')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Tambah Staff</span></h4>
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
			<form  class="form-horizontal" action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">staff</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="reload"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body ">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
											<img src="{{ ($staff->image_thumb_url) ? $staff->image_thumb_url : 'http://placehold.it/200x200&text=No+Image' }}" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
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

							<div class="col-sm-8">
								<div class="form-group {{ $errors->has('nik') ? 'has-error' : '' }} mb-2">
									<label class="control-label col-lg-2">NIK</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="" name="nik">
									</div>
									@if($errors->has('nik'))
									<span class="help-block">{{ $errors->first('nik') }}</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('nama_depan') ? 'has-error' : '' }}">
									<label class="control-label col-lg-2" >Nama Depan</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="" name="nama_depan" >
									</div>
									@if($errors->has('nama_depan'))
									<span class="help-block">{{ $errors->first('nama_depan') }}</span>
									@endif
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Nama Belakang</label> 
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="" name="nama_belakang">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Posisi</label> 
									<div class="col-lg-10">
										<select class="form-control" name="posisi">
											<option value="Pendidik">Pendidik</option>
											<option value="Kependidikan">Kependidikan</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group" style="padding-bottom: 20px">
							<label class="control-label col-lg-2">Ijazah Terakhir</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" placeholder="" name="ijazah_terakhir" >
							</div>
						</div>
						<div class="form-group" style="padding-bottom: 20px">
							<label class="control-label col-lg-2">Tahun Ijazah Terakhir</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" placeholder="" name="tahun_ijazah_trkhr" >
							</div>
						</div>
						<div class="form-group" style="padding-bottom: 20px">
							<label class="control-label col-lg-2">NUPTK</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" placeholder="" name="nuptk" >
							</div>
						</div>

						<div class="form-group {{ $errors->has('jenis_kl') ? 'has-error' : '' }}">
							<label class="control-label col-lg-2">Jenis Kelamin</label>
							<div class="col-lg-10">
								<select class="form-control" name="jenis_kl">
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>

						<div class="form-group" style="padding-bottom: 20px">
							<label class="control-label col-lg-2">Tempat Lahir</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" placeholder="" name="tempat_lahir" >
							</div>
						</div>

						<div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' : '' }}">
							<label class="control-label col-lg-2">Tanggal Lahir</label>
							<div class="col-lg-10">
								<input class="form-control" type="date" name="tgl_lahir" ">
							</div>
							@if($errors->has('tgl_lahir'))
							<span class="help-block">{{ $errors->first('tgl_lahir') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
							<label class="control-label col-lg-2">Alamat</label>
							<div class="col-lg-10">
								<textarea rows="5" cols="5" class="form-control" name="alamat"></textarea>
							</div>
							@if($errors->has('alamat'))
							<span class="help-block">{{ $errors->first('alamat') }}</span>
							@endif
						</div>

						<div class="form-group" style="padding-bottom: 20px">
							<label class="control-label col-lg-2">Nomor Telepon</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" placeholder="" name="no_tlp" >
							</div>
						</div>

						<div class="form-group" style="padding-bottom: 20px">
							<label class="control-label col-lg-2">Status Kawin</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" placeholder="" name="status_kawin" >
							</div>
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
