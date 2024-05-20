<!doctype html>
<html lang="en" dir="ltr"> <!-- This "app.blade.php" master page is used for all the pages content present in "views/livewire" except "custom" and "switcher" pages -->
	<head>
        
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Landmark consultants limited | Property consultants & valuers">
		<meta name="author" content="Landmark consultants limited">
		<meta name="keywords" content="Thailand property consultants, Property consultants & valuers">

        @include('layouts.components.styles')
        {{-- add dropzone --}}
         {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>   --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
       @livewireStyles
       
    </head>

    <body class="ltr app sidebar-mini light-mode">

        <!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
		<div class="page">
			<div class="page-main">

                @include('layouts.components.app-header')

                @include('layouts.components.app-sidebar')

                <!--app-content open-->
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                @yield('content')

                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
             </div>

            @include('layouts.components.modal')

            @yield('modal')

            @include('layouts.components.footer')

            

        </div>
        <!-- page -->

        @include('layouts.components.scripts')

        @livewireScripts
    </body>

</html>
