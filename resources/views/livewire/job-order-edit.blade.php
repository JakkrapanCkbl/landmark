   <div> 
        
        {{-- <button type="button" class="btn btn-primary" wire:click="addTwoNumbers(5,5)">sum</button>
        Sum : {{$sum}}
        ----------<br>
        Input new value = <input type="text" class="form-control" wire:model="newValue">
        New value = {{$newValue}}
        ----------<br>
        Input reportcode = <input type="text" class="form-control" wire:model="reportcode">
        @error('reportcode') <span class="error" style="color: red;">{{ $message }}</span> @enderror
        <input type="text" class="form-control" wire:model="reportcode">
        New reportcode = {{$reportcode}}
        ----------<br>
        Input projectname = <input type="text" class="form-control" wire:model="projectname">
        New projectname = {{$projectname}}
        <button class="btn btn-primary" onclick="confirmEdit('1')">บันทึกข้อมูลแบบต่อเนื่อง</button> --}}
       

    <!-- PAGE-HEADER -->
    {{-- <div class="page-header">
        <div>
            <h1 class="page-title">Edit Assign Job {{ $edit_id }}</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
            </ol>
        </div>
    </div> --}}
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">แก้ไข / ตรวจสอบความถูกต้อง</h3>
                    {{-- @if(session()->has('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @else
                        <h3 class="card-title">แก้ไข / ตรวจสอบความถูกต้อง</h3>
                    @endif --}}
                </div>
                <div class="card-body">
                     <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap table-bordered">
                            <tbody>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">รหัสรายงาน</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="jobcode" class="form-label">รายงานเลขที่</label>
                                                    <input type="text" class="form-control" name="jobcode" id="jobcode" wire:model="jobcode">
                                                    @error('jobcode') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="reportcode" class="form-label">Bank's ID</label>
                                                    <input type="text" class="form-control" name="reportcode" id="reportcode" wire:model="reportcode">
                                                    @error('reportcode') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="client" class="form-label">ส่งธนาคาร</label>
                                                    <select name="client" class="form-control form-select" id="client" wire:model="client" data-bs-placeholder="Select Bank">
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
                                                        <option value="อื่นๆ">อื่นๆ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @if($client == 'อื่นๆ')
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="client_note" class="form-label">ถ้าเลือก อื่นๆ ให้ระบุ</label>
                                                        <input type="text" class="form-control" name="client_note" id="client_note" wire:model="client_note">
                                                        @error('client_note') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ประเภททรัพย์สิน / กลุ่มย่อย</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="prop_type" class="form-label">ประเภททรัพย์สิน</label>
                                                    {{-- <select name="prop_type" class="form-control form-select" id="prop_type" wire:model="prop_type">				
                                                        <option value="ห้องชุด">ห้องชุด</option>
                                                        <option value="บ้านเดี่ยว">บ้านเดี่ยว</option>
                                                        <option value="บ้านแฝด">บ้านแฝด</option>
                                                        <option value="ทาวน์เฮาส์/ทาวน์โฮม">ทาวน์เฮาส์/ทาวน์โฮม</option>
                                                        <option value="ทาวน์เฮาส์">ทาวน์เฮาส์</option>
                                                        <option value="ทาวน์โฮม">ทาวน์โฮม</option>
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
                                                        <option value="อื่น ๆ">อื่น ๆ</option>
                                                    </select> --}}
                                                    <select class="form-control form-select" id="proptype" name="proptype"  wire:model="selectedProptype" >
                                                        <option value=""></option>
                                                        @foreach($proptypes as $item)
                                                            <option value="{{ $item->show_prop_type }}" @if ($proptype == $item->show_prop_type) selected @endif>{{ $item->show_prop_type }}</option>
                                                        @endforeach
                                                    </select>

                                                    {{-- <p>You have selected: {{ $selectedProptype }}</p> --}}
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="prop_type2" class="form-label">กลุ่มย่อย</label>
                                                    {{-- <select name="prop_type2" id="prop_type2" class="form-control form-select" wire:model="prop_type2">
                                                        @if ($prop_type === 'ที่ดินว่างเปล่า')
                                                            <option value=""></option>
                                                            <option value="Master Form (1 แปลง)">Master Form (1 แปลง)</option>
                                                            <option value="ที่ดิน 2 แปลง">ที่ดิน 2 แปลง</option>
                                                            <option value="ที่ดิน 3 แปลง">ที่ดิน 3 แปลง</option>
                                                            <option value="ตั้งอยู่เขตป่า">ตั้งอยู่เขตป่า</option>
                                                            <option value="มีผู้บุกรุก ครอบครองปรปักษ์">มีผู้บุกรุก ครอบครองปรปักษ์</option>
                                                            <option value="ถูกเวนคืน">ถูกเวนคืน</option>
                                                            <option value="เนื้อที่ดินบางส่วนเป็นถนนภาระจำยอม">เนื้อที่ดินบางส่วนเป็นถนนภาระจำยอม</option>
                                                            <option value="อื่นๆ">อื่นๆ</option>
                                                        @elseif ($prop_type === 'ทาวน์เฮาส์')
                                                            <option value=""></option>
                                                            <option value="Master Form (1 หลัง)">Master Form (1 หลัง)</option>
                                                            <option value="ทาวน์เฮาส์ 2 หลัง">ทาวน์เฮาส์ 2 หลัง</option>
                                                            <option value="ทาวน์เฮาส์ 3 หลัง">ทาวน์เฮาส์ 3 หลัง</option>
                                                            <option value="อาคารคร่อมที่ดินแปลงข้างเคียง">อาคารคร่อมที่ดินแปลงข้างเคียง</option>
                                                            <option value="มีผู้บุกรุก ครอบครองปรปักษ์">มีผู้บุกรุก ครอบครองปรปักษ์</option>
                                                            <option value="ถูกเวนคืน">ถูกเวนคืน</option>
                                                            <option value="ระยะถ่อยร่นจากคลอง/ถนน ไม่ถูกต้อง">ระยะถ่อยร่นจากคลอง/ถนน ไม่ถูกต้อง</option>
                                                            <option value="ตั้งอยู่เขตป่า">อื่นๆ</option>
                                                        @else
                                                            <option value=""></option>
                                                        @endif
                                                    </select> --}}
                                                     <select class="form-control form-select" id="proptype2" name="proptype2" wire:model="selectedProptype2">
                                                        @foreach ($proptype2s as $item)
                                                            <option value="{{ $item->show_prop_type2 }}" @if ($proptype2 == $item->show_prop_type2) selected @endif>{{ $item->show_prop_type2 }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="prop_type2_note" class="form-label">อื่นๆ ระบุ</label>
                                                    <input type="text" class="form-control" name="prop_type2_note" id="prop_type2_note" wire:model="prop_type2_note">
                                                    @error('prop_type2_note') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="prop_size" class="form-label">เนื้อที่</label>
                                                    <input type="text" class="form-control" name="prop_size" id="prop_size" wire:model="prop_size">
                                                    @error('prop_size') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ชื่อโครงการ</p></td>
                                    <td class="wp-70">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="projectname" id="projectname" wire:model="projectname">
                                                @error('projectname') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ทำเลที่ตั้ง</p></td>
                                    <td class="wp-70">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="proplocation" id="proplocation" wire:model="proplocation">
                                                @error('proplocation') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">จังหวัด/อำเภอ/ตำบล</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="province_code" class="form-label">จังหวัด</label>
                                                    <select class="form-control form-select" id="province_code" name="province_code" wire:model="selectedProvince">
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->code }}" @if ($province_code == $province->code) selected @endif>{{ $province->name_th }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="amphure_code" class="form-label">อำเภอ / เขต</label>
                                                    <select class="form-control form-select" id="amphure_code" name="amphure_code" wire:model="amphure_code">
                                                        @foreach ($amphures as $amphure)
                                                            <option value="{{ $amphure->code }}" @if ($amphure_code == $amphure->code) selected @endif>{{ $amphure->name_th }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="district" class="form-label">ตำบล / แขวง</label>
                                                    <input type="text" class="form-control" name="district" id="district" wire:model="district">
                                                    @error('district') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="customer" class="form-label">ลูกค้าราย/ผู้ติดต่อ</label>
                                                    <input type="text" class="form-control" name="customer" id="customer" wire:model="customer">
                                                    @error('customer') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">คุณสมบัติรายงาน</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
														<label for="jobtype" class="form-label">รายงานภาษา</label>
														<select name="jobtype" id="jobtype" class="form-control form-select" wire:model="jobtype">
															<option value="ไทย 1 ชุด">ไทย 1 เล่ม</option>
															<option value="ไทย 2 ชุด">ไทย 2 เล่ม</option>
															<option value="อังกฤษ 2 ชุด">อังกฤษ 2 เล่ม</option>
															<option value="ไทย 2 ชุด + อังกฤษ 2 ชุด">ไทย 2 เล่ม + อังกฤษ 2 เล่ม</option>
															<option value="-">-</option>
														</select>
													</div>
                                            </div>
                                            <div class="col-1">
                                               <div class="form-group">
                                                    <label for="jobsize" class="form-label">ขนาดรายงาน</label>
                                                    <select name="jobsize" class="form-control form-select" wire:model="jobsize">
                                                        <option value="HL">HL</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                               <label for="easydiff" class="form-label">Job Difficulty</label>
                                                <select name="easydiff" class="form-control form-select" wire:model="easydiff">
                                                    <option value="Easy">Easy</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Difficult">Difficult</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                               <div class="form-group">
														<label for="obj_id" class="form-label">วัตถุประสงค์การประเมิน</label>
														<select name="obj_id" class="form-control form-select" wire:model="obj_id">
															<option value="1">เพื่อประกอบการพิจารณาสินเชื่อ</option>
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
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ค่าประเมินราคา</p></td>
                                    <td class="wp-70">
                                         <div class="row">
                                            <div class="col-2">
                                               <div class="form-group">
                                                    <label for="valuationfee" class="form-label">ค่าประเมิน (ไม่รวม VAT)</label>
                                                    {{-- {{ number_format($Expense->price, 2) }} --}}
                                                    <input type="text" class="form-control" name="valuationfee" id="valuationfee" wire:model="valuationfee">
                                                    @error('valuationfee') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="valuationfee_case" class="form-label">เงื่อนไขการเก็บเงินลูกค้า</label>
                                                    <select name="valuationfee_case" class="form-control form-select" wire:model="valuationfee_case">
                                                        <option value="100% วางบิลธนาคาร">100% วางบิลธนาคาร</option>
                                                        <option value="100% เก็บเงินลูกค้าหน้างาน">100% เก็บเงินลูกค้าหน้างาน</option>
                                                        <option value="50%/50% วางบิล/เก็บเงินก่อนสำรวจและ ณ วันที่ส่งมอบงาน">50%/50% วางบิล/เก็บเงินก่อนสำรวจและ ณ วันที่ส่งมอบงาน</option>
                                                        <option value="100% วางบิล/เก็บเงิน ณ วันที่มอบรายงาน">100% วางบิล/เก็บเงิน ณ วันที่มอบรายงาน</option>
                                                    </select>
                                                </div>
                                            </div>
                                         </div>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">พืกัด GPS</p></td>
                                    <td class="wp-70">
                                       <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="job_gps" class="form-label">GPS (LAT, LONG)</label>
                                                    <input type="text" class="form-control" name="job_gps" id="job_gps" wire:model="job_gps">
                                                    @error('job_gps') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-2">
                                                <div class="form-group">
                                                    <label for="lat" class="form-label">Latitude</label>
                                                    <input type="text" class="form-control" name="lat" id="lat" wire:model="lat">
                                                    @error('lat') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="lng" class="form-label">Longitude</label>
                                                    <input type="text" class="form-control" name="lng" id="lat" wire:model="lng">
                                                    @error('lng') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div> --}}
                                            
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ผู้ประเมินราคา/วันที่</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="valuer" class="form-label">ผู้ประเมิน</label>
                                                    <select name="valuer" wire:model="valuer" class="form-control form-select">
                                                        @foreach($list_valuers as $employee)
                                                                <option value="{{ $employee->name }}">
                                                                    {{ $employee->name }}
                                                                </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="headvaluer" class="form-label">ผู้ตรวจ</label>
                                                    <select name="headvaluer" wire:model="headvaluer" class="form-control form-select">
                                                        @foreach($list_headvaluers as $employee)
                                                            {{-- @if($employee->id =='1' or $employee->id =='2' or $employee->id =='3' or $employee->id =='4' or $employee->id =='5' or $employee->id =='6' ) 
                                                                @if($employee->id == '3')   
                                                                    <option value="{{ $employee->name }}">
                                                                        {{ $employee->name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $employee->name }}">
                                                                        {{ $employee->name }}
                                                                    </option>        
                                                                @endif
                                                            @endif --}}
                                                            <option value="{{ $employee->name }}">
                                                                {{ $employee->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="startdate" class="form-label">วันที่เริ่มงาน</label>
                                                    {{-- <input class="form-control" wire:model="startdate" name="startdate" id="startdate" placeholder="dd-mm-yyyy" type="text" value="{{ old('date', \Carbon\Carbon::now()->format('d-m-Y')) }}"> --}}
                                                    <input class="form-control" wire:model="startdate" name="startdate" id="startdate" type="text">
                                                </div>
                                            </div>
                                            
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="inspectiondate" class="form-label"><span style="color:green;font-weight: bold;">วันที่สำรวจ</label>
                                                    <input class="form-control" wire:model="inspectiondate" name="inspectiondate" id="inspectiondate" type="text">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="lcduedate" class="form-label"><span style="color:red;font-weight: bold;">กำหนดส่ง LC ตรวจ</label>
                                                    <input class="form-control" wire:model="lcduedate" name="lcduedate" id="lcduedate" type="text">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="clientduedate" class="form-label"><span style="color:green;font-weight: bold;">กำหนดส่งงานลูกค้า</label>
                                                    <input class="form-control" wire:model="clientduedate" name="clientduedate" id="clientduedate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">วิธีการประเมิน / มูลค่าตลาด</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                           <div class="col-5">
                                                <div class="form-group">
                                                    <label for="obj_method" class="form-label">วิธีการประเมิน (เพื่อกำหนดมูลค่าตลาด)</label>
                                                    <select name="obj_method" class="form-control form-select" wire:model="obj_method">
                                                        <option value=""></option>
                                                        <option value="วิธีเปรียบเทียบกับข้อมูลตลาด (Market Approach)">วิธีเปรียบเทียบกับข้อมูลตลาด (Market Approach)</option>
                                                        <option value="วิธีต้นทุนทดแทน (Cost Approach)">วิธีต้นทุนทดแทน (Cost Approach)</option>
                                                        <option value="วิธีแปลงรายได้เป็นมูลค่า">วิธีพิจารณาจากรายได้ (Income Approach)</option>
                                                        <option value="วิธีการตั้งสมมติฐานในการพัฒนา">วิธีคำนวณจากมูลค่าคงเหลือ (Residual Method)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                               <div class="form-group">
                                                    <label for="marketvalue" class="form-label">มูลค่าตลาด (Market Value)</label>
                                                    {{-- {{ number_format($Expense->price, 2) }} --}}
                                                    <input type="text" class="form-control" name="marketvalue" id="marketvalue" wire:model="marketvalue">
                                                    @error('marketvalue') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">สถานะงาน</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    
                                                    <select name="job_status" class="form-control form-select" wire:model="job_status">
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="On Hold">On Hold</option>
                                                        <option value="Cancel">Cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>            
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ตรวจสอบ ข้อมูล / ขั้นตอนการทำงาน</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="form-check-label" for="job_checked">ผ่านการตรวจสอบเช็คข้อมูลแล้ว</label>
                                                <br>
                                                <label>
                                                    <input type="radio" name="job_checked" value="0" wire:model="job_checked"> No
                                                </label>
                                                &nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="job_checked" value="1" wire:model="job_checked"> Yes
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-check-label" for="print_checked">Print เล่มรายงาน</label>
                                                <br>
                                                <label>
                                                    <input type="radio" name="print_checked" value="0" wire:model="print_checked"> No
                                                </label>
                                                &nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="print_checked" value="1" wire:model="print_checked"> Yes
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-check-label" for="link_checked">Link Folder</label>
                                                <br>
                                                <label>
                                                    <input type="radio" name="link_checked" value="0" wire:model="link_checked"> No
                                                </label>
                                                &nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="link_checked" value="1" wire:model="link_checked"> Yes
                                                </label>
                                            </div>

                                            <div class="col-3">
                                                <label class="form-check-label" for="file_checked">File Collect</label>
                                                <br>
                                                <label>
                                                    <input type="radio" name="file_checked" value="0" wire:model="file_checked"> No
                                                </label>
                                                &nbsp;&nbsp;
                                                <label>
                                                    <input type="radio" name="file_checked" value="1" wire:model="file_checked"> Yes
                                                </label>
                                            </div>


                                            
                                        </div>            
                                    </td>
                                </tr>

                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">บันทึก</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            

                                             <div class="col-2">
                                                <div class="form-group">
                                                    <button class="btn btn-primary" onclick="confirmEdit()">บันทึกข้อมูล</button>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success">{{session('message')}}</div>
                                                @endif
                                            </div>
                                        </div>            
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
     <!-- End Row -->
</div> 