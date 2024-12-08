
    <!--TASK MODAL-->
    <div wire:ignore.self class="modal fade" id="Vertically">
        <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
            <div class="modal-content modal-content-demo">

                <div class="modal-header p-5">
                
                    {{-- <h4 class="modal-title text-dark"> รหัสรายงาน : <u><a href= "{{ route('joborder.joborder-edit', ['id' => $myid]) }}" target='_blank'>{{$jobcode}}</a></u></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> --}}
                     {{-- <button class="btn btn-primary" onclick="updateValue()">บันทึกข้อมูล</button> --}}
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">id</p>
                            <p class="m-0 wp-70 text-dark">{{$myid}}</p>
                        </div>
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">จังหวัด</p>
                            <p class="m-0 wp-70 text-dark">{{$province}}</p>
                        </div>
                        <div class="col-md-12 d-flex mb-4">
                            <p class="m-0 wp-30 text-muted">ทำเลที่ตั้ง</p>
                            <p class="m-0 wp-70 text-dark">{{$description}}</p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer p-0 border-top-0">

                    <!-- Tabs -->
                    <div class="tabs-menu4 w-100">
                        <nav class="nav border-bottom px-4 d-block d-lg-flex flex-2">
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1 active" data-bs-toggle="tab" href="#task-files">
                                PDF ต้นฉบับ
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-landindex">
                                Word
                            </a>
                            <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-disclaim">
                                PDF แนบรายงาน
                            </a>
                            
                            
                        </nav>
                    </div><!-- /Tabs -->

                    <div class="tab-content w-100">
                        <div class="tab-pane active task-files-tab" id="task-files">
                            <div class="row">
                                <form action="{{route('dropzone.dz_storecityplanfiles')}}" method="POST" enctype="multipart/form-data" id="files-upload" class="dropzone">
									@csrf
									<input type="hidden" id="jobid" name="jobid" value={{$myid}}>
									<input type="hidden" id="mainfolder" name="mainfolder" value={{$mainfolder}}>
									<input type="hidden" id="subfolder" name="subfolder" value={{$subfolder}}>
                                    <input type="hidden" id="doc_type" name="doc_type" value="cityplan_pdf">
								</form>
                            </div>
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
                                                            <a href="{{ route('deletecityplanfile',[$myid,$job_img->file_name,"cityplan_pdf"]) }}"><i class="fe fe-trash delete-main text-muted"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane task-landindex-tab" id="task-landindex">
                            <div class="row">
                                <form action="{{route('dropzone.dz_storecityplanfiles')}}" method="POST" enctype="multipart/form-data" id="files-upload" class="dropzone">
									@csrf
									<input type="hidden" id="jobid" name="jobid" value={{$myid}}>
									<input type="hidden" id="mainfolder" name="mainfolder" value={{$mainfolder}}>
									<input type="hidden" id="subfolder" name="subfolder" value={{$subfolder}}>
                                    <input type="hidden" id="doc_type" name="doc_type" value="cityplan_word">
								</form>
                            </div>
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
                                            @if (!is_null($landindex))
                                                @foreach ($landindex as $job_img)
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
                                                            <a href="{{ route('deletecityplanfile',[$myid,$job_img->file_name,"cityplan_word"]) }}"><i class="fe fe-trash delete-main text-muted"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane" id="task-disclaim">
                           <div class="row">
                                <form action="{{route('dropzone.dz_storecityplanfiles')}}" method="POST" enctype="multipart/form-data" id="files-upload" class="dropzone">
									@csrf
									<input type="hidden" id="jobid" name="jobid" value={{$myid}}>
									<input type="hidden" id="mainfolder" name="mainfolder" value={{$mainfolder}}>
									<input type="hidden" id="subfolder" name="subfolder" value={{$subfolder}}>
                                     <input type="hidden" id="doc_type" name="doc_type" value="cityplan_print">
								</form>
                            </div>
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
                                            @if (!is_null($disclaim))
                                                @foreach ($disclaim as $job_img)
                                                    <tr>
                                                        <td>
                                                            <div class="recent-files">
                                                                <a data-bs-toggle="tooltip" data-bs-original-title="Open PDF" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank">
                                                                    @if (($job_img->file_type ?? '') === 'pdf')
                                                                        <img class="img-responsive br-5" src="{{asset('images/icons8-pdf-96.png')}}" width="24" height="24" alt="Thumb-1">                                
                                                                    @elseif (($job_img->file_type ?? '') === 'xlsx')
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
                                                            <a href="{{ route('deletecityplanfile',[$myid,$job_img->file_name,"cityplan_print"]) }}"><i class="fe fe-trash delete-main text-muted"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
    </div><!--TASK MODAL ENDS-->
