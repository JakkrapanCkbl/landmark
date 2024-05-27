<!-- Horizontal-Menu -->
				<div class="sticky">
					<div class="horizontal-main hor-menu clearfix">
						<div class="horizontal-mainwrapper container clearfix">
							<nav class="horizontalMenu clearfix">
								<ul class="horizontalMenu-list">
									<li aria-haspopup="true"><a href="#" class="sub-icon active"><i class="fe fe-home"></i> Dashboard <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											<li aria-haspopup="true"><a href="{{route('welcome')}}">Home</a></li>
											<li aria-haspopup="true"><a href="{{route('dashboard')}}">Dashboard</a></li>
											
										</ul>
									</li>

									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-pie-chart"></i> Jobs  <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											<li aria-haspopup="true">
												<a href="{{route('admininputjob.create')}}">Assign Job</a>
												<a href="{{route('dashboard')}}">Work in Progress</a>
											</li>
											
										</ul>
									</li>
									
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-layers"></i>Admin <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											
											<li aria-haspopup="true"><a href="{{route('invoice')}}">Invoice / Receive</a></li>
											
										</ul>
									</li>

									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-package"></i> Support Docuents  <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											<li aria-haspopup="true">
												<a href="{{route('docsearch')}}">ผังเมือง </a>
											</li>
											<li aria-haspopup="true">
												<a href="chart-echart.html">โบชัว</a>
											</li>
											
										</ul>
									</li>
								
									
									
								</ul>
							</nav>
							<!-- Nav End -->
						</div>
					</div>
				</div>
				<!-- Horizontal-Menu End -->