<!doctype html>
<html lang="en" dir="ltr"> <!-- This "landing-app.blade.php" master page is used only for "landing" page content present in "views/livewire" -->
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Landmark consultants limited | Property consultants & valuers">
		<meta name="author" content="Landmark consultants limited">
		<meta name="keywords" content="Thailand property consultants, Property consultants & valuers">

        @include('layouts.components.landing.styles')

	</head>


	<body class="ltr app horizontal landing-page"></body>

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

                @include('layouts.components.landing.app-header')

				<!--APP-SIDEBAR-->
				<div class="landing-top-header overflow-hidden">
					<div class="top sticky overflow-hidden">

                        @include('layouts.components.landing.app-sidebar')

					</div>


				</div>
				<!--/APP-SIDEBAR-->

                <!--app-content open-->
				<div class="hor-content main-content mt-0">
					<div class="side-app">
						<!-- CONTAINER -->
						<div class="main-container">

							@yield('content')

						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>

            @include('layouts.components.landing.footer')

		</div>

        @include('layouts.components.landing.scripts')

	</body>
</html>
