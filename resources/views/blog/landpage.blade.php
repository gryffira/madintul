@extends('layouts.navlanding')

@section('contentweb')
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border text-success" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<div class="owl-carousel slide-one-item">
  <div class="site-section-cover overlay img-bg-section active" style="background-image: url('{{url('/')}}/imgprofil/profil_33.jpg')">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-12 col-lg-7">
         <h1 data-aos="fade-up" data-aos-delay="" style="font-size: 70px; margin-bottom: 25px">Madinatul Qur'an</h1>
         <p class="mb-50" data-aos="fade-up" data-aos-delay="100" style="font-size: 23px;  margin-bottom: 0px">"Membangun Generasi Qurani, Berkarakter dan visioner"</p>
         <p style="font-size: 23px;">Untuk membentuk generasi Bangsa Indonesia yang brpegang teguh pada Al-Qur'an & Sunnah.</p>
       </div>
     </div>
   </div>
 </div>
 @foreach($iklan as $ad)
 <div class="site-section-cover overlay img-bg-section" style="background-image: url('{{ $ad->image_url }}'); " >
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12 col-lg-8">
       <a href="{{$ad->url}}"><h1 data-aos="fade-up" data-aos-delay="">{{$ad->title}}</h1></a>    
       <p class="mb-50" data-aos="fade-up" data-aos-delay="100" style="line-height: 25px">{{$ad->excerpt}}</p>
     </div>
   </div>
 </div>
</div>
@endforeach
</div>

<div class="site-section">
  <div class="block__73694 mb-2" id="services-section">
    <div class="container">
      <div class="row d-flex no-gutters align-items-stretch">
        <div class="col-12 col-lg-6 block__73422" style="background-image: url('{{url('/')}}/imgprofil/logo.jpg')" data-aos="fade-right" data-aos-delay="">
        </div>
        <div class="col-lg-5 ml-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="">
          <h3 class="mb-3 text-black">Tentang Madinatul Quran</h3>
          <p>Pondok Pesantren Madinatul Qur’an – Jonggol didirikan dengan harapan untuk melahirkan kembali generasi penegak kejayaan Islam yang akan mengembalikan masyarakat muslim kepada masa keemasannya, kepada Al-Qur’an, kepada kemurnian ajaran Islam, kepada Aqidah yang lurus dan Akhlaqul karimah yang berlandaskan Al-Quran, dan As-Sunnah, serta berdasarkan pemahaman ulama salaf Ahlus Sunnah wal Jama’ah, dan mengembalikan bahasa Arab sebagai bahasa kaum muslimin.</p>
        </div>
      </div>
    </div>      
  </div>


  <div class="block__73694">
    <div class="container">
      <div class="row d-flex no-gutters align-items-stretch">

        <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url('{{url('/')}}/imgprofil/profil_25.jpg');" data-aos="fade-left" data-aos-delay="">
        </div>
        <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade-right" data-aos-delay="">
          <h2 class="mb-3 text-black">Mengapa Madinatul Quran?</h2>
          <p>Madinatul Quran berlokasi di Desa Singasari, Kec. Jonggol, yang masih memiliki lingkungan yang Asri dan juga Alami serta jauh dari Hiruk Pikuk Perkotaan sehingga memudahkan Anak Didik kami untuk berkonsentrasi dalam belajar serta menghafal Al-Qur’an.</p>
          <ul class="ul-check primary list-unstyled mt-40" >
            <li>Lingkungan Asri & Alami</li>

            <li>Pengajar Berpengalaman</li>
            <li>Lingkungan Berbahasa</li>
            <li>Fasilitas Pendukung yang Mumpuni</li>
          </ul>

        </div>

      </div>
    </div>      
  </div>
</div>

<!--tetsi-->
<div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade" style="background-image: url('{{url('/')}}/imgprofil/profil_3.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover">
  <div class="container">
    <div class="text-center mb-5">
      <div class="block-heading-1">
        <h2 style="color: #fff">PROGRAM PENDIDIKAN</h2>
      </div>
    </div>
    <div class="owl-carousel nonloop-block-13">
      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <h2><a href="{{ route('sd')}}">SD</a></h2>
            <p>SD TAHFIDZ</p>
          </blockquote>
        </div>
      </div>
      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <h2><a href="{{ route('smp')}}">SMP</a></h2>
            <p>SMP ISLAM</p>
          </blockquote>
        </div>
      </div>
      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <h2><a href="{{ route('sma')}}">SMA</a></h2>
            <p>SMA TAHFIDZ</p>
          </blockquote>
        </div>
      </div>
      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <h2><a href="{{ route('tba')}}">P-TB</a></h2>
            <p>PENDIDIKAN TAHFIDZ 
            & BAHASA ARAB</p>
          </blockquote>
        </div>
      </div>
      <div>
        <div class="block-testimony-1 text-center">
          <blockquote class="mb-4">
            <h2><a href="{{ route('ma')}}">MA</a></h2>
            <p>MAHAD 'ALY</p>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section" id="blog-section">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <div class="block-heading-1" data-aos="fade-up" data-aos-delay="" style="padding: 0px">
          <h2 style="color: black">KABAR BERITA</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($landpage as $post)
      <div class="col-sm-4" data-aos="fade-up" data-aos-delay="">
        <div>
          @if ($post->image_url)
          <!-- foto usahakan di crop 3x2 landscape-->
          <a href="{{ route('showpost', $post->id) }}" class="mb-4 d-block"><img style="width: 400px;
          height: 240px; overflow: hidden;" src="{{ $post->image_url }}" alt="Image" class="img-fluid"></a>
          @endif
          <h2 style="font-size: 18px;" ><a href="{{ route('showpost', $post->id) }}" style="color: black">{!! $post->title !!}</a></h2>
          <p class="text-muted mb-3 text-uppercase small" ><span class="mr-2">{{ $post->date }}</span>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ route('posts')}}" style=" padding-top: 20px">
          <input type="submit" value="SEMUA KABAR BERITA" class="btn text-black" style="border: 5px; background-color: #F8F9FA; font-family: Oswald">
        </form>
      </div>
    </div>
  </div>


  <div class="site-section" id="press-section" style="background-color: #f8f9fa">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="block-heading-1" data-aos="fade-right" data-aos-delay="">
            <h2 style="color: black">AGENDA</h2>
          </div>
        </div>

        <div class="col-lg-6">
          <ul class="list-unstyled">
            <li class="mb-10" data-aos="fade-right" data-aos-delay="">
              @foreach($agenda as $event)

              <h2><a href="{{ route('event', $event->id) }}" class="text-black">{{ $event->dateFormat() }}</a></h2>
              <h6><a href="{{ $event->url_tempat }}" style="font-size: 17px;" class="fa fa-map-marker text-muted pr-1"> <span class="text-muted" style="font-family: Oswald"> {{ $event->tempat }} </span> </a></h6>
              <h5 style="padding-bottom: 30px"><span class="text-black"><a href=""></a>{{ $event->title }}</span></h5>
              <!-- <p></p> -->
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
<script src="{{url('/')}}/unearth/js/jquery.fancybox.min.js"></script>
<script src="{{url('/')}}/unearth/js/jquery.easing.1.3.js"></script>
<script src="{{url('/')}}/unearth/js/aos.js"></script>

<script src="{{url('/')}}/unearth/js/main.js"></script>
@endsection
