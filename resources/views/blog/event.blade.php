@extends('layouts.navlanding')
@section('title', ' | Agenda')
@section('contentweb')
<section class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto blog-content">
				@if ($webevent->image_url)
				<div><img src="{{ $webevent->image_url }}" alt="Image" class="img-fluid">
				</div>
				@endif
				<div class="block-heading-1">
					<span class="text-muted mb-3 text-uppercase small" style="line-height: 2px">{{ $webevent->dateFormat() }} &nbsp| <a href="{{ $webevent->url_tempat }}" class="text-muted"> <span class="mx-2 fa fa-map-marker text-muted"></span> {{ $webevent->tempat }}</a> </span>
					<h1 class="mb-4" style="font-size: 20px; padding-top: 15px">{{ $webevent->title }}</h1>
				</div>
				{!! Markdown::convertToHtml(e($webevent->isi))!!}
			</div>
		</div>
	</div>
</section>

<div class="site-section" id="press-section" style="background-color: #f8f9fa">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mb-5 mb-lg-0">
				<div class="block-heading-1">
					<span>Semua</span>
					<h2>Agenda</h2>
				</div>
			</div>
			<div class="col-lg-8">
				<ul class="list-unstyled">
					<li class="mb-4">
						@foreach($agenda as $event)
						<h2><a href="{{ route('event', $event->id) }}" class="text-black">{{ $event->dateFormat() }}</a> <a href="{{ $event->url_tempat }}" style="font-size: 17px; padding-left: 10px" class="fa fa-map-marker text-muted pr-1"> <span class="text-muted" style="font-family: Oswald"> {{ $event->tempat }} </span> </a></h2>
						<h5 style="padding-bottom: 30px"><span class="text-black"><a href=""></a>{{ $event->title }}</span></h5>
						@endforeach
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<footer class="site-footer" id="footer-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<h2 class="footer-heading mb-4"> <img src="https://madinatulquran.or.id/wp-content/uploads/2018/08/Logo-MQ-Footer.png" style="height: 50px"></h2>
						<p style="line-height: 10px">Pondok Pesantren kami terletak di lokasi yang asri,</p> 
						<p style="line-height: 10px">alami, serta jauh dari hiruk pikuk perkotaan</p>
						<p style="line-height: 10px">untuk lingkungan belajar serta menghafal yang baik</p>
						<p>Phone:</p>
						<p style="line-height: 0px">085200236000</p>
						<p>Email:</p>
						<p style="line-height: 0px">info.madinatulquran@gmail.com</p>

						<a href="#about-section" class="smoothscroll pl-0 pr-2"><span class="icon-facebook"></span></a>
						<a href="#" class="pl-2 pr-2"><span class="icon-twitter"></span></a>
						<a href="#" class="pl-2 pr-2"><span class="icon-instagram"></span></a>
						<a href="#" class="pl-2 pr-2"><span class="icon-linkedin"></span></a>
					</div>
					<div class="col-md-3 ml-auto ">
						<h2 class="footer-heading mb-4">Link Terkait</h2>
						<ul class="list-unstyled">
							@foreach($terkait as $link)
							<li><a href="{{$link->url}}">{{$link->judul}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-md-3 ml-auto ">
						<h2 class="footer-heading mb-4">Informasi Untuk</h2>
						<ul class="list-unstyled">
							@foreach($info as $linke)
							<li><a href="{{$linke->url}}">{{$linke->judul}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row pt-5 mt-5 text-center">
			<div class="col-md-12">
				<div class="border-top pt-5">
					 <p class="copyright"><small>
            
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> Pondok Pesantren Madinatul Qur'an 
           
            </small></p>
				</div>
			</div>

		</div>
	</div>
</footer>

</div>

<script src="{{url('/')}}/unearth/js/jquery-3.3.1.min.js"></script>
<script src="{{url('/')}}/unearth/js/popper.min.js"></script>
<script src="{{url('/')}}/unearth/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/unearth/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.sticky.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.waypoints.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.animateNumber.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.easing.1.3.js"></script>
<script src="{{url('/')}}/unearth/js/aos.js"></script>

<script src="{{url('/')}}/unearth/js/main.js"></script>
@endsection