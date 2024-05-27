<!-- Navbar-->
				<header class="header top-header">
					<!-- Navbar Right Menu-->
					<div class="container">
						<div class="d-flex">
							 <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
							<a class="header-brand" href="index.html">
								<img alt="logo" class="header-brand-img main-logo" src="{{asset('external2/images/brand/logo1.png')}}">
								<img alt="logo" class="header-brand-img mobile-logo" src="{{asset('external2/images/brand/icon.png')}}">
							</a>
							<!-- Sidebar toggle button-->
							<div class="dropdown d-sm-flex d-none">
								<a href="#" class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu header-search dropdown-menu-left dropdown-menu-arrow">
									<div class="input-group w-100 p-2">
										<input type="text" class="form-control " placeholder="Search....">
										<div class="input-group-append ">
											<button type="button" class="btn btn-primary ">
												<i class="fas fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							
							<div class="d-flex order-lg-2 ml-auto">
								<div class="d-sm-flex d-none">
									<a href="#" class="nav-link icon full-screen-link">
										<i class="fe fe-minimize fullscreen-button"></i>
									</a>
								</div>
								
								<div class="dropdown d-sm-flex d-none header-message">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-mail"></i>
										<span class=" nav-unread badge badge-danger badge-pill">4</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item text-center" href="#">2 New Messages</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item d-flex pb-3" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/7.jpg')}}"></span>
											<div>
												<strong>Madeleine</strong> Hey! there I' am available....
												<div class="small text-muted">
													3 hours ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/3.jpg')}}"></span>
											<div>
												<strong>Anthony</strong> New product Launching...
												<div class="small text-muted">
													5 hour ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/8.jpg')}}"></span>
											<div>
												<strong>Olivia</strong> New Schedule Realease......
												<div class="small text-muted">
													45 mintues ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/9.jpg')}}"></span>
											<div>
												<strong>Sanderson</strong> New Schedule Realease......
												<div class="small text-muted">
													2 days ago
												</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
												<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
											</div>
										</div>
									</div>
								</div>
								<div class="dropdown d-sm-flex d-none header-message">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-bell"></i>
										<span class=" nav-unread badge badge-warning  badge-pill">3</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item text-center" href="#">Notifications</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-primary"><i class="fe fe-mail fs-12"></i></span>
											<div>
												<span class="font-weight-bold"> commented on your post </span>
												<div class="small text-muted d-flex">
													3 hours ago
													<div class="ml-auto">
													<span class="badge badge-primary">New</span>
													</div>
												</div>
												<div class="progress progress-xs mt-1">
													<div class="progress-bar bg-primary w-30"></div>
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-secondary"><i class="fe fe-download"></i>
											</span>
											<div>
												<span class="font-weight-bold"> New file has been Uploaded </span>
												<div class="small text-muted d-flex">
													5 hour ago
													<div class="ml-auto">
													<span class="badge badge-secondary">New</span>
													</div>
												</div>
												<div class="progress progress-xs mt-1">
													<div class="progress-bar bg-secondary w-50"></div>
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-warning"><i class="fe fe-user"></i>
											</span>
											<div>
												<span class="font-weight-bold"> User account has Updated</span>
												<div class="small text-muted d-flex">
													5 hour ago
													<div class="ml-auto">
													<span class="badge badge-warning">New</span>
													</div>
												</div>
												<div class="progress progress-xs mt-1">
													<div class="progress-bar bg-warning w-70"></div>
												</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
												<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
											</div>
										</div>
									</div>
								</div>
								<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
								</button>
								<!--Navbar -->
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span class="avatar avatar-md brround cover-image" data-image-src="{{asset(Auth::user()->avatar)}}"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-1">Vanessa Dyer</h5>
												<small class="text-muted">Web Developer</small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-edit"></i>Schedule</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-mail"></i> Inbox</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-unlock"></i> Look Screen</a>
										<!--<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-power"></i> Log Out</a>-->
										<a class="dropdown-item" href="{{ route('logout') }}" 
										onclick="event.preventDefault();
										                     document.getElementById('logout-form').submit();">
										        <i class="dropdown-icon fe fe-power"></i> Log Out								
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									        @csrf
									    </form>


										





										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-icon btn-facebook btn-sm"><i class="si si-social-facebook"></i></a>
												<a href="#" class="btn btn-icon btn-twitter btn-sm"><i class="si si-social-twitter"></i></a>
												<a href="#" class="btn btn-icon btn-instagram btn-sm"><i class="si si-social-instagram"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="dropdown d-md-flex header-settings">
									<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-align-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</header>
				<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-sm-none bg-white">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
							<div class="dropdown d-md-flex">
								<a href="#" class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu  dropdown-menu-right dropdown-menu-arrow">
									<div class="input-group w-100 p-2">
										<input type="text" class="form-control " placeholder="Search....">
										<div class="input-group-append ">
											<button type="button" class="btn btn-primary ">
												<i class="fas fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="d-md-flex">
								<a href="#" class="nav-link icon full-screen-link text-dark">
									<i class="fe fe-minimize fullscreen-button"></i>
								</a>
							</div>
							<div class="dropdown  d-md-flex header-contact">
								<a class="nav-link icon text-dark" data-toggle="dropdown">
									<i class="fe fe-flag"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/svgs/flags/french_flag.jpg')}}"></span>
										<div class="d-flex">
											<span class="">French</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/svgs/flags/germany_flag.jpg')}}"></span>
										<div class="d-flex">
											<span class="">Germany</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/svgs/flags/italy_flag.jpg')}}"></span>
										<div class="d-flex">
											<span class="">Italy</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag  mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/svgs/flags/russia_flag.jpg')}}"></span>
										<div class="d-flex">
											<span class="">Russia</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/svgs/flags/spain_flag.jpg')}}"></span>
										<div class="d-flex">
											<span class="">spain</span>
										</div>
									</a>
								</div>
							</div>
							<div class="dropdown  d-md-flex header-contact">
								<a class="nav-link icon text-dark" data-toggle="dropdown">
									<i class="fe fe-mail"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item text-center" href="#">2 New Messages</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item d-flex pb-3" href="#">
										<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/7.jpg')}}"></span>
										<div>
											<strong>Madeleine</strong> Hey! there I' am available....
											<div class="small text-muted">
												3 hours ago
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/3.jpg')}}"></span>
										<div>
											<strong>Anthony</strong> New product Launching...
											<div class="small text-muted">
												5 hour ago
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/8.jpg')}}"></span>
										<div>
											<strong>Olivia</strong> New Schedule Realease......
											<div class="small text-muted">
												45 mintues ago
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="{{asset('external2/images/users/9.jpg')}}"></span>
										<div>
											<strong>Sanderson</strong> New Schedule Realease......
											<div class="small text-muted">
												2 days ago
											</div>
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<div class="text-center dropdown-btn pb-3">
										<div class="btn-list">
											<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
											<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
										</div>
									</div>
								</div>
							</div>
							<div class="dropdown d-md-flex header-message">
								<a class="nav-link icon text-dark" data-toggle="dropdown">
									<i class="fe fe-bell"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item text-center" href="#">Notifications</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item d-flex pb-4" href="#">
										<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-primary"><i class="fe fe-mail fs-12"></i></span>
										<div>
											<span class="font-weight-bold"> commented on your post </span>
											<div class="small text-muted d-flex">
												3 hours ago
												<div class="ml-auto">
												<span class="badge badge-primary">New</span>
												</div>
											</div>
											<div class="progress progress-xs mt-1">
												<div class="progress-bar bg-primary w-30"></div>
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-4" href="#">
										<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-secondary"><i class="fe fe-download"></i>
										</span>
										<div>
											<span class="font-weight-bold"> New file has been Uploaded </span>
											<div class="small text-muted d-flex">
												5 hour ago
												<div class="ml-auto">
												<span class="badge badge-secondary">New</span>
												</div>
											</div>
											<div class="progress progress-xs mt-1">
												<div class="progress-bar bg-secondary w-50"></div>
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-4" href="#">
										<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-warning"><i class="fe fe-user"></i>
										</span>
										<div>
											<span class="font-weight-bold"> User account has Updated</span>
											<div class="small text-muted d-flex">
												5 hour ago
												<div class="ml-auto">
												<span class="badge badge-warning">New</span>
												</div>
											</div>
											<div class="progress progress-xs mt-1">
												<div class="progress-bar bg-warning w-70"></div>
											</div>
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<div class="text-center dropdown-btn pb-3">
										<div class="btn-list">
											<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
											<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
										</div>
									</div>
								</div>
							</div>
							<div class="dropdown d-md-flex header-message">
								<a class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-grid"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item d-flex pb-3" href="left-menu.html">Icon Menu</a>
									<a class="dropdown-item d-flex pb-3" href="sidemenu.html">Icon Closed Menu</a>
									<a class="dropdown-item d-flex pb-3" href="overlay2.html">Icon Overlay Menu</a>
									<a class="dropdown-item d-flex pb-3" href="overlay.html">Closed Overlay Menu</a>
									<a class="dropdown-item d-flex pb-3" href="toggle.html">Toggle Menu</a>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/Navbar -->