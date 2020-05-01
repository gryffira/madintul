<!doctype html>
<html lang="en">
<head>
	<title>Pondok Pesantren Madinatul Qur'an  @yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

	<link rel="stylesheet" href="{{url('/')}}/unearth/fonts/icomoon/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	

	<link rel="stylesheet" href="{{url('/')}}/unearth/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/unearth/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="{{url('/')}}/unearth/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{url('/')}}/unearth/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="{{url('/')}}/unearth/fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="{{url('/')}}/unearth/css/aos.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{url('/')}}/unearth/css/style.css">



</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<!-- 	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border text-success" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div> -->

	<div class="site-wrap"  id="home-section">

		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>

		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<a href="mailto: info.madinatulquran@gmail.com" class="text-white"><span class="mr-2 text-white icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">info.madinatulquran@gmail.com</span></a>
						<span class="mx-md-2 d-inline-block"></span>
						<a href="https://wa.me/6285200236000" class="text-white"><span class="mr-2 text-white icon-phone"></span> <span class="d-none d-md-inline-block">+62 852 0023 6000</span></a>

						<div class="float-right">
							@guest
							<a href="{{ route('login') }}" class="text-white">Login<span class="d-none d-md-inline-block"></span></a>
							<span class="mx-md-2 d-inline-block"></span>
							@if (Route::has('register'))
							<!-- <a href="{{ route('register') }}" class="text-white">Register<span class="d-none d-md-inline-block"></span></a> -->
							@endif
							@else
							
							<a href="
							@if( Auth::user()->role == 'santri' )
							{{ route('profilsantri.index')}}
							@elseif( Auth::user()->role == 'staff' )
							{{ route('profilstaff.index')}}
							@else
							{{ route('home') }}
							@endif" class="float-right text-white">

							{{ Auth::user()->name }}<span class="d-none d-md-inline-block fa fa-user ml-1"></span></a>
							@endguest
						</div>

					</div>

				</div>

			</div>
		</div>

		<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

			<div class="container">
				<div class="row align-items-center position-relative">


					<div class="site-logo">
						<a href="{{ route('landpage')}}" class="text-black"><!-- <img src="https://madinatulquran.or.id/wp-content/uploads/2018/04/logo-main-57px2.png" style="width: 55px; height: 55px"> --><span class="" style="color: black">MADINATUL QURAN</a>
						</div>

						<div class="col-12">
							<nav class="site-navigation text-right ml-auto " role="navigation">

								<ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
									<li><a href="{{ route('landpage')}}" class="nav-link">Home</a></li>
									<li class="has-children">
										<a href="" class="nav-link">Program</a>
										<ul class="dropdown arrow-top">
											<li><a href="{{ route('sd')}}" class="nav-link">SD Tahfidz</a></li>
											<li><a href="{{ route('smp')}}" class="nav-link">SMP Islam</a></li>
											<li><a href="{{ route('sma')}}" class="nav-link">SMA Tahfidz</a></li>
											<li><a href="{{ route('tba')}}" class="nav-link">Pendidikan Tahfidz dan B. Arab</a></li>
											<li><a href="{{ route('ma')}}" class="nav-link">Mahad 'Aly</a></li>
										</ul>
									</li>
									<li><a href="{{ route('posts')}}" class="nav-link">Berita</a></li>
									<li><a href="#footer-section" class="nav-link">Kontak</a></li>
									<li class="has-children">
										<a href="#about-section" class="nav-link">Lainnya</a>
										<ul class="dropdown arrow-top">
											<li><a href="{{ route('galeri')}}" class="nav-link">Galeri</a></li>
											<li><a href="{{ route('videos')}}" class="nav-link">Video</a></li>
										</ul>
									</li>
								</ul>
							</nav>

						</div>

						<div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

					</div>
				</div>

			</header>
			@yield('contentweb')

			
		</body>
		</html>
		
