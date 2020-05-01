@extends('layouts.backend.main')
@section('title', 'Delete Konfirmasi')
@section('content')
<!-- Main content -->
<div class="content-wrapper" style="background-color: #fff">

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Delete User</span></h4>
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
			<form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
				@csrf
					@method('DELETE')
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

		
						<div class="col-xs-9">
							<div class="box">
								<div class="box-body">
									<p>
										Anda punya pilihan untuk mengapus user ini
									</p>
									<p>
										ID #{{$admin->id}}: {{$admin->name}}
									</p>
									<p>
										Konten yang sudah dibuat user ini harus diapakan?
									</p>
									<p>
										<input type="radio" name="delete_option" value="delete" checked> Hapus semua konten atas nama user ini
									</p>
									<p>
										<input type="radio" name="delete_option" value="attribute"> Alihkan konten ke user lain
										<select class="form-control" name="selected_user" id="">
                                              @foreach($user as $admin)
                                              <option value="{{$admin->id}}">{{$admin->name}}</option>
                                              @endforeach
			                            </select>
									</p>
								</div>
								<div class="box-footer">
									<button type="submit" class="btn btn-danger">Konfirmasi Delete</button>
									<a href="{{ route('admin.index') }}" class="btn btn-default">Batalkan</a>
								</div>
							</div>
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
