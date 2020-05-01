@extends('layouts.backend.main')
@section('title', 'Beranda')
@section('content')
<div class="content-wrapper" style="background-color: #fff">
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Beranda</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="{{ route('posts')}}" class="btn btn-link btn-float has-text"><i class="icon-info3 text-primary"></i><span>Berita</span></a>
					<a href="{{ route('galeri')}}" class="btn btn-link btn-float has-text"><i class="icon-images2 text-primary"></i> <span>Foto</span></a>
					<a href="{{ route('videos')}}" class="btn btn-link btn-float has-text"><i class="icon-youtube text-primary"></i> <span>Video</span></a>
				</div>			</div>
			</div>
		</div>

		<!-- Content area -->
		<div class="content">
			<!-- User profile -->
			<div class="row">
				<div class="col-lg-9">
					<div class="tabbable">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="activity">

								<!-- Timeline -->
								<div class="timeline timeline-left content-group">
									<div class="timeline-container">
										<!-- Date stamp -->
										<div class="timeline-date text-muted">
											<i class="icon-history position-left"></i>{{ Auth::user()->staff->dateNow()}}
										</div>
										<!-- /date stamp -->
									</div>
								</div>
								<!-- /timeline -->
							</div>
							<!-- Latest posts -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Berita Terbaru</h6>
									<div class="heading-elements">
										<ul class="icons-list">
											<li><a data-action="collapse"></a></li>
											<li><a data-action="reload"></a></li>
											<li><a data-action="close"></a></li>
										</ul>
									</div>
								</div>

								<div class="panel-body">
									<div class="row">
										@foreach($posts as $post)
										<div class="col-lg-6">
											<ul class="media-list content-group">
												<li class="media stack-media-on-mobile">
													<div class="media-left">
														<div class="thumb">
															@if ($post->image_url)
															<a href="{{ route('showpost', $post->id) }}">
																<img src="{{ $post->image_url }}" class="img-responsive img-rounded media-preview"  alt="">
																<span class="zoom-image"><i class=""></i></span>
															</a>
															@endif
														</div>
													</div>

													<div class="media-body">
														<h6 class="media-heading"><a href="{{ route('showpost', $post->id) }}">{{ $post->title }}</a></h6>
														<ul class="list-inline list-inline-separate text-muted mb-5">
															<li><i class="icon-book-play position-left"></i> {{ $post->author->name  }}</li>
															<li>{{ $post->date }}</li>
														</ul>
														
													</div>
												</li>
												
											</ul>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- User thumbnail -->
					<div class="thumbnail" style="border-radius: 0px ">
						<div class="thumb thumb-rounded thumb-slide">
							<img src="{{auth()->user()->staff->image_url}}" alt="">

						</div>

						<div class="caption text-center">
							<h6 class="text-semibold no-margin">{{ Auth::user()->staff->nama_depan}} {{ Auth::user()->staff->nama_belakang}}<small class="display-block">{{ Auth::user()->email}}</small></h6>
						</div>
					</div>
					<!-- /user thumbnail -->


					<!-- Navigation -->
					<div class="panel panel-flat" style="border-radius: 0px">
						<div class="panel-heading" style="line-height: 1px">
							<h6 class="panel-title">Profil</h6>
							<div class="list-group-divider"></div>
						</div>
						
						<div class="list-group no-border no-padding-top">
							<a href="#" class="list-group-item"><b>NIK &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>{{ Auth::user()->staff->nik}}</a>
							<a href="#" class="list-group-item"><b>Tanggal Lahir &nbsp:</b>@if(Auth::user()->staff->tgl_lahir == NULL)<i>Lengkapi Profil</i> 
								@else{{ Auth::user()->staff->dateBirth()}}@endif</a>
								<a href="#" class="list-group-item"><b>Jenis Kelamin&nbsp:</b>@if(Auth::user()->staff->jenis_kl == NULL)<i>Lengkapi Profil</i> 
									@else{{ Auth::user()->staff->jenis_kl}} @endif</a>
									<a href="#" class="list-group-item"><b>No Telepon &nbsp&nbsp&nbsp&nbsp&nbsp:</b> @if(Auth::user()->staff->no_tlp == NULL)<i>Lengkapi Profil</i> 
										@else{{ Auth::user()->staff->no_tlp}} @endif</a>
										<div class="list-group-divider"></div>
										<a href="{{ route('profilstaff.edit', Auth::user()->staff->id)}}" class="list-group-item"><i class=" icon-pencil7"></i>Lengkapi Profil</a>
									</div>
								</div>
								<!-- /navigation -->
							</div>
						</div>
						<!-- /user profile -->

						<!-- Footer -->
						<div class="footer text-muted">
							&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						</div>
						<!-- /footer -->

					</div>
					<!-- /content area -->

				</div>


				@endsection