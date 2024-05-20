
    <!--TASK MODAL-->
    <div wire:ignore.self class="modal fade" id="Vertically">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">

                <div class="modal-header p-5">
                
                    <h4 class="modal-title text-dark"> รหัสรายงาน : <u><a href= "{{ route('joborder.joborder-edit', ['id' => $myid]) }}" target='_blank'>{{$jobcode}}</a></u></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                     {{-- <button class="btn btn-primary" onclick="updateValue()">บันทึกข้อมูล</button> --}}
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">รหัสรายงานลูกค้า</p>
                            <p class="m-0 wp-70 text-dark">{{$reportcode}}</p>
                        </div>
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">ชื่อโครงการ</p>
                            <p class="m-0 wp-70 text-dark">{{$projectname}}</p>
                        </div>
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">ทำเลที่ตั้ง</p>
                            <p class="m-0 wp-70 text-dark">{{$proplocation}}</p>
                        </div>
                        {{-- <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">Assigned To</p>
                            <div class="m-0 wp-70 text-dark d-flex align-items-center">
                                <div class="me-2">
                                    <img alt="User Avatar" class="rounded-circle avatar-sm" src="{{asset('assets/images/users/7.jpg')}}">
                                </div>
                                <div>
                                    <p class="mb-1">Daniel Obrien</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">วันที่เริ่มงาน</p>
                            <p class="m-0 wp-70 text-dark">{{$startdate}}</p>
                        </div>
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">Status</p>
                            <div class="m-0 wp-70 text-dark">
                                @if($job_status == 'Completed')
                                    <span class="mb-0 mt-1 status-main completed">{{$job_status}}</span>
                                @elseif ($job_status == 'In Progress')
                                    <span class="mb-0 mt-1 status-main in-progress">{{$job_status}}</span>
                                @elseif ($job_status == 'On Hold')
                                    <span class="mb-0 mt-1 status-main on-hold">{{$job_status}}</span>
                                @elseif ($job_status == 'Cancel')
                                    <span class="mb-0 mt-1 status-main cancel">{{$job_status}}</span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">กำหนดส่งลูกค้า</p>
                            <p class="m-0 wp-70 text-dark">{{$clientduedate}}</p>
                        </div>
                        {{-- <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">Description</p>
                            <p class="m-0 wp-70 text-dark">Kasd dolore lorem eos stet at, dolor ipsum elitr sea amet amet stet justo, sed.</p>
                        </div> --}}
                    </div>
                </div>

                <div class="modal-footer p-0 border-top-0">

                    <!-- Tabs -->
                    <div class="tabs-menu4 w-100">
                        <nav class="nav border-bottom px-4 d-block d-lg-flex flex-2">
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1 active" data-bs-toggle="tab" href="#task-files">
                                Files
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-upload">
                                Upload
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-subtask">
                                To do
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-tracktime">
                                Track Time
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-comments">
                                Comments
                            </a>
                        </nav>
                    </div><!-- /Tabs -->

                    <div class="tab-content w-100">
                        <div class="tab-pane active task-files-tab" id="task-files">
                            
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--TASK MODAL ENDS-->
