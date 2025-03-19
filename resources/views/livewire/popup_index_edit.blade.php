
    <!--TASK MODAL-->
    
    <div wire:ignore.self class="modal fade" id="Vertically">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">

                <div class="modal-header p-5">
                    <h4 class="modal-title text-dark"> id : {{$myid}} </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    {{-- <h4 class="modal-title text-dark"> รหัสรายงาน : <u><a href= "{{ route('joborder.joborder-edit', ['id' => $myid]) }}" target='_blank'>{{$jobcode}}</a></u></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> --}}
                     {{-- <button class="btn btn-primary" onclick="updateValue()">บันทึกข้อมูล</button> --}}
                </div>

                <div class="modal-body">
                     <!-- Tabs -->
                    <div class="tabs-menu4 w-100">
                        <nav class="nav border-bottom px-4 d-block d-lg-flex flex-2">
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1 active" data-bs-toggle="tab" href="#task-admin">
                                แก้ไขข้อมูล (Admin)
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-files">
                                {{-- Files 
                                 @if (is_null($job_maps) || empty($job_maps))
                                    แผนที่ผังเมือง
                                @else
                                    <p style="font-weight: bold; color: blue;">แผนที่ผังเมือง</p>
                                @endif --}}
                                {{-- <p style="font-weight: bold; color: blue;">Files</p> --}}
                                Files
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-upload">
                                Upload
                            </a>
                             <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-valuer">
                                แก้ไขข้อมูล (Valuer)
                            </a>
                           
                             {{-- <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-link_folder">
                                Link Folder
                            </a>
                             <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-file_collect">
                                File Collect
                            </a> --}}

                            {{-- <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-subtask">
                                To do
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-tracktime">
                                Track Time
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-comments">
                                Comments
                            </a> --}}
                        </nav>
                    </div><!-- /Tabs -->

                    <div class="tab-content w-100">
                        <div class="tab-pane active task-files-tab" id="task-admin">
                            <div class="table-responsive">
                                <table class="table text-nowrap text-md-nowrap table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">รหัสรายงาน</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-3">
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

                                                    @if($client === 'อื่นๆ')
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="reportcode" class="form-label">ระบุ</label>
                                                                <input type="text" class="form-control" name="client_note" id="client_note" wire:model="client_note">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ลูกค้าราย/ผู้ติดต่อ</p></td>
                                            <td class="wp-70">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="customer" id="customer" wire:model="customer">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ประเภททรัพย์สิน/ขนาด</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="prop_type" class="form-label">ประเภททรัพย์สิน</label>
                                                            <input type="text" class="form-control" name="prop_type" id="prop_type" wire:model="prop_type">
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="prop_type2" class="form-label">ประเภททรัพย์สิน (กลุ่มย่อย)</label>
                                                            <select class="form-control form-select" id="proptype2" name="proptype2" wire:model="selectedProptype2">
                                                                {{-- @foreach ($proptype2s as $item)
                                                                    <option value="{{ $item->show_prop_type2 }}" @if ($proptype2 == $item->show_prop_type2) selected @endif>{{ $item->show_prop_type2 }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- @if($selectedProptype == 'อื่นๆ')
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="prop_type_note" class="form-label">อื่นๆ ระบุ</label>
                                                                <input type="text" class="form-control" name="prop_type_note" id="prop_type_note" wire:model="prop_type_note">
                                                                @error('prop_type_note') <span class="error" style="color: red;">{{ $message }}</span> @enderror                                                       
                                                            </div>
                                                        </div>
                                                    @endif --}}
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
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ชื่อโครงการ/GPS</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="prop_type" class="form-label">ชื่อโครงการ</label>
                                                            <input type="text" class="form-control" name="projectname" id="projectname" wire:model="projectname">
                                                        </div>
                                                    </div>


                                                   
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="job_gps" class="form-label">GPS (LAT, LONG)</label>
                                                            <input type="text" class="form-control" name="job_gps" id="job_gps" wire:model="job_gps">
                                                            @error('job_gps') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ประเภททรัพย์สินกลุ่มย่อย / ขนาด</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label for="prop_type2" class="form-label">กลุ่มย่อย</label>
                                                            <select class="form-control form-select" id="proptype2" name="proptype2" wire:model="selectedProptype2">
                                                                @foreach ($proptype2s as $item)
                                                                    <option value="{{ $item->show_prop_type2 }}" @if ($proptype2 == $item->show_prop_type2) selected @endif>{{ $item->show_prop_type2 }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if($selectedProptype2 == 'อื่นๆ')
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="prop_type2_note" class="form-label">อื่นๆ ระบุ</label>
                                                                <input type="text" class="form-control" name="prop_type2_note" id="prop_type2_note" wire:model="prop_type2_note">
                                                                @error('prop_type2_note') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                    

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="prop_size" class="form-label">เนื้อที่</label>
                                                            <input type="text" class="form-control" name="prop_size" id="prop_size" wire:model="prop_size">
                                                            @error('prop_size') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr> --}}
                                        {{-- <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ชื่อโครงการ</p></td>
                                            <td class="wp-70">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="projectname" id="projectname" wire:model="projectname">
                                                        @error('projectname') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> --}}
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
                                                            {{-- <select class="form-control form-select" id="province_code" name="province_code" wire:model="selectedProvince">
                                                                @foreach ($provinces as $province)
                                                                    <option value="{{ $province->code }}" @if ($province_code == $province->code) selected @endif>{{ $province->name_th }}</option>
                                                                @endforeach
                                                            </select> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="amphure_code" class="form-label">อำเภอ / เขต</label>
                                                            {{-- <select class="form-control form-select" id="amphure_code" name="amphure_code" wire:model="amphure_code">
                                                                @foreach ($amphures as $amphure)
                                                                    <option value="{{ $amphure->code }}" @if ($amphure_code == $amphure->code) selected @endif>{{ $amphure->name_th }}</option>
                                                                @endforeach
                                                            </select> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="district" class="form-label">ตำบล / แขวง</label>
                                                            <input type="text" class="form-control" name="district" id="district" wire:model="district">
                                                            @error('district') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col">
                                                        <div class="form-group">
                                                            <label for="customer" class="form-label">ลูกค้าราย/ผู้ติดต่อ</label>
                                                            <input type="text" class="form-control" name="customer" id="customer" wire:model="customer">
                                                            @error('customer') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div> --}}
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
                                                                    <option value="ไทย 1 (ส่ง Soft File Only)">ไทย 1 (ส่ง Soft File Only)</option>
                                                                    <option value="ไทย 1 เล่ม">ไทย 1 เล่ม</option>
                                                                    <option value="ไทย 2 เล่ม">ไทย 2 เล่ม</option>
                                                                    <option value="ไทย 2 เล่ม + CD">ไทย 2 เล่ม + CD</option>
                                                                    <option value="อังกฤษ 2 เล่ม">อังกฤษ 2 เล่ม</option>
                                                                    <option value="ไทย 2 เล่ม + อังกฤษ 2 เล่ม">ไทย 2 เล่ม + อังกฤษ 2 เล่ม</option>
                                                                    <option value="-">-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
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
                                                    <div class="col-5">
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
                                                                    <option value="11">อื่นๆ</option>
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
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ผู้ประเมินราคา</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="valuer" class="form-label">ผู้ประเมิน</label>
                                                            <select name="valuer" wire:model="valuer" class="form-control form-select">
                                                                {{-- @foreach($list_valuers as $employee)
                                                                        <option value="{{ $employee->name }}">
                                                                            {{ $employee->name }}
                                                                        </option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="startdate" class="form-label">วันที่เริ่มงาน</label>
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
                                                            <label for="lcduedate" class="form-label"><span style="color:red;font-weight: bold;">ส่งงาน LC ตรวจ</label>
                                                            <input class="form-control" wire:model="lcduedate" name="lcduedate" id="lcduedate" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="clientduedate" class="form-label"><span style="color:green;font-weight: bold;">ส่งงานลูกค้า</label>
                                                            <input class="form-control" wire:model="clientduedate" name="clientduedate" id="clientduedate" type="text">
                                                        </div>
                                                    </div>
                                                     <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="clientduedate" class="form-label"><span style="color:blue;font-weight: bold;">ส่งตรวจรายงาน</label>
                                                            <input class="form-control" wire:model="clientduedate" name="clientduedate" id="clientduedate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ผู้ประเมินราคา</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="headvaluer" class="form-label">ผู้ตรวจ</label>
                                                            <select name="headvaluer" wire:model="headvaluer" class="form-control form-select">
                                                                {{-- @foreach($list_headvaluers as $employee)
                                                                    <option value="{{ $employee->name }}">
                                                                        {{ $employee->name }}
                                                                    </option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="clientduedate" class="form-label"><span style="color:green;font-weight: bold;">วันที่อนุมัติเล่มรายงาน</label>
                                                            <input class="form-control" wire:model="clientduedate" name="clientduedate" id="clientduedate" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                        {{-- <tr>
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
                                                           
                                                            <input type="text" class="form-control" name="marketvalue" id="marketvalue" wire:model="marketvalue">
                                                            @error('marketvalue') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ตรวจสอบข้อมูล/จัดเก็บไฟล์</p></td>
                                            <td class="wp-70">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-check-label" for="print_checked">Collect soft File</label>
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
                                                        <label class="form-check-label" for="link_checked">Update Data</label>
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
                                                        <label class="form-check-label" for="file_checked">Print เล่มรายงาน</label>
                                                        <br>
                                                        <label>
                                                            <input type="radio" name="file_checked" value="0" wire:model="file_checked"> No
                                                        </label>
                                                        &nbsp;&nbsp;
                                                        <label>
                                                            <input type="radio" name="file_checked" value="1" wire:model="file_checked"> Yes
                                                        </label>
                                                    </div>

                                                    <div class="col-3">
                                                        <label class="form-check-label" for="file_checked">Collect Hard File</label>
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
                                            <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ผู้ตรวจรายงานเบื้องต้น (Checker)</p></td>
                                            <td class="wp-70">
                                                <div class="row">

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="checker" class="form-label">ผู้ตรวจเล่มรายงาน</label>
                                                            <select name="checker" wire:model="checker" class="form-control form-select">
                                                                {{-- @foreach($list_checkers as $employee)
                                                                        <option value="{{ $employee->name }}">
                                                                            {{ $employee->name }}
                                                                        </option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="report_checked_date" class="form-label">วันที่ตรวจรายงาน</label>
                                                            <input class="form-control" wire:model="report_checked_date" name="report_checked_date" id="report_checked_date" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="approve_checked_date" class="form-label">วันที่อนุมัติเล่มรายงาน</label>
                                                            <input class="form-control" wire:model="report_checked_date" name="report_checked_date" id="report_checked_date" type="text">
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
                                                            <label class="form-check-label" for="job_checked">สถานะ</label>
                                                            <br>
                                                            <select name="job_status" class="form-control form-select" wire:model="job_status">
                                                                <option value="In Progress">In Progress</option>
                                                                <option value="Completed">Completed</option>
                                                                <option value="On Hold">On Hold</option>
                                                                <option value="Cancel">Cancel</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <label class="form-check-label" for="job_checked">Project Completed</label>
                                                        <br>
                                                        <label>
                                                            <input type="radio" name="job_checked" value="0" wire:model="job_checked"> No
                                                        </label>
                                                        &nbsp;&nbsp;
                                                        <label>
                                                            <input type="radio" name="job_checked" value="1" wire:model="job_checked"> Yes
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
                                                            {{-- <button class="btn btn-primary" onclick="confirmEdit()">บันทึกข้อมูล</button> --}}
                                                            <button class="btn btn-primary" onclick="#">บันทึกข้อมูล</button>
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

                        <div class="tab-pane" id="task-files">
                            <div class="row">
                                <div class="mt-3">
                                    <table class="table table-bordered br-7">
                                        <thead>
                                            <tr class="row-first">
                                                <th>File Name</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Size</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (!is_null($job_imgs))
                                                @foreach ($job_imgs as $job_img)
                                                    <tr>
                                                        <td>
                                                            <div class="recent-files">
                                                                <a data-bs-toggle="tooltip" data-bs-original-title="Open PDF" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank">
                                                                    @if ($job_img->file_type == 'pdf')
                                                                        <img class="img-responsive br-5" src="{{asset('images/icons8-pdf-96.png')}}" width="24" height="24" alt="Thumb-1">
                                                                    @elseif ($job_img->file_type == 'xlsx')
                                                                        <img class="img-responsive br-5" src="{{asset('images/icons8-xls-96.png')}}" width="24" height="24" alt="Thumb-1">
                                                                    @else
                                                                        <svg class="file-manager-icon w-icn me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#b6dfff" d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z"/><path fill="#86cbff" d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z"/></svg>
                                                                    @endif
                                                                    
                                                                </a>
                                                                <span class="mb-1 font-weight-semibold">{{$job_img->file_name}}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted modified-date">{{$job_img->file_date}}</span>
                                                        </td>
                                                        <td>
                                                            <span>{{$job_img->file_type}}</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted file-size">{{$job_img->file_size}}</span>
                                                            
                                                        </td>
                                                        <td style="text-align: center">
                                                            <a href="{{ route('deletejobfile',[$myid,$job_img->file_name]) }}"><i class="fe fe-trash delete-main text-muted"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="task-upload">
                            <div class="row">
                                <form action="{{route('dropzone.dz_storefiles')}}" method="POST" enctype="multipart/form-data" id="files-upload" class="dropzone">
									@csrf
									<input type="hidden" id="jobid" name="jobid" value={{$myid}}>
									<input type="hidden" id="jobcode" name="jobcode" value={{$jobcode}}>
									<input type="hidden" id="mainfolder" name="mainfolder" value={{$mainfolder}}>
									<input type="hidden" id="subfolder" name="subfolder" value={{$subfolder}}>
								</form>
                            </div>
                        </div>

                        <div class="tab-pane" id="task-valuer">
                        </div>

                        {{-- <div class="tab-pane" id="task-file_collect">
                            <div class="row">
                               <div class="col-3">
                                    <label class="form-check-label" for="file_checked">File Collect</label>
                                    <br>
                                    <label>
                                        <input type="radio" name="file_checked" value="0" wire:model="file_checked" disabled> No
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                        <input type="radio" name="file_checked" value="1" wire:model="file_checked" disabled> Yes
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="task-subtask">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex add-task-container">
                                        <input type="text" class="form-control wp-40 subtask-input" placeholder="Type Task Here..." id="subTaskInput">
                                        <a href="javascript:void(0)" role="button" class="text-teritary text-center ms-2 me-2" id="addTask">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-teritary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                                            Add
                                        </a>
                                        <a href="javascript:void(0)" role="button" class="text-primary text-center ms-2" id="completedAll">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M15.8085327,8.6464844l-5.6464233,5.6464844l-2.4707031-2.4697266c-0.0023804-0.0023804-0.0047607-0.0047607-0.0072021-0.0071411c-0.1972046-0.1932373-0.5137329-0.1900635-0.7069702,0.0071411c-0.1932983,0.1972656-0.1900635,0.5137939,0.0071411,0.7070312l2.8242188,2.8232422C9.9022217,15.4474487,10.02948,15.5001831,10.1621094,15.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l6-6c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1972046,0.1900635-0.5137329-0.0071411-0.7069702C16.3183594,8.446106,16.0018311,8.4493408,15.8085327,8.6464844z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                                            Mark All
                                        </a>
                                    </div>
                                    <label for="subTaskInput" class="w-100 d-block text-danger" id="errorNote"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <ul class="sub-list-container">
                                        <li class="sub-list-item task-completed">
                                            <div class="sub-list-main">
                                                <div class="check-btn"></div>
                                                <span class="sub-list-text text-muted" onclick="taskCompleted(event)">Gubergren vero nonumy vero no.</span>
                                            </div>
                                            <i class="fe fe-trash delete-main text-muted"></i>
                                        </li>
                                        <li class="sub-list-item">
                                            <div class="sub-list-main">
                                                <div class="check-btn"></div>
                                                <span class="sub-list-text text-muted" onclick="taskCompleted(event)">Duo no elitr diam labore sit invidunt. Magna gubergren erat.</span>
                                            </div>
                                            <i class="fe fe-trash delete-main text-muted"></i>
                                        </li>
                                        <li class="sub-list-item">
                                            <div class="sub-list-main">
                                                <div class="check-btn"></div>
                                                <span class="sub-list-text text-muted" onclick="taskCompleted(event)">Consetetur clita diam est eos invidunt. Eirmod magna.</span>
                                            </div>
                                            <i class="fe fe-trash delete-main text-muted"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end mt-3">
                                    <a href="javascript:void(0)" role="button" class="text-danger" id="deleteAllTasks">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-danger" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                                        Delete All
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="task-tracktime">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="row-first">
                                            <th class="bg-transparent border-bottom-0">Team Member</th>
                                            <th class="bg-transparent border-bottom-0">Start Date & Time</th>
                                            <th class="bg-transparent border-bottom-0">End Date & Time</th>
                                            <th class="bg-transparent border-bottom-0">Total Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <img alt="User Avatar" class="rounded-circle avatar-lg" src="{{asset('storage/avatars/mkc.jpg')}}">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">มงคล</h6>
                                                        <span class="text-muted fs-12">member@spruko.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted fs-13 fw-semibold">31 Oct 21 & 14:56</td>
                                            <td class="text-muted fs-13 fw-semibold">01 Nov 21 & 09:35</td>
                                            <td class="text-dark fs-13 fw-semibold">Days: 4<br>Hours: 10<br>Minutes: 22</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <img alt="User Avatar" class="rounded-circle avatar-lg" src="{{asset('storage/avatars/srp.jpg')}}">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">สาโรจน์</h6>
                                                        <span class="text-muted fs-12">member@spruko.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted fs-13 fw-semibold">30 Oct 21 & 12:56</td>
                                            <td class="text-muted fs-13 fw-semibold">11 Nov 21 & 09:35</td>
                                            <td class="text-dark fs-13 fw-semibold">Days: 15<br>Hours: 12<br>Minutes: 52</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <img alt="User Avatar" class="rounded-circle avatar-lg" src="{{asset('storage/avatars/mcm.jpg')}}">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">มนต์ชัย</h6>
                                                        <span class="text-muted fs-12">member@spruko.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted fs-13 fw-semibold">15 Oct 21 & 15:56</td>
                                            <td class="text-muted fs-13 fw-semibold">01 Nov 21 & 16:40</td>
                                            <td class="text-dark fs-13 fw-semibold">Days: 18<br>Hours: 8<br>Minutes: 52</td>
                                        </tr>
                                        <tr class="row-last">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <img alt="User Avatar" class="rounded-circle avatar-lg" src="{{asset('storage/avatars/mcm.jpg')}}">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">มนต์ชัย</h6>
                                                        <span class="text-muted fs-12">member@spruko.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-muted fs-13 fw-semibold">18 Oct 21 & 10:30</td>
                                            <td class="text-muted fs-13 fw-semibold">09 Nov 21 & 09:45</td>
                                            <td class="text-dark fs-13 fw-semibold">Days: 22<br>Hours: 10<br>Minutes: 12</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="task-comments">
                            <div class="row">
                                <div class="mt-5">
                                    <div class="media mb-5 overflow-visible">
                                        <div class="me-3">
                                            <a href="{{url('profile')}}"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="{{asset('storage/avatars/mkc.jpg')}}"> </a>
                                        </div>
                                        <div class="media-body overflow-visible">
                                            <div class="border mb-5 p-4 br-5">
                                                <nav class="nav float-end">
                                                    <div class="dropdown">
                                                        <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#"><i class="fe fe-edit me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i class="fe fe-corner-up-left me-1"></i> Reply</a>
                                                            <a class="dropdown-item" href="#"><i class="fe fe-flag me-1"></i> Report Abuse</a>
                                                            <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </nav>
                                                <h5 class="mt-0">Gavin Murray <span class="text-muted fs-12 ms-1">1 Day ago</span></h5>
                                                <span><i class="fe fe-thumb-up text-danger"></i></span>
                                                <p class="font-13 text-muted">Lorem ipsum dolor sit amet, quis Neque porro quisquam est, nostrud exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the writer, no fun for the reader.”No matter
                                                    what industry you’re working in, as a blogger, you should live and die by this statement.</p>
                                                <a class="like" href="javascript:;">
                                                    <span class="badge btn-danger-light rounded-pill py-2 px-3">
                                                        <i class="fe fe-heart me-1"></i>56</span>
                                                </a>
                                                <span class="reply" id="1">
                                                    <a href="javascript:;"><span class="badge btn-info-light rounded-pill py-2 px-3"><i class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                                                </span>
                                            </div>
                                            <div class="media mb-5 overflow-visible">
                                                <div class="me-3">
                                                    <a href="{{url('profile')}}"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="{{asset('storage/avatars/mcm.jpg')}}"> </a>
                                                </div>
                                                <div class="media-body border p-4 overflow-visible br-5">
                                                    <nav class="nav float-end">
                                                        <div class="dropdown">
                                                            <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#"><i class="fe fe-edit me-1"></i> Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-corner-up-left me-1"></i> Reply</a>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-flag me-1"></i> Report Abuse</a>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-1"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </nav>
                                                    <h5 class="mt-0">Mozelle Belt <span class="text-muted fs-12 ms-1 bg-normal-light">Reply to Gavin Murray</span><span class="text-muted fs-12 ms-1">2 min ago</span></h5>
                                                    <span><i class="fe fe-thumb-up text-danger"></i></span>
                                                    <p class="font-13 text-muted">Nostrud exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the writer, no fun for the reader.”No matter what industry you’re working in, as a blogger, you should
                                                        live and die by this statement.</p>
                                                    <a class="like" href="javascript:;"><span class="badge btn-danger-light rounded-pill py-2 px-3"><i class="fe fe-heart me-1"></i>56</span></a>
                                                    <span class="reply" id="2">
                                                        <a href="javascript:;"><span class="badge btn-info-light rounded-pill py-2 px-3"><i class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                </div>

                <div class="modal-footer p-0 border-top-0">
                   
                </div>
            </div>
        </div>
    </div><!--TASK MODAL ENDS-->
