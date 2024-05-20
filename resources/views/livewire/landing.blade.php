@extends('layouts.landing-app')

@section('styles')

<style>
	.img-block {
		display: block;
		max-width: 100%;
		height: 591px;
		max-height: 591px;
		border: 10px solid black;
	}
</style>
@endsection

@section('content')

{{-- #About
#Service
#Features
#News
#Contact --}}
<div class="section pb-5">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<div class="responsive-screens">
				<div class="slide">
					<div class="col-12">
						<img class="img-fluid mx-auto w-100" src="{{asset('assets/images/landing/carousel/carousel1.jpg')}} " alt="">
					</div>
				</div>
				<div class="slide">
					<div class="col-12">
						<img class="img-fluid mx-auto w-100" src="{{asset('assets/images/landing/carousel/carousel2.jpg')}}" alt="">
					</div>
				</div>
				<div class="slide">
					<div class="col-12">
						<img class="img-fluid mx-auto w-100" src="{{asset('assets/images/landing/carousel/carousel3.jpg')}}" alt="">
					</div>
				</div>
				<div class="slide">
					<div class="col-12">
						<img class="img-fluid mx-auto w-100" src="{{asset('assets/images/landing/carousel/carousel4.jpg')}}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- To be added About Our Company -->
<!-- Our motto section-->
<div class="section pb-5" id="motto" style="background-color: #FFF;">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-12">
				<h3 class="header-family">Key Features</h3>
				<p class="text-default sub-text">Our goal is to educate young professionals on the product
					management and also providing users path to easy customization.</p>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-handshake-o fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Trust</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-plug fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Honesty</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-check-square-o fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Quality</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-envelope-o fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Fast Delivered</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-users fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Teamwork</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-usd fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Affordable Fee</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-truck fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Tracking Status</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-lightbulb-o fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Innovaion</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 why-image">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<i class="fa fa-pie-chart fa-5x" aria-hidden="true"></i>
						</div>
						<p class="why-head mb-2">Big Data Analytics</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Our motto section end-->

<!-- Clients section-->
<div class="bg-primary section bg-white" id="Clients">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-8 text-center">
				<h3 class="header-family text-white">ลูกค้าของเรา</h3>
				<p class="sub-text text-white pb-3">We have the best client in the market who thrives us to perform better.
				</p>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="customer-logos">
					<div class="slide"><img src="{{asset('assets/images/landing/companies/cpb.png')}}" alt="cpb"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/bot.png')}}" alt="bot"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/scb.png')}}" alt="scb"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/ktb.png')}}" alt="ktb"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/uob.png')}}" alt="uob"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/kkpfg.png')}}" alt="kkpfg"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/cimb.png')}}" alt="cimb"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/ttb.png')}}" alt="ttb"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/gsb.png')}}" alt="gsb"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/tisco.png')}}" alt="tisco"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/icbc.png')}}" alt="icbc"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/bam.png')}}" alt="bam"></div>
					<div class="slide"><img src="{{asset('assets/images/landing/companies/sam.png')}}" alt="sam"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Clients section Close-->

<!-- Pricing -->
<div class="section pb-7" id="features">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-12 ps-3">
				<h3 class="header-family">บริการของเรา</h3>
				<p class="text-default sub-text">Select the best plan that suits your business and jump into the market. *</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="pricing-tabs">
					<div class="pri-tabs-heading text-center">
					</div>
					<div class="tab-content">
						<div class="tab-pane pb-0 active show">
							<div class="row d-flex align-items-center justify-content-center">
								<div class="col-lg-6 col-sm-8">
									<div class="card p-3 border-primary pricing-card" style="height: 436px">
										<div class="card-header d-block text-justified pt-2">
											<p class="text-18 font-weight-semibold mb-1">บริการตามประเภท *</p>
										</div>
										<div class="card-body pt-2">
											<ul class="text-justify pricing-body ps-0">
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินมูลค่าตามประเภททรัพย์สิน</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินมูลค่าทรัพย์สินตามวัตถุประสงค์</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินมูลค่าสิทธิการเช่าและค่าเช่าตลาด</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินต้นทุนค่าก่อสร้าง</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินความเป็นไปได้ของโครงการ</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ตรวจสอบทรัพย์สินและเอกสารสิทธิ์ที่ดิน</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-8">
									<div class="card p-3 border-primary pricing-card">
										<div class="card-header d-block text-justified pt-2">
											<!-- <p class="text-18 font-weight-semibold mb-1">ประเมินราคาทรัพย์สินตามประเภท</p> -->
											<span class="text-18 font-weight-semibold m-1">ประเมินมูลค่าทรัพย์สินตามประเภท</span>
										</div>
										<div class="card-body pt-2">
											<ul class="text-justify pricing-body ps-0">
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ที่ดิน</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ที่อยู่อาศัย</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													พาณิชยกรรม</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													อุตสาหกรรมและโกดัง</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													โรงแรม รีสอร์ทและเซอร์วิส</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ศูนย์การค้า</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													อาคารสำนักงาน</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													สนามกอล์ฟ</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													โครงการที่อยู่อาศัยแนวราบ/แนวตั้ง</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Pricing close -->



<!--Video Blog Section-->
<div class="section pb-7" id="Vlog" style="background-color: #FFF;">
	<div class="container">
		<div class="card">
			<div class="row text-center">
				<div class="col-lg-12 ps-3">
					<h3 class="header-family">News & Insights</h3>
					<p class="text-default sub-text">* ข่าวสำคัญ ความรู้เกี่ยวกับอสังหาริมทรัพย์ ทิศทางของอสังหาริมทรัพย์จากผู้เชี่ยวชาญ *</p>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog my-xl-0 my-2">
							<a href="https://youtu.be/2reTF_kbmn8" class="background-image-blog img1 mb-0" target="_blank"></a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">ราคาที่ดินเปล่าก่อนการพัฒนาในกรุงเทพฯ - ปริมณฑล ไตรมาส 3 ปี 2565 </a>
									<p class="mb-0 text-muted mt-4  limit-4-line">ดร.วิชัย วิรัตกพันธ์ ผู้ตรวจการธนาคารอาคารสงเคราะห์ เเละรักษาการผู้อำนวยการศูนย์ข้อมูลอสังหาริมทรัพย์ ให้สัมภาษณ์ในรายการ TNN ข่าวเที่ยง วันที่ 9 พฤศจิกายน 2565 หัวข้อเรื่อง "ราคาที่ดินเปล่าก่อนการพัฒนาในกรุงเทพฯ - ปริมณฑล ไตรมาส 3 ปี 2565</p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog my-xl-0 my-2">
							<a href="{{url('blog-details')}}" class="background-image-blog img2 mb-0">
								<img src="{{asset('assets/images/landing/blog/test1.png')}}" alt="">
								<span class="badge rounded-pill bg-info-gradient blog-label label3">News</span>
							</a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">One big move! A simple short note that </a>
									<p class="mb-0 text-muted mt-4 limit-4-line">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog my-xl-0 my-2">
							<a href="{{url('blog-details')}}" class="background-image-blog img3 mb-0">
								<span class="badge rounded-pill bg-secondary-gradient blog-label label3">Trend & Insight</span>
							</a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">One big move! A simple short note that One big move! A simple short note that One big move! A simple short note that One big move! A simple short note that One big move! A simple short note that will change your life</a>
									<p class="mb-0 text-muted mt-4 limit-4-line">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.</p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog">
							<a href="{{url('blog-details')}}" class="background-image-blog img4 mb-0">
								<span class="badge rounded-pill bg-success-gradient blog-label label2">Research</span>
							</a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">What is economy? Basic knowledge about economy one should know!</a>
									<p class="mb-0 text-muted mt-4 limit-4-line">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.</p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- View more -->
				</div>
				<div class="container align-items-end">
					<div href="{{url('blog-detdivils')}}" class="btn btn-primary mt-2 float-end">Read More ></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Blog Section closed-->

<!--Video log Section-->
<div class="section pb-7" id="Vlog">
	<div class="container">
		<div class="card">
			<div class="row text-center">
				<div class="col-lg-12 ps-3">
					<h3 class="header-family">Videos</h3>
					<p class="text-default sub-text">* ข่าวสำคัญ ความรู้เกี่ยวกับอสังหาริมทรัพย์ ทิศทางของอสังหาริมทรัพย์จากผู้เชี่ยวชาญ *</p>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog my-xl-0 my-2">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TqfE_0_5Drc" title="ราคาประเมินที่ดินใหม่ขยับเฉลี่ย 8% ทั่วประเทศ | กรุงเทพธุรกิจ | 29 มิ.ย.65" allowfullscreen></iframe>
							</div>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">ราคาที่ดินเปล่าก่อนการพัฒนาในกรุงเทพฯ - ปริมณฑล ไตรมาส 3 ปี 2565 </a>
									<p class="mb-0 text-muted mt-4 limit-4-line">ดร.วิชัย วิรัตกพันธ์ ผู้ตรวจการธนาคารอาคารสงเคราะห์ เเละรักษาการผู้อำนวยการศูนย์ข้อมูลอสังหาริมทรัพย์ ให้สัมภาษณ์ในรายการ TNN ข่าวเที่ยง วันที่ 9 พฤศจิกายน 2565 หัวข้อเรื่อง "ราคาที่ดินเปล่าก่อนการพัฒนาในกรุงเทพฯ - ปริมณฑล ไตรมาส 3 ปี 2565</p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog my-xl-0 my-2">
							<a href="{{url('blog-details')}}" class="background-image-blog img2 mb-0"></a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">One big move! A simple short note that </a>
									<p class="mb-0 text-muted mt-4  limit-4-line">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog my-xl-0 my-2">
							<a href="{{url('blog-details')}}" class="background-image-blog img3 mb-0"></a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">One big move! A simple short note that One big move! A simple short note that One big move! A simple short note that One big move! A simple short note that One big move! A simple short note that will change your life</a>
									<p class="mb-0 text-muted mt-4  limit-4-line">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.</p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-12">
						<div class="card overflow-hidden box-shadow mb-0 main-blog">
							<a href="{{url('blog-details')}}" class="background-image-blog img4 mb-0"></a>
							<div class="card-body p-0 border border-top-0 br-br-5 br-bl-5">
								<div class="p-5 border-bottom">
									<a href="#" class="text-dark blog-title limit-3-line">What is economy? Basic knowledge about economy one should know!</a>
									<p class="mb-0 text-muted mt-4 limit-4-line">I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.</p>

									<div href="#" class="d-flex flex-row-reverse me-3 mt-3">
										<div class="mt-0 text-muted text-12">Dec-01-2021</div>
										<span class="fe fe-calendar text-muted me-2 mt-100 text-15"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- View more -->
				</div>
				<div class="container align-items-end">
					<div href="{{url('blog-detdivils')}}" class="btn btn-primary mt-2 float-end">View More ></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Video log Section closed-->

<!-- Pricing Premade -->
<div class="section pb-7" id="features">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-12 ps-3">
				<h3 class="header-family">หลากหลายบริการประเมินมูลค่าทรัพย์สินของเรา</h3>
				<p class="text-default sub-text">Select the best plan that suits your business and jump into the market. *</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="pricing-tabs">
					<div class="pri-tabs-heading text-center">
					</div>
					<div class="tab-content">
						<div class="tab-pane pb-0 active show">
							<div class="row d-flex align-items-center justify-content-center">
								<div class="col-lg-4 col-sm-8">
									<div class="card p-3 border-primary pricing-card" style="height: 436px">
										<img class="img-fluid mx-auto w-100" style="object-fit:cover; height:100%;" src="{{asset('assets/images/landing/carousel/carousel1.jpg')}} " alt="">
									</div>
								</div>
								<div class="col-lg-4 col-sm-8">
									<div class="card p-3 border-primary pricing-card" style="height: 436px">
										<div class="card-header d-block text-justified pt-2">
											<p class="text-18 font-weight-semibold mb-1">บริการตามประเภท *</p>
										</div>
										<div class="card-body pt-2">
											<ul class="text-justify pricing-body ps-0">
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินมูลค่าตามประเภททรัพย์สิน</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินมูลค่าทรัพย์สินตามวัตถุประสงค์</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินมูลค่าสิทธิการเช่าและค่าเช่าตลาด</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินต้นทุนค่าก่อสร้าง</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ประเมินความเป็นไปได้ของโครงการ</li>
												<li class="mb-4"><span class="text-info me-2 p-1 bg-info-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ตรวจสอบทรัพย์สินและเอกสารสิทธิ์ที่ดิน</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-sm-8">
									<div class="card p-3 border-primary pricing-card">
										<div class="card-header d-block text-justified pt-2">
											<span class="text-18 font-weight-semibold m-1">ประเมินมูลค่าทรัพย์สินตามประเภท</span>
										</div>
										<div class="card-body pt-2">
											<ul class="text-justify pricing-body ps-0">
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ที่ดิน</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ที่อยู่อาศัย</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													พาณิชยกรรม</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													อุตสาหกรรมและโกดัง</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													โรงแรม รีสอร์ทและเซอร์วิส</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													ศูนย์การค้า</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													อาคารสำนักงาน</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													สนามกอล์ฟ</li>
												<li class="mb-4"><span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
													โครงการที่อยู่อาศัยแนวราบ/แนวตั้ง</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Pricing close -->


<!-- Contact-->
<div class="bg-image-landing bg-white section" id="Contact">
	<div class="container">
		<div class="row text-center justify-content-center">
			<div class="col-lg-8">
				<h3 class="header-family">ติดต่อ</h3>
				<!-- <p class="text-default sub-text">You can get in touch any time.</p> -->
			</div>
		</div>
		<div class="row">
			<div class="card mt-3 mb-0">
				<div class="card-body text-dark px-0 pb-0">
					<div class="statistics-info">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15503.985026009066!2d100.57117478465152!3d13.718676291510056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29feb32a1fdd3%3A0x1a7751714df73c9a!2sFair%20Tower%20Condominium!5e0!3m2!1sen!2sth!4v1669722946375!5m2!1sen!2sth" width="550" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="">
									<div class="text-dark">
										<div class="services-statistics">
											<div class="row text-center">
												<div class="col-xl-12 col-md-3 col-lg-3">
													<div class="card p-0">
														<div class="card-body p-0">
															<div class="row">
																<div class="col-xl-3 col-md-3">
																	<div class="counter-icon border border-primary text-primary text-20">
																		<i class="fe fe-map-pin text-24-f"></i>
																	</div>
																</div>
																<div class="col-xl-6 col-md-9 px-0 mb-1">
																	<h5 class="mb-1 fw-semibold">ที่ตั้ง</h5>
																	<p class="fs-13 text-muted">แฟร์ ทาวเวอร์ สุขุมวิท 50 คลองเตย กรุงเทพฯ
																	</p>
																</div>
																<div class="col-xl-3">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12 col-md-12 col-lg-12">
													<div class="card p-0">
														<div class="card-body p-0">
															<div class="row">
																<div class="col-xl-3 col-md-3">
																	<div class="counter-icon border border-primary text-primary">
																		<i class="fe fe-headphones text-24-f"></i>
																	</div>
																</div>
																<div class="col-xl-6 col-md-9 px-0 mb-1">
																	<h5 class="mb-1 fw-semibold">ติดต่อ</h5>
																	<p class="mb-0 fs-13 text-muted">02-331-4580-2
																	</p>
																	<p class="fs-13 text-muted">info@landmarkcon.net</p>
																</div>
																<div class="col-xl-3"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12 col-md-12 col-lg-12">
													<div class="card p-0">
														<div class="card-body p-0">
															<div class="row">
																<div class="col-xl-3 col-md-3">
																	<div class="counter-icon border border-primary text-primary">
																		<i class="fe fe-airplay text-24-f"></i>
																	</div>
																</div>
																<div class="col-xl-6 col-md-9 px-0 mb-1">
																	<h5 class="mb-1 fw-semibold">เวลาทำการ</h5>
																	<p class="mb-0 fs-13 text-muted">จันทร์ - ศุกร์: 8:00 - 18:00 </p>
																</div>
																<div class="col-xl-3"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-7">
								<div class="">
									<form class="form-horizontal  m-t-20 row" action="{{url('index')}}">
										<h5 class="mb-1 fw-semibold"><u style="text-decoration-color:green">ส่งคำถามหรือข้อความได้ที่นี่</u></h5>
										<div class="col-xl-6">
											<div class="form-group">
												<input class="form-control" type="text" required="" placeholder="ชื่อ">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input class="form-control" type="text" required="" placeholder="นามสกุล">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input class="form-control" type="email" required="" placeholder="Email">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="form-group">
												<input class="form-control" type="number" required="" placeholder="เบอร์โทรศัพท์">
											</div>
										</div>
										<div class="col-xl-12">
											<div class="form-group">
												<textarea class="form-control" rows="5" placeholder="ข้อความ"></textarea>
											</div>
										</div>
										<div class="mb-3">
											<input class="form-control" type="file" id="formFile">
										</div>
										<div class="">
											<a href="javascript:void(0)" class="btn btn-pill btn-primary btn-w-sm py-2  waves-effect waves-light">ส่ง</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Contact close-->

<!--Support-->
<div class="demo-screen-skin bg-primary">
	<div class="container text-center text-white">
		<div id="demo" class="row">
			<div class="col-lg-4">
				<div class="feature-1">
					<a href="#"></a>
					<div class="mb-3">
						<i class="si si-compass"></i>
					</div>
					<h4 class="fs-25">Tracking</h4>
					<p class="mb-1 text-white">ติดตามสถานะงานประเมิน</p>
					<h6 class="mb-0">E-mail : <a class="text-dark" href="mailto:tracking@landmarkcon.net">Tracking@landmarkcon.net</a></h6>
				</div>
			</div>
			<div class="col-lg-4 mt-5 mt-xl-0 mt-lg-0">
				<div class="feature-1">
					<a href="#"></a>
					<div class="mb-3">
						<i class="si si-bubbles"></i>
					</div>
					<h4 class="fs-25">Questions</h4>
					<p class="mb-1 text-white">สอบถามข้อมูลเพิ่มเติม</p>
					<h6 class="mb-0">E-mail : <a class="text-dark" href="mailto:support@landmarkcon.net">Support@landmarkcon.net</a></h6>
				</div>
			</div>
			<div class="col-lg-4 mt-5 mt-xl-0 mt-lg-0">
				<div class="feature-1">
					<a href="#"></a>

					<img class="img-fluid mb-2" src="{{asset('assets/images/landing/line_demo.jpg')}}" style="width: 120px;" alt="">
					<h4 class="fs-25">Line Official</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Support close-->

@endsection

@section('scripts')

@endsection