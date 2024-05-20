@extends('layouts.app')
		

    	@section('styles')

    	@endsection
		@section('content')
			
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<div>
					<h1 class="page-title">Assign Job</h1>
				</div>
				<div class="ms-auto pageheader-btn">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
					</ol>
				</div>
			</div>
			<!-- END PAGE-HEADER -->
			
			
			<!-- Row -->
			<div class="row">			
				<div class="col-md-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Create New Job</h3>
						</div>
						<div class="card-body">
							<p class="card-sub-title text-muted">ลงทะเบียนการรับงาน</p>
							<div class="example">
								<form class="form-horizontal" action="{{url('job')}}" method="post">
									{!! csrf_field() !!}
									<div class="row">
										<div class="col-md-12 col-xl-2">
											<div class="form-group">
												{{-- <label for="place-top-left" class="form-label">ประเภท</label>
												<input type="text" class="form-control" maxlength="25" id="place-top-left"> --}}
												<label class="form-label" for="codetype">เลือกประเภท</label>
												<select name="codetype" class="form-control form-select" id="codetype" onchange="selectElement('codetype', this.value)">
													<option value="" selected>เลือกประเภทรหัสรายงาน</option>
													<option value="BF">BF</option>
													<option value="R">R</option>
												</select>
											</div>
										</div>
										<div class="col-md-12 col-xl-3">
											<div class="form-group">
												<label for="jobcode" class="form-label">รายงานเลขที่</label>
												<input type="text" class="form-control" name="jobcode" id="jobcode">
											</div>
										</div>
										<div class="col-md-12 col-xl-3">
											<div class="form-group">
												<label for="reportcode" class="form-label">ID (KK/UOB)</label>
												<input type="text" class="form-control" name="reportcode" id="reportcode">
											</div>
										</div>
									</div>
										
									<div class="form-group">
										{{-- <label for="defaultconfig" class="form-label">Default Usuage</label>
										<input type="text" class="form-control" maxlength="25" id="defaultconfig"> --}}
										<label for="client" class="form-label">ส่งธนาคาร</label>
										<select name="client" class="form-control form-select" id="client" data-bs-placeholder="Select Bank">
											<option value="UOB" selected>UOB</option>
											<option value="KK">KK</option>
											<option value="CIMB">CIMB</option>
											<option value="SCB">SCB</option>
											<option value="BOC">BOC</option>
											<option value="ICBC">ICBC</option>
											<option value="LHB">LHB</option>
											<option value="TTB">TTB</option>
											<option value="KTB">KTB</option>
											<option value="MBKG">MBKG</option>
										</select>
									</div>
									<div class="form-group">
										<label for="prop_type" class="form-label">ประเภททรัพย์สิน</label>
										<select name="prop_type" class="form-control form-select" id="prop_type" data-bs-placeholder="Select Prop Type">
											<option value="ห้องชุด" selected>ห้องชุด</option>
											<option value="บ้านเดี่ยว">บ้านเดี่ยว</option>
											<option value="บ้านแฝด">บ้านแฝด</option>
											<option value="ทาวน์เฮาส์/ทาวน์โฮม">ทาวน์เฮาส์/ทาวน์โฮม</option>
											<option value="ตึกแถว">ตึกแถว</option>
											<option value="ที่ดินว่างเปล่า">ที่ดินว่างเปล่า</option>
											<option value="โรงงาน/โกดัง">โรงงาน/โกดัง</option>
											<option value="อพาร์ทเม้นท์">อพาร์ทเม้นท์</option>
											<option value="โรงแรม">โรงแรม</option>
											<option value="อาคารสำนักงาน">อาคารสำนักงาน</option>
											<option value="โฮมออฟฟิศ/มินิออฟฟิศ">โฮมออฟฟิศ/มินิออฟฟิศ</option>	
											<option value="ที่ดินพร้อมสิ่งปลูกสร้าง">ที่ดินพร้อมสิ่งปลูกสร้าง</option>
											<option value="สิทธิการเช่า">สิทธิการเช่า</option>
											<option value="เครื่องจักร">เครื่องจักร</option>
											<option value="อื่นๆ">อื่นๆ</option>
										</select>
									</div>
									
									<div class="form-group">
										{{-- @if($company)
											pm:{{$company->projectname}}
										@else
											@livewire('postx',['table'=>'jobs','event'=>'companySelected']) 
										@endif --}}
										 
										
										
										@livewire('get-project',['table'=>'jobs','event'=>'companySelected']) 
										{{-- <input type="text" class="form-control" name="pn" id="pn" wire:model="company">
										pn:{{$company}} --}}
										

										 <label for="txt1" class="form-label">ชื่อโครงการ</label>
										<input type="text" class="form-control" name="projectname" id="projectname">
									</div>
									
									<div class="form-group">
										<label for="proplocation" class="form-label">ทำเลที่ตั้ง</label>
										<input type="text" class="form-control" name="proplocation" id="proplocation" placeholder="(เลขที่ / หมู่ / ซอย / ถนน)">
									</div>
									<div class="form-group">
										<label for="province_code" class="form-label">จังหวัด</label>
										<select name="province_code" id="province_code" class="form-control province{{ $errors->has('province_code') ? ' is-invalid' : '' }}">
											@foreach($list as $row)
											<option value="{{ $row->code }}">
												{{ $row->name_th }}
											</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="amphure_code" class="form-label">อำเภอ/เขต</label>
										<input type="text" name="amphure_code" id="amphure_code" placeholder="งาน HL ระบุ อำเภอ / เขต ตามเอกสารสิทธิ์ที่ดินหรืออช.2"
										class="form-control{{ $errors->has('amphure_code') ? ' is-invalid' : '' }}"
										value="{{ old('amphure_code') }}">
									</div>
									<div class="form-group">
										<label for="district" class="form-label">ตำบล/แขวง</label>
										<input type="text" name="district" id="district" placeholder="งาน HL ระบุ ตำบล / แขวง ตามเอกสารสิทธิ์ที่ดินหรืออช.2"
										class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}"
										value="{{ old('district') }}">
									</div>
									<div class="form-group">
										<label for="prop_size" class="form-label">เนื้อที่</label>
										<input type="text" class="form-control" maxlength="255" name="prop_size" id="prop_size" placeholder="ตัวอย่าง : 99.99 ตร.ม. / 99-0-99.9 ไร่">
									</div>
									<div class="form-group">
										<label for="customer" class="form-label">ลูกค้าราย/ผู้ติดต่อ</label>
										<input type="text" class="form-control" maxlength="255" name="customer" id="customer">
									</div>
									<div class="form-group">
										<label for="jobtype" class="form-label">รายงานภาษา</label>
										<select name="jobtype" id="jobtype" class="form-control">
										<option value="ไทย 1 ชุด" selected>ไทย 1 ชุด</option>
										<option value="ไทย 2 ชุด">ไทย 2 ชุด</option>
										<option value="ไทย 2 ชุด + CD">ไทย 2 ชุด + PDF</option>
										<option value="อังกฤษ 2 ชุด">อังกฤษ 2 ชุด</option>
										<option value="ไทย 2 ชุด + อังกฤษ 2 ชุด">ไทย 2 ชุด + อังกฤษ 2 ชุด</option>
										<option value="-">-</option>
										</select>
									</div>
									<div class="form-group">
										<label for="jobsize" class="form-label">Job Size</label>
										<select name="jobsize" class="form-control form-select" id="jobsize" data-bs-placeholder="เลือกจังหวัด">
											<option value="HL" selected>HL</option>
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
										</select>
									</div>
									<div class="form-group">
										<label for="easydiff" class="form-label">Job Difficulty</label>
										<select name="easydiff" class="form-control form-select" id="easydiff" data-bs-placeholder="เลือกจังหวัด">
											<option value="NORM" selected>NORM / +++</option>
											<option value="DIFF">DIFF</option>
										</select>
									</div>
									<div class="form-group">
										<label for="obj_id" class="form-label">วัตถุประสงค์การประเมิน</label>
										<select name="obj_id" class="form-control form-select" id="obj_id" data-bs-placeholder="เลือกจังหวัด">
											<option value="1" selected>เพื่อประกอบการพิจารณาสินเชื่อ</option>
											<option value="2">เพื่อทบทวนราคาประเมิน</option>
											<option value="3">ทราบมูลค่าตลาด</option>
											<option value="4">สาธารณะ</option>
											<option value="5">บันทึกมูลค่าทางบัญชี</option>
											<option value="6">พิจารณาภายในบริษัท, ใช้เป็นข้อมูลภายในบริษัท</option>
											<option value="7">เพื่ออ้างอิงในการเจรจาต่อรองราคา</option>
											<option value="8">เพื่อกำหนดราคาซื้อขายทอดตลาด</option>
											<option value="9">เพื่อประกอบการตั้งราคาขายทรัพย์สิน</option>
											<option value="10">ปรับปรุงโครงสร้างหนี้</option>
											<option value="11">อื่น ๆ</option>
										</select>
									</div>
									<div class="form-group">
										<label for="valuationfee" class="form-label">ค่าประเมิน(ไม่รวมVAT)</label>
										<input type="text" class="form-control" name="valuationfee" id="valuationfee" placeholder="3000" value="3000">
									</div>
									<div class="form-group">
										<label for="vat" class="form-label">VAT (7%)</label>
										<input type="text" class="form-control" name="vat" id="vat" placeholder="210.00" value="210">
									</div>
									<div class="form-group">
										<label for="valuationfeeVat" class="form-label">ค่าประเมิน(+VAT)</label>
										<input type="text" class="form-control" name="valuationfeeVat" id="valuationfeeVat" placeholder="3210" value="3210">
									</div>
									<div class="form-group">
										<label for="valuationfee_case" class="form-label">เงื่อนไขการเก็บเงินลูกค้า</label>
										<select name="valuationfee_case" class="form-control form-select" id="valuationfee_case" data-bs-placeholder="เลือกจังหวัด">
											<option value="100% วางบิลธนาคาร" selected="">100% วางบิลธนาคาร</option>
											<option value="100% เก็บเงินลูกค้าหน้างาน">100% เก็บเงินลูกค้าหน้างาน</option>
											<option value="50/50 หน้างาน">50/50 หน้างาน</option>
											<option value="100% ณ วันที่มอบรายงาน">100% ณ วันที่มอบรายงาน</option>
										</select>
									</div>
									<div class="form-group">
										<label for="valuer" class="form-label">ผู้ประเมิน</label>
										<select name="valuer" class="form-control valuer{{ $errors->has('valuer') ? ' is-invalid' : '' }}">
											@foreach($listthree as $employee)
												@if($employee->id =='1' or $employee->id =='2' or 
												$employee->id =='3' or $employee->id =='4'
												) 
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
											@foreach($listthree as $employee)
												@if($employee->id =='1' or $employee->id =='2' or $employee->id =='3' or $employee->id =='4') 
													@if($employee->id =='3')   
														<option value="{{ $employee->id }}" selected="">
															{{ $employee->name }}
														</option>
													@else
														<option value="{{ $employee->id }}">
															{{ $employee->name }}
														</option>        
													@endif
												@endif
											@endforeach
										</select>
									</div>

									<div class="row">
										<div class="col-md-12 col-xl-2">
											<div class="form-group">
											<label for="startdate" class="form-label">วันที่เริ่มงาน</label>
											<input class="form-control" name="startdate" id="startdate" placeholder="dd-mm-yyyy" type="text" value="{{ old('date', \Carbon\Carbon::now()->format('d-m-Y')) }}">
											</div>
										</div>
										<div class="col-md-12 col-xl-2">
											<div class="form-group">
											<label for="inspectiondate" class="form-label">วันที่สำรวจ</label>
											<input class="form-control" name="inspectiondate" id="inspectiondate" placeholder="dd-mm-yyyy" type="text" value="{{ old('date', \Carbon\Carbon::now()->addDay(1)->format('d-m-Y')) }}">
											</div>
										</div>
										<div class="col-md-12 col-xl-2">
											<div class="form-group">
											<label for="lcduedate" class="form-label">กำหนดส่ง LC ตรวจ</label>
											<input class="form-control" name="lcduedate" id="lcduedate" placeholder="dd-mm-yyyy" type="text" value="{{ old('date', \Carbon\Carbon::now()->addDay(2)->format('d-m-Y')) }}">
											</div>
										</div>
										<div class="col-md-12 col-xl-2">
											<div class="form-group">
											<label for="clientduedate" class="form-label">กำหนดส่งงานลูกค้า</label>
											<input class="form-control" name="clientduedate" id="clientduedate" placeholder="dd-mm-yyyy" type="text" value="{{ old('date', \Carbon\Carbon::now()->addDay(3)->format('d-m-Y')) }}">
											</div>
										</div>
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

		{{-- Custom Function --}}
		 
		{{-- <script type="text/javascript">
			function selectElement(id, valueToSelect) {  
				let element = document.getElementById(id);
				element.value = valueToSelect;  
				if (valueToSelect=='BF') {  
					document.getElementById("jobcode").value = '{{ \app\Http\Controllers\JobController::gennewbfid() }}';
				} else if (valueToSelect=='R') {
					document.getElementById("jobcode").value = '{{ \app\Http\Controllers\JobController::gennewrid() }}';
				}
			}
		</script> --}}
		
        @endsection
	