<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madinatul Quran | @yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/Limitless/Template/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/Limitless/Template/layout_1/LTR/default/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/Limitless/Template/layout_1/LTR/default/full/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/Limitless/Template/layout_1/LTR/default/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/Limitless/Template/layout_1/LTR/default/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/Limitless/Template/global_assets/js/plugins/simplemde/simplemde.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/simplemde/simplemde.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/ui/nicescroll.min.js"></script>

	<script src="{{url('/')}}/Limitless/Template/layout_1/LTR/default/full/assets/js/app.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/layout_fixed_custom.js"></script>
	<!-- /theme JS files -->

	<!-- post list -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/table_elements.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/components_buttons.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/datatables_responsive.js"></script>

	<!-- /date picker -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/pickers/anytime.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/picker_date.js"></script>


	<!-- post form -->

	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/form_inputs.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/form_validation.js"></script>
	
	<!-- Theme JS summernote files -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/editor_summernote.js"></script>
	<!-- Theme JS blog single files -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/blog_single.js"></script>
	<!-- Theme JS form layout vertical files -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/form_layouts.js"></script>

	<!-- event -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/global_assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/global_assets/js/demo_pages/extra_fullcalendar.js"></script>

	<!-- modal -->
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/components_modals.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script src="{{url('/')}}/Limitless/Template/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>

	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/editor_ckeditor.js"></script>

	<!-- image -->

	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"> -->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

	<script src="{{url('/')}}/Limitless/Template/global_assets/js/demo_pages/user_pages_profile.js"></script>
	

</head>

<body class="navbar-top has-detached-right">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			
			<a class="navbar-brand" href="{{ route('landpage')}}"><span class="text-semibold">  MADINATUL QURAN</span></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				<li><a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="@if( Auth::user()->role == 'santri' )
						{{auth()->user()->santri->image_url}}
						@elseif( Auth::user()->role == 'staff' )
						{{auth()->user()->staff->image_url}}
						@elseif( Auth::user()->role == 'admin' )
						 {{auth()->user()->staff->image_url}}
						@else
						/imgsantri/default-profile.png
						@endif" alt="">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>



					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="
							@if( Auth::user()->role == 'santri' )
							{{ route('profilsantri.edit', Auth::user()->santri->id)}}
							@elseif( Auth::user()->role == 'staff' )
							{{ route('profilstaff.edit', Auth::user()->staff->id)}}
							@elseif( Auth::user()->role == 'admin' )
							{{ route('profilstaff.edit', Auth::user()->staff->id)}}
							@else
							@endif
							"><i class="icon-user-plus"></i> Profil</a></li>
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="icon-switch2"></i>Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@section('sidebar')
		@include('layouts.backend.sidebar')
		@show
		<!-- /main sidebar -->


		<!-- Main content -->

		<!-- Content area -->
		@yield('content')
		<!-- /content area -->

		<!-- /main content -->

	</div>
	<!-- /page content -->
</div>
<!-- /page container -->
@yield('script')

</body>
</html>
