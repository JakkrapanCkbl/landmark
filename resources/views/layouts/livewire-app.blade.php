<!DOCTYPE html>
<html>
<head>
<!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Landmark consultants limited | Property consultants & valuers">
    <meta name="author" content="Landmark consultants limited">
    <meta name="keywords" content="Thailand property consultants, Property consultants & valuers">
    
    @include('layouts.components.styles')
    
    <title>My Website Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @livewireStyles
</head>
<body>
    <!-- PAGE -->
		<div class="page">
			<div class="page-main">
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

  
    @livewireScripts
   
    <script>
        window.livewire.on('studentAdded',()=>{
            $('#addStudentModal').modal('hide');
        })
    </script>

</body>
</html>

