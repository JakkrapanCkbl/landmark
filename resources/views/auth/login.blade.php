{{-- @extends('layout')
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">

                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection --}}

@extends('layouts.app0')

        @section('styles')

        @endsection

        @section('body')
        	<body class="ltr login-img">
        @endsection

        @section('content')
			<!-- PAGE -->
			<div>
				    <!-- CONTAINER OPEN -->
					{{-- <div class="col col-login mx-auto text-center">
						<a href="{{url('index')}}" class="text-center">
							<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img" alt="">
						</a>
					</div> --}}
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form action="{{ route('login.post') }}" method="POST" class="login100-form validate-form">
									@csrf
									<span class="login100-form-title">
										Login
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input id="email_address" class="input100" type="text" name="email" value="" placeholder="Email" >
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input id="password" class="input100" type="password" name="password" value="" placeholder="Password" >
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									{{-- <div class="text-end pt-1">
										<p class="mb-0"><a href="{{url('forgot-password')}}" class="text-primary ms-1">Forgot Password?</a></p>
									</div> --}}
									<div class="container-login100-form-btn">
										{{-- <a href="{{url('index')}}" class="login100-form-btn btn-primary">
											Login
										</a> --}}
                                        <button type="submit" class="btn btn-primary btn-md btn-block mb-1">Login</button>
									</div>
									<div class="text-center pt-3">
										{{-- <p class="text-dark mb-0">Not a member?<a href="{{url('register')}}" class="text-primary ms-1">Create an Account</a></p> --}}
										<p class="text-dark mb-0">Forget a password?<a href="{{route("forget.password")}}" class="text-primary ms-1">Forget Password</a></p>
									</div>
								</form>
							</div>
							<div class="card-footer">
								<div class="d-flex justify-content-center my-3">
									<a href="javascript:void(0)" class="social-login  text-center me-4">
										<i class="fa fa-google"></i>
									</a>
									<a href="javascript:void(0)" class="social-login  text-center me-4">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="javascript:void(0)" class="social-login  text-center">
										<i class="fa fa-twitter"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			<!-- End PAGE -->
        @endsection  

        
		
		@section('scripts')
			<script>
				window.addEventListener('DOMContentLoaded', (event) => {
					//alert('ok');
					// Clear the fields
					document.getElementById('email_address').value = '';
					document.getElementById('password').value = '';
				});
			</script>
        @endsection


