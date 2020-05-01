@extends('layouts.backend.main')

@section('title', 'List Agenda')

@section('content')
<div class="content-wrapper" style="background-color: #fff">

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">List Agenda</span></h4>
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
				<h5 class="panel-title">List Agenda</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body border-top-primary ">
				<a href="{{ route('agenda.create') }}"> <button type="button" class="btn btn-primary" ><i class="glyphicon glyphicon-plus position-left"></i>Tambah Agenda</button></a>
			</div>
			<table class="table datatable-responsive-row-control table-bordered">
				<thead>
					<tr>

						<th></th>
						<th>NO</th>
						<th>Judul</th>
						<th>Tanggal Agenda</th>
						<th>Tempat</th>
						<th>Admin</th>
						<th>Tanggal Dibuat</th>
						<th class="text-center" style="width: 13%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php $currentUser= auth()->user(); ?>
					<?php $superAdmin= 1 ?>

					@foreach($event as $events)
					<tr>
						<td></td>
						<td>{{$i}}</td>
						<td>{{ $events->title }}</td>
						<td>{{ $events->tanggal_acara}}</td>
						<td>{{ $events->tempat}}</td>
						<td>{{ $events->author->name }}</td>
						<td>{{ $events->dateFormatted() }}</td>
						<td class="text-center" style="width: 13%">
							<ul class="icons-list">
								
								@if($currentUser->id == $superAdmin || $events->author_id == $currentUser->id)
								<li class="text-primary-600"><button class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"><a href="{{ route('agenda.edit', $events->id)}}"><i class="icon-pencil7"></i></a></button></li>
								<li>
								<form action="{{ route('agenda.destroy', $events['id'])}}" method="post">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									<button onclick="return confirm('Anda yakin menghapus agenda ini?')" class="btn " type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash text-danger-600"></i> </button>
								</form>
							</li>
							@else
							<li class="text-primary-600"><button class="btn disable" onclick="return false" type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"><a href="{{ route('agenda.edit', $events->id)}}"><i class="icon-pencil7" style="color: #B9E5FF"></i></a></button></li>
							<li><form action="{{ route('agenda.destroy', $events['id'])}}" method="post">
								@csrf
								<input name="_method" type="hidden" value="DELETE">
								<button onclick="return false" class="btn disable" type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"> <i class="icon-trash " style="color: #FFB9B9"></i> </button>
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


@endsection