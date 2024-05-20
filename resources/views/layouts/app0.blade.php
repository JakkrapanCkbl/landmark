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

                @include('layouts.components.app-header0')

                @include('layouts.components.app-sidebar0')

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

            @include('layouts.components.footer0')

        </div>
        <!-- page -->

        @include('layouts.components.scripts')
        @livewireScripts
    </body>

</html>
