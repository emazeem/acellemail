<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') - {{ \Acelle\Model\Setting::get("site_name") }}</title>

	@include('layouts.core._head')
</head>

<body style="background: -webkit-repeating-radial-gradient(center, ellipse cover,blue, black);">

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">

			@yield('page_header')

		</div>
	</div>
	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container" style="min-height: 100vh">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- main inner content -->
				@yield('content')

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="d-flex justify-content-center pt-5">
			<div class="footer text-muted text-center py-3">
				{!! trans('messages.brand.copyright', ['app_name' => get_app_name()] ) !!}
			</div>
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->

    {!! \Acelle\Model\Setting::get('custom_script') !!}

</body>
</html>
