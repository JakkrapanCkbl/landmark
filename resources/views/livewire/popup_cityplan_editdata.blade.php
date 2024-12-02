<!--TASK MODAL-->
    <div wire:ignore.self class="modal fade" id="PopupCityplanEditData">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">

                <div class="modal-header p-5">
                    {{-- <h4 class="modal-title text-dark"> รหัสรายงาน : <u><a href= "{{ route('joborder.joborder-edit', ['id' => $myid]) }}" target='_blank'>{{$jobcode}}</a></u></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> --}}
                     
                </div>

                <div class="modal-body">
                    <table class="table text-nowrap text-md-nowrap table-bordered">
                        <tbody>
                            <tr>
                                <td class="wp-30">id, doc_group, asa_no</td>
                                <td class="wp-70">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="rai" class="form-label">id</label>
                                                {{-- <p class="m-0 wp-70 text-dark">{{$myid}}</p> --}}
                                                <input type="text" class="form-control" readonly name="myid" id="myid" wire:model="myid">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="ngan" class="form-label">doc_group</label>
                                                <input type="text" class="form-control" name="doc_group" id="doc_group" wire:model="doc_group">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="wha" class="form-label">asa_no</label>
                                                <input type="text" class="form-control" name="asa_no" id="asa_no" wire:model="asa_no">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">publish_date</td>
                                <td class="wp-70">
                                   <input class="form-control form-control-sm  mb-4" type="text" name="publish_date" id="publish_date" wire:model="publish_date">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">law_type</td>
                                <td class="wp-70">
                                <input class="form-control form-control-sm  mb-4" type="text" name="law_type" id="law_type" wire:model="law_type">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">province</td>
                                <td class="wp-70">
                                <input class="form-control form-control-sm  mb-4" type="text" name="province" id="province" wire:model="province">
                                </td>
                            </tr>
                             <tr>
                                <td class="wp-30">description</td>
                                <td class="wp-70">
                                    <textarea class="form-control mb-4" rows="3" name="description" id="description" wire:model="description"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">expire_date</td>
                                <td class="wp-70">
                                    <input class="form-control form-control-sm  mb-4" type="text"  name="expire_date" id="expire_date" wire:model="expire_date">
                                </td>
                            </tr>
                            <tr>
                                <td class="wp-30">organization</td>
                                <td class="wp-70">
                                    <input class="form-control form-control-sm  mb-4" type="text"  name="organization" id="organization" wire:model="organization">                                   
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
                        {{-- <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-50 text-muted"></p>
                            <p class="m-0 wp-50 text-dark"><button class="btn btn-primary" onclick="updateValue()">บันทึกข้อมูล</button></p>
                        </div> --}}
                        <div class="col-md-12 d-flex mb-8">
                            <button class="btn btn-primary" onclick="updateValue()">บันทึกข้อมูล</button>
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--TASK MODAL ENDS-->
