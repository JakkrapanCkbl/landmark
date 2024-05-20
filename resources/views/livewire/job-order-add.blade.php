<div>
    @include('livewire.popup-job-order-add')
    
    {{-- <div>
        <button type="button" class="btn btn-primary" wire:click="addTwoNumbers(5,5)">sum</button>
        Sum : {{$sum}}
    </div> --}}
    
    
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    @if(session()->has('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @else
                        <h3 class="card-title">ลงทะเบียนการรับงาน</h3>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap table-bordered">
                            <tbody>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">รหัสรายงาน</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label" for="codetype">เลือกประเภทรหัส</label>
                                                    <select name="codetype" wire:model="selectedType" wire:change="ChangeType" class="form-control form-select" id="codetype">
                                                        <option value="" selected>ประเภท</option>
                                                        <option value="BF">BF</option>
                                                        <option value="R">R</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="jobcode" class="form-label">รายงานเลขที่</label>
                                                    <input type="text" class="form-control" name="jobcode" id="jobcode" wire:model="new_id">
                                                    @error('new_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="reportcode" class="form-label">ID (KK/UOB)</label>
                                                    <input type="text" class="form-control" name="reportcode" id="reportcode" wire:model="reportcode">
                                                </div>
                                            </div>
                                            <div class="col">
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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ประเภททรัพย์สิน</p></td>
                                    <td class="wp-70">
                                       <div class="row">
                                             <div class="col">
                                                <div class="form-group">
                                                    <select name="prop_type" wire:model="prop_type" class="form-control form-select" id="prop_type"  data-bs-placeholder="Select Prop Type">
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
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    @livewire('get-project',['table'=>'jobs','event'=>'companySelected']) 
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
                                                    {{-- @if($company)
                                                        pm:{{$company->projectname}}
                                                    @else
                                                        @livewire('postx',['table'=>'jobs','event'=>'companySelected']) 
                                                    @endif --}}
                                                    {{-- @livewire('postx',['table'=>'jobs','event'=>'companySelected'])  --}}
                                                    {{-- <input type="text" class="form-control" name="pn" id="pn" wire:model="company">
                                                    pn:{{$company}} --}}
                                                    <input type="text" class="form-control" name="projectname" id="projectname" wire:model="projectname">
                                                    @error('projectname') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ทำเลที่ตั้ง (เลขที่ / หมู่ / ซอย / ถนน)</p></td>
                                    <td class="wp-70">
                                       <input type="text" id="proplocation" name="proplocation" wire:model="projectaddress" class="form-control" placeholder="(เลขที่ / หมู่ / ซอย / ถนน)">
                                       @error('projectaddress') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">จังหวัด, อำเภอ</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col">
                                                @if (!is_null($provinces))
                                                    <div class="form-group">
                                                        <label for="lastname">จังหวัด</label>
                                                        <select class="form-control" id="province_code" name="province_code" wire:model="selectedProvince">
                                                            {{-- <option value=""></option> --}}
                                                            @foreach ($provinces as $province)
                                                            {{-- <option value="{{$province->code}}">{{$province->name_th}}</option> --}}
                                                            <option value="{{ $province->code }}" @if ($selectedProvince == $province->code) selected @endif>{{ $province->name_th }}</option>
                                                            @endforeach
                                                        </select>
                                                        {{-- Province code = {{ $selectedProvince }} --}}
                                                    </div>
                                                @else
                                                    <p>จะแสดงข้อมูลหลังจากพิมพ์ชื่อโครงการ</p>
                                                @endif
                                            </div>
                                            <div class="col">
                                             @if (!is_null($amphures))
                                                <div class="form-group">
                                                <label for="lastname">งาน HL ระบุ อำเภอ / เขต ตามเอกสารสิทธิ์ที่ดินหรืออช.2</label>
                                                    <select class="form-control" id="amphure_code" name="amphure_code" wire:model="selectedAmphure">
                                                    {{-- <option value=""></option> --}}
                                                    @foreach ($amphures as $aumphure)
                                                        <option value="{{$aumphure->code}}">{{$aumphure->name_th}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                {{-- Amphure code = {{ $selectedAmphure }} --}}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ตำบล</p></td>
                                    <td class="wp-70">
                                        <div class="form-group">
                                            <input type="text" wire:model="district" name="district" id="district" class="form-control" placeholder="งาน HL ระบุ ตำบล / แขวง ตามเอกสารสิทธิ์ที่ดินหรืออช.2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">เนื้อที่</p></td>
                                    <td class="wp-70">
                                        <div class="form-group">
                                            <input wire:model="prop_size" type="text" class="form-control" maxlength="255" name="prop_size" id="prop_size" placeholder="ตัวอย่าง : 99.99 ตร.ม. / 99-0-99.9 ไร่">
                                            @error('prop_size') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ลูกค้าราย/ผู้ติดต่อ</p></td>
                                    <td class="wp-70">
                                        <div class="form-group">
                                            <input type="text" class="form-control" maxlength="255" wire:model="customer" name="customer" id="customer">
                                            @error('customer') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ผู้ประเมิน, ผู้ตรวจ</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="valuer" class="form-label">ผู้ประเมิน</label>
                                                    <select name="valuer" wire:model="valuer" class="form-control valuer{{ $errors->has('valuer') ? ' is-invalid' : '' }}">
                                                        @foreach($employees as $employee)
                                                                <option value="{{ $employee->name }}">
                                                                    {{ $employee->name }}
                                                                </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="headvaluer" class="form-label">ผู้ตรวจ</label>
                                                    <select name="headvaluer" wire:model="headvaluer" class="form-control headvaluer{{ $errors->has('headvaluer') ? ' is-invalid' : '' }}">
                                                        @foreach($employees as $employee)
                                                            @if($employee->id =='1' or $employee->id =='2' or $employee->id =='3' or $employee->id =='4' or $employee->id =='5' or $employee->id =='6' ) 
                                                                @if($employee->id == '3')   
                                                                    <option value="{{ $employee->name }}">
                                                                        {{ $employee->name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $employee->name }}">
                                                                        {{ $employee->name }}
                                                                    </option>        
                                                                @endif
                                                            @endif
                                                           
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">ลงวันที่</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="startdate" class="form-label">วันที่เริ่มงาน</label>
                                                    {{-- <input class="form-control" wire:model="startdate" name="startdate" id="startdate" placeholder="dd-mm-yyyy" type="text" value="{{ old('date', \Carbon\Carbon::now()->format('d-m-Y')) }}"> --}}
                                                    <input class="form-control" wire:model="startdate" name="startdate" id="startdate" type="text">
                                                </div>
                                            </div>
                                            
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="inspectiondate" class="form-label">วันที่สำรวจ</label>
                                                    <input class="form-control" wire:model="inspectiondate" name="inspectiondate" id="inspectiondate" placeholder="dd-mm-yyyy" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="lcduedate" class="form-label">กำหนดส่ง LC ตรวจ</label>
                                                    <input class="form-control" wire:model="lcduedate" name="lcduedate" id="lcduedate" placeholder="dd-mm-yyyy" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="clientduedate" class="form-label">กำหนดส่งงานลูกค้า</label>
                                                    <input class="form-control" wire:model="clientduedate" name="clientduedate" id="clientduedate" placeholder="dd-mm-yyyy" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;">หัวข้ออื่นๆ</p></td>
                                    <td class="wp-70">
                                        <div class="row">
                                            <div class="form-group">
                                                <br>
                                                <a href="#" id="openModal"><span style="color:red;font-size: 16px;font-weight: bold;text-decoration: underline;">
                                                ถัดไป</p></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td class="wp-30 text-muted fs-14"><span style="color:green;font-weight: bold;"></p></td>
                                    <td class="wp-70">
                                        <div class="form-group">
                                            {{-- <button class="btn btn-primary" wire:click="store(1)">บันทึกข้อมูลแบบต่อเนื่อง</button> --}}
                                            {{-- <button class="btn btn-primary" wire:click="store(0)">บันทึกข้อมูล</button> --}}
                                            {{-- <button class="btn btn-primary" onclick="confirmAdd('{{ $projectname }}')">บันทึกข้อมูล</button> --}}
                                            <button class="btn btn-purple" onclick="confirmAdd('1')">บันทึกข้อมูลแบบต่อเนื่อง</button>
                                            <button class="btn btn-success" onclick="confirmAdd('0')">บันทึกข้อมูล</button>
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

