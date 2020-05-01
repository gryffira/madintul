<div class="sidebar sidebar-main sidebar-fixed">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a class="media-left"><img src="
						@if( Auth::user()->role == 'santri' )
						{{auth()->user()->santri->image_url}}
						@elseif( Auth::user()->role == 'staff' )
						{{auth()->user()->staff->image_url}}
						@elseif( Auth::user()->role == 'admin' )
						{{auth()->user()->staff->image_url}}
						@else
						/imgsantri/default-profile.png
						@endif" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
						<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
						@if( Auth::user()->role == 'superadmin' )
						<div class="text-size-mini text-muted">
							<i class="text-size-small"></i>SUPER ADMIN
						</div>
						@elseif( Auth::user()->role == 'admin' )
						<div class="text-size-mini text-muted">
							<i class="text-size-small"></i>ADMINISTRATOR
						</div>
						@elseif( Auth::user()->role == 'santri' )
						<div class="text-size-mini text-muted">
							<i class="text-size-small"></i>SANTRI
						</div>
						@elseif( Auth::user()->role == 'staff' )
							<div class="text-size-mini text-muted">
							<i class="text-size-small"></i>STAFF
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">

					<!-- Main -->
					<li class="navigation-header"><span></span> <i class="icon-menu" title="Main pages"></i></li>

					@if(in_array(auth()->user()->role, ['superadmin', 'admin']))
					<li><a href="{{ route('home')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
					<li>
						<a href="#"><i class="icon-list-unordered"></i> <span>List</span></a>
						<ul>
							<li><a href="{{ route('iklan.index')}}">Iklan</a></li>
							<li><a href="{{ route('blog.index')}}">Berita</a></li>
							<li><a href="{{ route('agenda.index')}}">Agenda</a></li>
							<li><a href="{{ route('link.index')}}">Link</a></li>
							<li><a href="{{ route('photo.index')}}">Foto</a></li>
							<li><a href="{{ route('video.index')}}">Video</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-pencil3"></i> <span>Create</span></a>
						<ul>
							<li><a href="{{ route('iklan.create')}}">Iklan</a></li>
							<li><a href="{{ route('blog.create')}}">Berita</a></li>
							<li><a href="{{ route('agenda.create')}}">Agenda</a></li>
							<li><a href="{{ route('link.create')}}">Link</a></li>
							<li><a href="{{ route('photo.create')}}">Foto</a></li>
							<li><a href="{{ route('video.create')}}">Video</a></li>
						</ul>
					</li>
					@endif

					@if( Auth::user()->role == 'superadmin' )
					<li>
						<a href="#"><i class="icon-people"></i> <span>User</span></a>
						<ul>
							<li><a href="{{ route('admin.index')}}">Semua User</a></li>
							<li><a href="{{ route('staff.index')}}">Staff</a></li>
							<li><a href="{{ route('santri.index')}}">Santri</a></li>
						</ul>
					</li>
					@endif

					@if( Auth::user()->role == 'santri' )
					<li><a href="{{ route('profilsantri.index')}}"><i class="icon-home4"></i> <span>Beranda</span></a></li>
					@endif

					@if(in_array(auth()->user()->role, ['staff', 'admin']))
					<li><a href="{{ route('profilstaff.index')}}"><i class="icon-home4"></i> <span>Beranda</span></a></li>
					@endif
				</ul>
			</div>
		</div>
		<!-- /main navigation -->
	</div>
</div>