@extends('layouts.app')csrf_token

        @section('styles')

        @endsection

                            @section('content')

							<!-- PAGE-HEADER -->
							<div class="page-header">
								<div>
									<h1 class="page-title">Edit Assign Job</h1>
								</div>
								<div class="ms-auto pageheader-btn">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
										<li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<!-- Row -->
							{{-- <div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Dropdowns Select</h3>
										</div>
										<div class="card-body">
											<div class="example">
												<div class="form-group">
													<label class="form-label" for="default-dropdown">Default Select</label>
													<select name="country" class="form-control form-select" id="default-dropdown" data-bs-placeholder="Select Country">
														<option label="Choose one"></option>
														<option value="br">Brazil</option>
														<option value="cz">Czech Republic</option>
														<option value="de">Germany</option>
														<option value="pl">Poland</option>
													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Basic Select2</label>
													<select class="form-control select2 form-select" data-placeholder="Choose one">
														<option label="Choose one"></option>
														<option value="1">Chuck Testa</option>
														<option value="2">Sage Cattabriga-Alosa</option>
														<option value="3">Nikola Tesla</option>
														<option value="4">Cattabriga-Alosa</option>
														<option value="5">Nikola Alosa</option>
													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Select2 With Search</label>
													<select class="form-control select2-show-search form-select" data-placeholder="Choose one">
														<option label="Choose one"></option>
														<option value="1">Chuck Testa</option>
														<option value="2">Sage Cattabriga-Alosa</option>
														<option value="3">Nikola Tesla</option>
														<option value="4">Cattabriga-Alosa</option>
														<option value="5">Nikola Alosa</option>
														<option value="6">Chuck Testa</option>
														<option value="7">Sage Cattabriga-Alosa</option>
														<option value="8">Nikola Tesla</option>
													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Multiple Select</label>
													<select multiple class="form-control select2-show-search form-select" data-placeholder="Choose one">
														<option label="Choose one"></option>
														<option value="1">Chuck Testa</option>
														<option value="2">Sage Cattabriga-Alosa</option>
														<option value="3">Nikola Tesla</option>
														<option value="4">Cattabriga-Alosa</option>
														<option value="5">Nikola Alosa</option>
														<option value="6">Chuck Testa</option>
														<option value="7">Sage Cattabriga-Alosa</option>
														<option value="8">Nikola Tesla</option>
													</select>
												</div>
												<div class="form-group">
													<label class="form-label">Select2 Disabled</label>
													<select class="form-control select2-show-search form-select" data-placeholder="Choose one" disabled>
														<option label="Choose one"></option>
														<option value="1">Chuck Testa</option>
														<option value="2">Sage Cattabriga-Alosa</option>
														<option value="3">Nikola Tesla</option>
														<option value="4">Cattabriga-Alosa</option>
														<option value="5">Nikola Alosa</option>
														<option value="6">Chuck Testa</option>
														<option value="7">Sage Cattabriga-Alosa</option>
														<option value="8">Nikola Tesla</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							<!-- Row Closed-->

							<!-- Row -->
							{{-- <div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Select2 Dropdown Styles</h3>
										</div>
										<div class="card-body">
											<div class="example">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="form-label">Select2 Style-01: </label>
															<ul>
																<li class="select-client">
																	<select class="form-control select2-style1" data-placeholder="Choose One">
																		<option label="Choose one"></option>
																		<option value="1">Angeline Julliet</option>
																		<option value="2">Helena Rose</option>
																		<option value="13">Daniel Obrien</option>
																		<option value="15">Jorah Randy</option>
																		<option value="3">Emma Watson</option>
																		<option value="5">Bonny Benett</option>
																		<option value="7">Jessie Spears</option>
																		<option value="9">Skyler Hilda</option>
																		<option value="11">Randy Orton</option>
																		<option value="14">Benjamin Button</option>
																	</select>
																</li>
															</ul>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<label class="form-label">Multiple Select: </label>
															<ul>
																<li class="select-client">
																	<select class="form-control select2-style1" data-placeholder="Choose One" multiple>
																		<option label="Choose one"></option>
																		<option value="1">Angeline Julliet</option>
																		<option value="2">Helena Rose</option>
																		<option value="13">Daniel Obrien</option>
																		<option value="15">Jorah Randy</option>
																		<option value="3">Emma Watson</option>
																		<option value="5">Bonny Benett</option>
																		<option value="7">Jessie Spears</option>
																		<option value="9">Skyler Hilda</option>
																		<option value="11">Randy Orton</option>
																		<option value="14">Benjamin Button</option>
																	</select>
																</li>
															</ul>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<label class="form-label">Select2 With Result: </label>
															<ul>
																<li class="select-client">
																	<select class="form-control select2-style1" data-placeholder="Choose One">
																		<option label="Choose one"></option>
																		<option value="1">Angeline Julliet</option>
																		<option value="2">Helena Rose</option>
																		<option value="13">Daniel Obrien</option>
																		<option value="15">Jorah Randy</option>
																		<option value="3" selected>Emma Watson</option>
																		<option value="5">Bonny Benett</option>
																		<option value="7">Jessie Spears</option>
																		<option value="9">Skyler Hilda</option>
																		<option value="11">Randy Orton</option>
																		<option value="14">Benjamin Button</option>
																	</select>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							<!-- Row Closed-->

							<!-- Row -->
							{{-- <div class="row">
								<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Date, Month, Year Range Picker</h3>
										</div>
										<div class="card-body">
											<div class="example">
												<div class="row row-sm">
													<div class="col-lg-4 mb-3">
														<label for="datepicker-date">Date Range Picker</label>
														<div class="input-group">
															<div class="input-group-text bg-primary-transparent text-primary">
																<i class="fe fe-calendar text-20"></i>
															</div>
															<input class="form-control" id="datepicker-date" placeholder="MM/DD/YYYY" type="text">
														</div><!-- input-group -->
													</div><!-- col-4 -->
													<div class="col-lg-4 mb-3">
														<label for="datepicker-month">Month Range Picker</label>
														<div class="input-group">
															<div class="input-group-text bg-primary-transparent text-primary">
																<i class="fe fe-calendar text-20"></i>
															</div>
															<input class="form-control" id="datepicker-month" placeholder="(000) 000-0000" type="text">
														</div><!-- input-group -->
													</div>
													<div class="col-lg-4 mb-3">
														<label for="datepicker-year">Year Range Picker</label>
														<div class="input-group">
															<div class="input-group-text bg-primary-transparent text-primary">
																<i class="fe fe-calendar text-20"></i>
															</div>
															<input class="form-control" id="datepicker-year" placeholder="(000) 000-0000 ext 0000" type="text">
														</div><!-- input-group -->
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							<!-- Row Closed -->

							<!-- Row -->
							{{-- <div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Jquery UI Date Pickers</h3>
										</div>
										<div class="card-body">
											<div class="row row-sm">
												<div class="col-md-12 col-lg-12 col-xl-8 mb-3">
													<div class="example">
														<div class="row">
															<div class="col-lg-6 mb-3">
																<label for="fc-datepicker">jQuery UI Date Picker</label>
																<div class="input-group">
																	<div class="input-group-text bg-primary-transparent text-primary">
																		<i class="fe fe-calendar text-20"></i>
																	</div>
																	<input class="form-control fc-datepicker" id="fc-datepicker" placeholder="MM/DD/YYYY" type="text">
																</div><!-- input-group -->
															</div><!-- col-6 -->
															<div class="col-lg-6 mb-3">
																<label for="datepickerNoOfMonths">jQuery UI Date Picker</label>
																<div class="input-group">
																	<div class="input-group-text bg-primary-transparent text-primary">
																		<i class="fe fe-calendar text-20"></i>
																	</div>
																	<input class="form-control" id="datepickerNoOfMonths" placeholder="MM/DD/YYYY" type="text">
																</div><!-- input-group -->
															</div><!-- col-6 -->
														</div>
													</div>
												</div>
												<div class="col-md-12 col-lg-12 col-xl-4 mb-3">
													<div class="example">
														<label for="bootstrapDatePicker1">Date Picker Style-01</label>
														<div class="input-group">
															<div id="datePickerStyle1" class="input-group date" data-date-format="mm-dd-yyyy">
																<span class="input-group-addon input-group-text bg-primary-transparent"><i class="fe fe-calendar text-primary-dark"></i></span>
																<input class="form-control" id="bootstrapDatePicker1" type="text"/>
															</div>
														</div>
													</div>
												</div><!-- col-4 -->
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							<!-- Row Closed -->

							<!-- Row -->
							{{-- <div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Date & Time Pickers</h3>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-12 col-xl-6 mb-3">
													<div class="example">
														<label for="datetimepicker1">Simple UI Date Time Picker</label>
														<div class="input-group col-md-6 ps-0">
															<div class="input-group-text bg-primary-transparent text-primary">
																<i class="fe fe-calendar text-20"></i>
															</div>
															<input class="form-control" id="datetimepicker1" type="text" value="2018-12-20 21:05">
														</div><!-- input-group -->
													</div>
												</div><!-- col-6 -->
												<div class="col-md-12 col-lg-12 col-xl-6 mb-3">
													<div class="example">
														<label for="datetimepicker2">Amaze UI Date Time Picker</label>
														<div class="input-group col-md-6 ps-0">
															<div class="input-group-text bg-primary-transparent text-primary">
																<i class="fe fe-calendar text-20"></i>
															</div>
															<input class="form-control" id="datetimepicker2" type="text" value="2018-12-20 21:05">
														</div><!-- input-group -->
													</div>
												</div><!-- col-6 -->
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							<!-- Row Closed -->

							<!-- Row -->
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">แก้ไขข้อมูลงาน</h3>
										</div>
										<div class="card-body">
											{{-- <p class="card-sub-title text-muted">แก้ไขงาน</p> --}}
											<div class="example">
												<form class="form-horizontal" action="{{url('job/' .$jobs->id)}}" method="post">
													{!! csrf_field() !!}
													@method("PATCH")
													<div class="row">
														<div class="col-md-12 col-xl-2">
															<div class="form-group">
																{{-- <label for="place-top-left" class="form-label">ประเภท</label>
																<input type="text" class="form-control" maxlength="25" id="place-top-left"> --}}
																<label class="form-label" for="codetype">เลือกประเภท</label>
																<select name="codetype" class="form-control form-select" id="codetype" data-bs-placeholder="Select Report Type">
																	<option label="BF">BF</option>
																	<option value="R">R</option>
																</select>
															</div>
														</div>
														<div class="col-md-12 col-xl-3">
															<div class="form-group">
																<label for="jobcode" class="form-label">รายงานเลขที่</label>
																<input type="text" class="form-control" maxlength="12" name="jobcode" id="jobcode" value="{{$jobs->jobcode}}">
															</div>
														</div>
														<div class="col-md-12 col-xl-3">
															<div class="form-group">
																<label for="reportcode" class="form-label">ID (KK/UOB)</label>
																<input type="text" class="form-control" name="reportcode" id="reportcode" value="{{$jobs->reportcode}}">
															</div>
														</div>
													</div>
													<div class="form-group">
														{{-- <label for="defaultconfig" class="form-label">Default Usuage</label>
														<input type="text" class="form-control" maxlength="25" id="defaultconfig"> --}}
														<label for="client" class="form-label">ส่งธนาคาร</label>
														<select name="client" class="form-control form-select" id="client" tabindex="-1" aria-hidden="true" onchange="selectElement('client', this.value)">
															<option value="UOB" {{$jobs->client=='UOB'?'selected':''}}>UOB</option>
															<option value="KK" {{$jobs->client=='KK'?'selected':''}}>KK</option>
															<option value="CIMB" {{$jobs->client=='CIMB'?'selected':''}}>CIMB</option>
															<option value="SCB" {{$jobs->client=='SCB'?'selected':''}}>SCB</option>
															<option value="BOC" {{$jobs->client=='UOB'?'selected':''}}>BOC</option>
															<option value="ICBC" {{$jobs->client=='ICBC'?'selected':''}}>ICBC</option>
															<option value="LHB" {{$jobs->client=='LHB'?'selected':''}}>LHB</option>
															<option value="TTB" {{$jobs->client=='TTB'?'selected':''}}>TTB</option>
															<option value="KTB" {{$jobs->client=='KTB'?'selected':''}}>KTB</option>
														</select>
													</div>
													<div class="form-group">
														<label for="prop_type" class="form-label">ประเภททรัพย์สิน</label>
														<select name="prop_type" class="form-control form-select" id="prop_type">				
															<option value="ห้องชุด" {{$jobs->prop_type=='ห้องชุด'?'selected':''}}>ห้องชุด</option>
															<option value="บ้านเดี่ยว" {{$jobs->prop_type=='บ้านเดี่ยว'?'selected':''}}>บ้านเดี่ยว</option>
															<option value="บ้านแฝด" {{$jobs->prop_type=='บ้านแฝด'?'selected':''}}>บ้านแฝด</option>
															<option value="ทาวน์เฮาส์/ทาวน์โฮม" {{$jobs->prop_type=='ทาวน์เฮาส์/ทาวน์โฮม'?'selected':''}}>ทาวน์เฮาส์/ทาวน์โฮม</option>
															<option value="ตึกแถว" {{$jobs->prop_type=='ตึกแถว'?'selected':''}}>ตึกแถว</option>
															<option value="ที่ดินว่างเปล่า" {{$jobs->prop_type=='ที่ดินว่างเปล่า'?'selected':''}}>ที่ดินว่างเปล่า</option>
															<option value="โรงงาน/โกดัง" {{$jobs->prop_type=='โรงงาน/โกดัง'?'selected':''}}>โรงงาน/โกดัง</option>
															<option value="อพาร์ทเม้นท์" {{$jobs->prop_type=='อพาร์ทเม้นท์'?'selected':''}}>อพาร์ทเม้นท์</option>
															<option value="โรงแรม" {{$jobs->prop_type=='โรงแรม'?'selected':''}}>โรงแรม</option>
															<option value="อาคารสำนักงาน" {{$jobs->prop_type=='อาคารสำนักงาน'?'selected':''}}>อาคารสำนักงาน</option>
															<option value="โฮมออฟฟิศ/มินิออฟฟิศ" {{$jobs->prop_type=='โฮมออฟฟิศ/มินิออฟฟิศ'?'selected':''}}>โฮมออฟฟิศ/มินิออฟฟิศ</option>
															<option value="ที่ดินพร้อมสิ่งปลูกสร้าง" {{$jobs->prop_type=='ที่ดินพร้อมสิ่งปลูกสร้าง'?'selected':''}}>ที่ดินพร้อมสิ่งปลูกสร้าง</option>
															<option value="สิทธิการเช่า" {{$jobs->prop_type=='สิทธิการเช่า'?'selected':''}}>สิทธิการเช่า</option>
															<option value="เครื่องจักร" {{$jobs->prop_type=='อื่น ๆ'?'selected':''}}>เครื่องจักร</option>
															<option value="อื่น ๆ" {{$jobs->prop_type=='อื่น ๆ'?'selected':''}}>อื่น ๆ</option>
														</select>
													</div>
													<div class="form-group">
														<label for="projectname" class="form-label">ชื่อโครงการ</label>
														<input type="text" class="form-control" maxlength="255" name="projectname" id="projectname" value="{{$jobs->projectname}}">
													</div>
													<div class="form-group">
														<label for="prop_size" class="form-label">เนื้อที่</label>
														<input type="text" class="form-control" maxlength="255" name="prop_size" id="prop_size" value="{{ $jobs->prop_size }}">
													</div>
													<div class="form-group">
														<label for="proplocation" class="form-label">ทำเลที่ตั้ง</label>
														<input type="text" class="form-control" maxlength="255" name="proplocation" id="proplocation" value="{{ $jobs->proplocation }}">
													</div>

													<div class="form-group">
														<label for="province_code" class="form-label">จังหวัด ( ตามเขตปกครอง )</label>
														<select name="province_code" id="province_code" class="form-control province{{ $errors->has('province_code') ? ' is-invalid' : '' }}" value="{{ $jobs->province_code }}">
															@foreach($list as $row)
																<option value="{{ $row->code }}" {{ ($jobs->province_code == $row->code) ? 'selected' : '' }}>
																	{{ $row->name_th }}
																</option>
															@endforeach
														</select>
														@if ($errors->has('province_code'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('province_code') }}</strong>
														</span>
														@endif
													</div>
													<div class="form-group">
														<label for="txt4" class="form-label">อำเภอ/เขต</label>
														{{-- <input type="text" class="form-control" maxlength="255" id="txt4" placeholder="งาน HL ระบุ อำเภอ / เขต ตามเอกสารสิทธิ์ที่ดินหรืออช.2"> --}}
														<select id="amphure_code" name="amphure_code" class="form-control amphures_code{{ $errors->has('amphure_code') ? ' is-invalid' : '' }}" value="{{ $jobs->amphure_code }}">
															@foreach($listtwo as $city)
															<option value="{{ $city->code }}" {{ ($jobs->amphure_code == $city->code) ? 'selected' : '' }}>
																{{ $city->name_th }}
															</option>
															@endforeach
														</select>
													</div>
													
													<div class="form-group">
														<label for="district" class="form-label">ตำบล/แขวง</label>
														<input type="text" class="form-control" maxlength="255" id="district" name="district" value="{{ $jobs->district }}">

													</div>
													<div class="form-group">
														<label for="customer" class="form-label">ลูกค้าราย/ผู้ติดต่อ</label>
														<input type="text" class="form-control" maxlength="255" id="customer" name="customer" value="{{ $jobs->customer }}">
													</div>
													<div class="form-group">
														<label for="jobtype" class="form-label">รายงานภาษา</label>
														<select name="jobtype" id="jobtype" class="form-control">
															<option value="ไทย 1 ชุด" {{$jobs->jobtype=='ไทย 1 ชุด'?'selected':''}}>ไทย 1 ชุด</option>
															<option value="ไทย 2 ชุด" {{$jobs->jobtype=='ไทย 2 ชุด'?'selected':''}}>ไทย 2 ชุด</option>
															<option value="อังกฤษ 2 ชุด" {{$jobs->jobtype=='อังกฤษ 2 ชุด'?'selected':''}}>อังกฤษ 2 ชุด</option>
															<option value="ไทย 2 ชุด + อังกฤษ 2 ชุด" {{$jobs->jobtype=='ไทย 2 ชุด + อังกฤษ 2 ชุด'?'selected':''}}>ไทย 2 ชุด + อังกฤษ 2 ชุด</option>
															<option value="-" {{$jobs->jobtype=='-'?'selected':''}}>-</option>
														</select>
													</div>
													<div class="form-group">
														<label for="jobsize" class="form-label">Job Size</label>
														<select name="jobsize" class="form-control">
															<option value="HL" {{$jobs->jobsize=='HL'?'selected':''}}>HL</option>
															<option value="S" {{$jobs->jobsize=='S'?'selected':''}}>S</option>
															<option value="L" {{$jobs->jobsize=='L'?'selected':''}}>L</option>
															<option value="-" {{$jobs->jobsize=='-'?'selected':''}}>-</option>
														</select>
													</div>
													<div class="form-group">
														<label for="easydiff" class="form-label">Job Difficulty</label>
														<select name="easydiff" class="form-control">
															<option value="NORM" {{$jobs->easydiff=='NORM'?'selected':''}}>Normal</option>
															<option value="DIFF" {{$jobs->easydiff=='DIFF'?'selected':''}}>Difficult</option>
														</select>
													</div>
													<div class="form-group">
														<label for="obj_id" class="form-label">วัตถุประสงค์การประเมิน</label>
														<select name="obj_id" class="form-control">
															<option value="1" {{$jobs->obj_id=='1'?'selected':''}}>เพื่อประกอบการพิจารณาสินเชื่อ</option>
															<option value="2" {{$jobs->obj_id=='2'?'selected':''}}>เพื่อทบทวนราคาประเมิน</option>
															<option value="3" {{$jobs->obj_id=='3'?'selected':''}}>ทราบมูลค่าตลาด</option>
															<option value="4" {{$jobs->obj_id=='4'?'selected':''}}>สาธารณะ</option>
															<option value="5" {{$jobs->obj_id=='5'?'selected':''}}>บันทึกมูลค่าทางบัญชี</option>
															<option value="6" {{$jobs->obj_id=='6'?'selected':''}}>พิจารณาภายในบริษัท, ใช้เป็นข้อมูลภายในบริษัท</option>
															<option value="7" {{$jobs->obj_id=='7'?'selected':''}}>เพื่ออ้างอิงในการเจรจาต่อรองราคา</option>
															<option value="8" {{$jobs->obj_id=='8'?'selected':''}}>เพื่อกำหนดราคาซื้อขายทอดตลาด</option>
															<option value="9" {{$jobs->obj_id=='9'?'selected':''}}>เพื่อประกอบการตั้งราคาขายทรัพย์สิน</option>
															<option value="10" {{$jobs->obj_id=='10'?'selected':''}}>ปรับปรุงโครงสร้างหนี้</option>
															<option value="11" {{$jobs->obj_id=='11'?'selected':''}}>อื่น ๆ</option>
														</select>
													</div>
													<div class="form-group">
														<label for="valuationfee" class="form-label">ค่าประเมิน(ไม่รวมVAT)</label>
														<input type="text" class="form-control" name="valuationfee" id="valuationfee" value="{{ $jobs->valuationfee }}">
													</div>
													
													{{-- <div class="form-group">
														<label for="valuationfeeVat" class="form-label">ค่าประเมิน (+VAT)</label>
														<input type="text" class="form-control" name="valuationfeeVat" id="valuationfeeVat" value="{{ number_format($jobs->valuationfee*7/100,2) }}">
													</div> --}}

													<div class="form-group">
														<label for="valuationfee_case" class="form-label">เงื่อนไขการเก็บเงินลูกค้า</label>
														<select name="valuationfee_case" class="form-control">
															<option value="100% วางบิลธนาคาร" {{$jobs->valuationfee_case=='100% วางบิลธนาคาร'?'selected':''}}>100% วางบิลธนาคาร</option>
															<option value="100% เก็บเงินลูกค้าหน้างาน" {{$jobs->valuationfee_case=='100% เก็บเงินลูกค้าหน้างาน'?'selected':''}}>100% เก็บเงินลูกค้าหน้างาน</option>
															<option value="50/50 หน้างาน" {{$jobs->valuationfee_case=='50/50 หน้างาน'?'selected':''}}>50/50 หน้างาน</option>
															<option value="100% ณ วันที่มอบรายงาน" {{$jobs->valuationfee_case=='100% ณ วันที่มอบรายงาน'?'selected':''}}>100% ณ วันที่มอบรายงาน</option>
														</select>
													</div>
													<div class="form-group">
														<label for="valuer" class="form-label">ผู้ประเมิน</label>
														<select name="valuer" class="form-control valuer{{ $errors->has('valuer') ? ' is-invalid' : '' }}">
															@foreach($listfour as $employee)
																@if($employee->id == $jobs->valuer)
																	<option value="{{ $employee->id }}" selected="">
																		{{ $employee->name }}
																	</option>
																@else
																	<option value="{{ $employee->id }}">
																		{{ $employee->name }}
																	</option>
																@endif
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="headvaluer" class="form-label">ผู้ตรวจ</label>
														<select name="headvaluer" class="form-control headvaluer{{ $errors->has('headvaluer') ? ' is-invalid' : '' }}">
															@foreach($listfour as $employee)
																@if($employee->id == $jobs->headvaluer)   
																	<option value="{{ $employee->id }}" selected="">
																		{{ $employee->name }}
																	</option>
																@else
																	<option value="{{ $employee->id }}">
																		{{ $employee->name }}
																	</option>        
																@endif
															@endforeach
														</select>
													</div>

													
													
													<div class="form-group mt-3">
														<div>
															<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
															{{-- <button type="submit" class="btn btn-secondary">Cancel</button> --}}
														</div>
													</div>

													{{-- <div class="row">
														<div class="col-md-12 col-xl-3">
															<div class="form-group">
																<label for="place-top-left" class="form-label">Top Left</label>
																<input type="text" class="form-control" maxlength="25" id="place-top-left">
															</div>
														</div>
														<div class="col-md-12 col-xl-3">
															<div class="form-group">
																<label for="place-top-right" class="form-label">Top Right</label>
																<input type="text" class="form-control" maxlength="25" id="place-top-right">
															</div>
														</div>
														<div class="col-md-12 col-xl-3">
															<div class="form-group">
																<label for="place-bottom-left" class="form-label">Bottom Left</label>
																<input type="text" class="form-control" maxlength="25" id="place-bottom-left">
															</div>
														</div>
														<div class="col-md-12 col-xl-3">
															<div class="form-group">
																<label for="place-bottom-right" class="form-label">Bottom Right</label>
																<input type="text" class="form-control" maxlength="25" id="place-bottom-right">
															</div>
														</div>
													</div> --}}
													{{-- <div class="form-group">
														<label for="textarea" class="form-label">Textarea</label>
														<textarea class="form-control" maxlength="225" id="textarea" rows="3"></textarea>
													</div> --}}
													
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Row Closed -->

							

                            @endsection

        @section('scripts')

		<!-- Bootstrap-Date Range Picker js-->
		<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>

		<!-- jQuery UI Date Picker js -->
		<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>

		<!-- bootstrap-datepicker js (Date picker Style-01) -->
		<script src="{{asset('assets/plugins/bootstrap-datepicker/js/datepicker.js')}}"></script>

		<!-- Amaze UI Date Picker js-->
		<script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>

		<!-- Simple Date Time Picker js-->
		<script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

		<!-- SELECT2 JS -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

		<!-- BOOTSTRAP MAX-LENGTH JS -->
		<script src="{{asset('assets/plugins/bootstrap-maxlength/dist/bootstrap-maxlength.min.js')}}"></script>

		<!--Internal Fileuploads js-->
		<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

		<!--Internal Fancy uploader js-->
		<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

		<!-- FORM ELEMENTS JS -->
		<script src="{{asset('assets/js/formelementadvnced.js')}}"></script>
		
		
		

        @endsection
