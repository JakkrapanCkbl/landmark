<!doctype html>
<html lang="en" dir="ltr">
	<head>
		
		@include('dashboard.head')

	</head>

	<body class="app">

		<!-- Global Loader-->
		<div id="global-loader"><img src="{{asset('external2/images/svgs/loader.svg')}}" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				@include('dashboard.nav')

				@include('dashboard.menubar')
				

				<div class="container content-area">
					
					<!-- Tab -->
						@include('invoice.tab')				
					<!-- End Tab -->

				

		@include('invoice.footer')
	