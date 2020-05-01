@extends('layouts.backend.main')

@section('title', 'List User')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">List User</span></h4>
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
				<h5 class="panel-title">List User</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
			<!-- <div class="panel-body border-top-primary ">
				<a href="{{ route('admin.create') }}"> <button type="button" class="btn btn-primary" ><i class="glyphicon glyphicon-plus position-left"></i>Tambah User</button></a>
			</div> -->
			<table class="table datatable-responsive-row-control table-bordered">
				<thead>
					<tr>

						<th></th>
						<th>NO</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Role</th>
						<th>Tanggal Dibuat</th>
						<th class="text-center" width="13%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php $currentUser= auth()->user(); ?>
					<?php $notAdmin='admin'?>
					@foreach($admin as $user)
					<tr>

						<td></td>
						<td>{{$i}}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{$user->role}}</td>
						<td>{{ $user->dateFormatted() }}</td>
						<td class="text-center" width="13%">
							<ul class="icons-list">
								<li class="text-primary-600">
									<a href="{{ route('admin.edit', $user->id)}}"><i class="icon-pencil7"></i></a>
								</li>
								<li>

									@if($user->id == $currentUser->id || $user->id == $currentUser->id)
									<input name="_method" type="hidden" value="DELETE">
									<button onclick="return false" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash" style="color: #FFB9B9"></i> 
									</button>

									@elseif($user->role == $notAdmin)
									<a href="{{ route('backend.admin.confirm', $user->id)}}">
										<button class="btn" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> 
											<i class="icon-trash text-danger-600"></i>
										</button>
									</a>
									
									@else
									<form action="{{ route('admin.destroy', $user['id'])}}" method="post">
										@csrf
										<input name="_method" type="hidden" value="DELETE">
										<button onclick="return confirm('Anda yakin menghapus user ini?')" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash text-danger-600"></i> 
										</button>
									</form>
									@endif


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


@endsection