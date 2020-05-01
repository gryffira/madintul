@extends('layouts.navlanding')
@section('title', ' | Berita')
@section('contentweb')
<section class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 blog-content">
				@if ($post->image_url)
				<div style="padding-bottom: 10px">
					<img src="{{ $post->image_url }}" alt="Image" style="min-width: 650px;
					min-height: 400px; overflow: hidden;" class="img-fluid">
				</div>
				@endif
				<div class="block-heading-1">
					<span class="text-muted mb-3 mt-5">
						<i class="fa fa-clock-o fa-lg"></i>&nbsp{{ $post->date }}
						&nbsp&nbsp&nbsp&nbsp<i class="fa fa-eye fa-lg"></i>&nbsp{{ $post->view_count }}&nbsp&nbsp&nbsp&nbsp<i class="fa fa-comments-o fa-lg"></i>&nbsp{{ $post->comments->count() }}
					</p>
					<h1 class="mb-4" style="font-size: 20px; padding-top: 15px; margin-bottom: 0px; pad">{{ $post->title }}</h1>
				</div>
				<p>
					{!! Markdown::convertToHtml(e($post->body))!!}
				</p>
				<div class="pt-5" >
					<h5 class="mb-5">{{ $post->comments->count() }} Komentar</h5>
					<ul class="comment-list">
						<?php $currentUser= auth()->user(); ?>
						<?php $superAdmin= 1 ?>

						@foreach($postComments as $comment)
						<li class="comment">
							<div class="comment-body" style="font-size: 15px">
								<h5 style="font-size: 17px">{{ $comment->user_name }}</h5>
								<div class="meta">{{ $comment->dateFormatted()}}</div>
								{{ $comment->body }}
								@if( Auth::user() &&  $currentUser->id == $superAdmin)
								
								<form action="{{ route('comment.delete', $comment['id'])}}" method="post">
									@csrf
									<input name="_method" type="hidden" value="DELETE">
									<button class="btn" type="submit" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;"><i class="fa fa-trash" style="color: red"></i></button></p>
								</div>
							</form>
						@endif

						</li>
						@endforeach
					</ul>
					<ul class="comment-list" style="width: 200px;  display: block;margin-left: auto; margin-right: auto;">
						<li class="comment">
							<div class="comment-body">
								<nav class="pagination is-centered">
									{{  $postComments->links() }}
								</nav>
							</div>
						</li>
					</ul>
				</div>


				<!-- END comment-list -->
				@if( Auth::user() )
								
				<div class="comment-form-wrap pt-5">
					<!-- 	<h5 class="mb-5">Tulis Komentar</h5> -->
					<form action="{{ route('blog.comments', $post->id) }}" class="" method="post">
						@csrf
						<div class="form-group">
							<textarea name="body" id="message" placeholder="Tulis komentar..." cols="30" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white" >
						</div>

					</form>
				</div>
			@endif
			</div>

			<div class="col-md-4 sidebar">
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
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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