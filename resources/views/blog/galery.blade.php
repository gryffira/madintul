@extends('layouts.navlanding')
@section('title', ' | Galeri Foto')
@section('contentweb')
<section class="site-section" id="about-section">
	<div class="container">
    <div class="row justify-content-center mb-4 block-img-video-1-wrap">
      <div class="row">
        @foreach($galery as $foto)
        <div class="col-md-4 mb-5">
          <figure class="block-img-video-1" data-aos="fade">
            <a href="{{ $foto->image_url }}" data-fancybox data-ratio="2" >
              <img src="{{ $foto->image_url }}" alt="Image" class="img-fluid">
            </a>
          </figure>
        </div>
        @endforeach
      </div>
    </div>
    <div class="text-center text-black" style="color: #fff; background-color: #fff; position: center">
        {{ $galery->links() }}
      </div>
  </div>
</section>


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

<script src="{{url('/')}}/unearth/js/jquery-3.3.1.min.js"></script>
<script src="{{url('/')}}/unearth/js/popper.min.js"></script>
<script src="{{url('/')}}/unearth/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/unearth/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.sticky.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.waypoints.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.animateNumber.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.fancybox.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.easing.1.3.js"></script>
<script src="{{url('/')}}/unearth/js/aos.js"></script>

<script src="{{url('/')}}/unearth/js/main.js"></script>


@endsection