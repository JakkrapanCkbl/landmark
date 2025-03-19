<!--TASK MODAL-->
    <div wire:ignore.self class="modal fade" id="PopupHomeFoundEditData">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">

                <div class="modal-header p-5">
                    {{-- <h4 class="modal-title text-dark"> รหัสรายงาน : <u><a href= "{{ route('joborder.joborder-edit', ['id' => $myid]) }}" target='_blank'>{{$jobcode}}</a></u></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> --}}
                     
                </div>

                <div class="modal-body">
                    <table class="table text-nowrap text-md-nowrap table-bordered">
                        <tbody>
                            <tr>
                                <td class="wp-30">ลำดับที่</td>
                                <td class="wp-70">
                                <p class="m-0 wp-70 text-dark">{{$myid}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">ประเภท</td>
                                <td class="wp-70">
                                    <select name="prop_type" class="form-control form-select" wire:model="prop_type">
                                        <option value="คจ">คริสตจักร</option>
                                        <option value="สนง">สำนักงาน</option>
                                        <option value="รร">โรงเรียน</option>
                                        <option value="สนค">สำนักกลางนักเรียน</option>
                                        <option value="รพ">โรงพยาบาล</option>
                                        <option value="สุสาน">สุสาน</option>
                                        <option value="ดิน">ที่ดิน</option>
                                        <option value="นา">นา</option>
                                        <option value="ถนน">ถนน</option>
                                        <option value="บ้าน">บ้าน</option>
                                        <option value="สถาน">คริสตสถาน</option>
                                        <option value="ว">สถาบัน</option>
                                        <option value="สถบ">โรงเรียน</option>
                                        <option value="ศาลา">ศาลา</option>
                                        <option value="กอง">กอง</option>
                                        <option value="หน่วย">หน่วย</option>
                                        <option value="หมวด">หมวด</option>
                                        <option value="ศูนย์">ศูนย์</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">ชื่อสถานที่</td>
                                <td class="wp-70">
                                <input class="form-control form-control-sm  mb-4" type="text" name="prop_name" id="prop_name" wire:model="prop_name">
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="wp-30">ที่ตั้ง</td>
                                <td class="wp-70">
                                <input class="form-control form-control-sm  mb-4" type="text" name="prop_location" id="prop_location" wire:model="prop_location">
                                </td>
                            </tr>
                             <tr>
                                <td class="wp-30">GPS</td>
                                <td class="wp-70">
                                    <input class="form-control form-control-sm  mb-4" type="text"  name="gps" id="gps" wire:model="gps">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">เลขที่โฉนด</td>
                                <td class="wp-70">
                                    <input class="form-control form-control-sm  mb-4" type="text"  name="deed_no" id="deed_no" wire:model="deed_no">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">เนื้อที่</td>
                                <td class="wp-70">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="rai" class="form-label">ไร่</label>
                                                <input type="text" class="form-control" name="rai" id="rai" wire:model="rai">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="ngan" class="form-label">งาน</label>
                                                <input type="text" class="form-control" name="ngan" id="ngan" wire:model="ngan">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="wha" class="form-label">ตารางวา</label>
                                                <input type="text" class="form-control" name="wha" id="wha" wire:model="wha">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">ชื่อผู้ถือกรรมสิทธิ์</td>
                                <td class="wp-70">
                                    <input class="form-control form-control-sm  mb-4" type="text" name="owner" id="owner" wire:model="owner">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">สถานะ</td>
                                <td class="wp-70">
                                    <select name="prop_status" class="form-control form-select" wire:model="prop_status">
                                        <option value="โอนแล้ว">โอนแล้ว</option>
                                        <option value="ยังไม่โอน">ยังไม่โอน</option>
                                        <option value="ระหว่างยื่นขอโอนที่ดิน">ระหว่างยื่นขอโอนที่ดิน</option>
                                        <option value="ยังไม่ได้ยื่นเรื่อง">ยังไม่ได้ยื่นเรื่อง</option>
                                        <option value="ให้เช่า">ให้เช่า</option>
                                        <option value="เช่า">เช่า</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">วันที่จดทะเบียนที่ดินล่าสุด</td>
                                <td class="wp-70">
                                    {{-- <input class="form-control" name="startdate" id="startdate" type="text" value=""> --}}
                                    <input class="form-control form-control-sm  mb-4" type="text" name="owner_how" id="owner_how" wire:model="owner_how">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">หนังสือรับอนุญาตเลขที่ / เมื่อวันที่</td>
                                <td class="wp-70">
                                    <input class="form-control form-control-sm  mb-4" type="text" name="certificate" id="certificate" wire:model="certificate">
                                </td>
                            </tr>
                             <tr>
                                <td class="wp-30">ผู้ดำเนินการ 1</td>
                                <td class="wp-70">
                                    <select name="prop_operator" class="form-control form-select" wire:model="prop_operator">
                                        <option value="staff1">staff1</option>
                                        <option value="staff2">staff2</option>
                                    </select>
                                </td>
                            </tr>
                             <tr>
                                <td class="wp-30">ผู้ดำเนินการ 2</td>
                                <td class="wp-70">
                                    <select name="prop_operator2" class="form-control form-select" wire:model="prop_operator2">
                                        <option value="staff1">staff1</option>
                                        <option value="staff2">staff2</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">หมายเหตุ</td>
                                <td class="wp-70">
                                    <textarea class="form-control mb-4" rows="3" name="remark" id="remark" wire:model="remark"></textarea>
                                </td>
                            </tr>
                           
                            
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer p-0 border-top-0">
                    <div class="row">
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-50 text-muted"></p>
                            <p class="m-0 wp-50 text-dark"><button class="btn btn-primary" onclick="updateValue()">บันทึกข้อมูล</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--TASK MODAL ENDS-->
