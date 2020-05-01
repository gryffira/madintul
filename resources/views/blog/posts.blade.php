@extends('layouts.navlanding')
@section('title', ' | Semua Berita')
@section('contentweb')
<section class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 blog-content ">
       <div class="row">
        @foreach($posts as $post)
        <div class="col" style="padding-bottom: 20px">
          <div class="card" style="width: 18rem; border: none; background-color: #FBFBFB">
            @if ($post->image_url)
            <img src="{{ $post->image_url }}" class="card-img-top" style="border-radius: 0px">
            @endif
            <div class="card-body" >
              <h5 class="card-title" style="padding: none; font-size: 17px"><a href="{{ route('showpost', $post->id) }}">{{$post->title}}</a></h5>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="col-md-4 sidebar">
      <div class="sidebar-box">
       <form action="{{ route('posts')}}">
        <div class="form-group" >
          <input type="text" placeholder="Search.." value="{{request('search')}}" name="search" style="  padding: 10px; font-size: 17px;border: 1px solid grey;  float: left;  width: 80%;background: #f1f1f1;">
          <button type="submit" style=" float: left; width: 20%;padding: 10px; background: #C0C0C0; color: white;font-size: 17px;  border: 1px solid grey;border-left: none; /* Prevent double borders */cursor: pointer;"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
 <!--    <div class="sidebar-box">
     <div class="categories">
      <h3>Kategori</h3>
      @foreach ($categories as $category)
      <li><a href="{{ route('category', $category->id) }}" style="color: #606060">{{$category->title}}<span>{{ $category->posts->count() }}</span></a></li>
      @endforeach
    </div>
  </div> -->
  <div class="sidebar-box">
   <div class="categories">
    <h3>Berita Terbaru</h3>
    @foreach ($recent as $new)
    <li><a href="{{ route('showpost', $new->id) }}" style="color: #606060">{{ $new->title }}</a></li>
    @endforeach
  </div>
</div>

 <div class="sidebar-box">
   <div class="categories">
    <h3>Agenda</h3>
    @foreach ($close as $new)
    <li><a href="{{ route('event', $new->id) }}" style="color: #606060">{{ $new->dateFormat() }}</a></li>
    @endforeach
  </div>
</div>


<!--  -->
				<!-- <div class="sidebar-box">
					<img src="{{url('/')}}/unearth/images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle">
					<h3 class="text-black">About The Author</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
					<p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
				</div>

				<div class="sidebar-box">
					<h3>Paragraph</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
				</div> -->
			</div>
     <div class="text-center text-black" style="background: #fff">
      {{ $posts->links() }}
    </div>
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