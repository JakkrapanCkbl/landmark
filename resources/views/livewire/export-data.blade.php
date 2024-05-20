
<!-- ROW-1 -->
<div class="col-12 col-sm-12">
    <div class="card product-sales-main">
        <div class="card-header border-bottom">
            
            <button type="button" class="btn btn-primary" onclick="location.href='#';">Excel</button>
        </div>
        <div class="card-body">
            <div class="table-responsive export-table">
                <table id="data-table1" class="table text-nowrap mb-0 table-bordered w-100">
                    <thead class="table-head">
                        <tr>
                            <th class="bg-transparent border-bottom-0">ลูกค้า</th>
                            <th class="bg-transparent border-bottom-0">รหัสงาน</th>
                            <th class="bg-transparent border-bottom-0">รหัสรายงานลูกค้า</th>
                            <th class="bg-transparent border-bottom-0">โครงการ / ที่ตั้ง</th>
                            <th class="bg-transparent border-bottom-0">ปรเภท</th>
                            <th class="bg-transparent border-bottom-0">เนื้อที่</th>
                            <th class="bg-transparent border-bottom-0">รับงาน</th>
                            <th class="bg-transparent border-bottom-0">สำรวจ</th>
                            <th class="bg-transparent border-bottom-0">ส่งงาน LC</th>
                            <th class="bg-transparent border-bottom-0">ส่งงานลูกค้า</th>
                            <th class="bg-transparent border-bottom-0">ผู้ประเมิน</th>
                            <th class="bg-transparent border-bottom-0">ผู้ตรวจ</th>
                            <th class="bg-transparent border-bottom-0">สถานะ</th>
                            <th class="bg-transparent border-bottom-0 no-btn"></th>
                        </tr>
                    </thead>
                    
                    <tbody class="table-body">
                        @foreach ($jobs as $job)   
                        <tr>
                            
                            @if($job->client == 'UOB')
                                    <td class="text-center">
                                    <img alt="avatar" class="rounded-circle" src="{{asset('storage/bank/48x48/uob.png')}}">
                                </td>
                            @elseif($job->client == 'KK')
                                <td class="text-center">
                                    <img alt="avatar" class="rounded-circle" src="{{asset('storage/bank/48x48/kk.png')}}">
                                </td>
                            @else
                                <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->customer }}">{{ Str::limit($job->customer, 15) }}</td>
                            @endif
                            
                            {{-- <td class="text-muted fs-13"><a href="{{ url('/job/' . $job->id . '/edit') }}">{{ $job->jobcode }}</a></td> --}}
                            <td class="text-muted fs-13"><a href="{{ App\Http\Controllers\JobController::getS3FileWithDefault( $job->id,'pdf') }}">{{ $job->jobcode }}</a></td>
                            {{-- <td>
                                <div class="d-flex align-items-center">
                                    <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('assets/images/users/11.jpg')}})"></span>
                                    <div class="user-details ms-2">
                                        <h6 class="mb-0">Skyler Hilda</h6>
                                        <span class="text-muted fs-12">member@spruko.com</span>
                                    </div>
                                </div>
                            </td> --}}
                            <td class="text-muted fs-13"><p class="mb-0 text-muted">{{ $job->reportcode }}</p></td>
                            <td class="text-muted fs-14 fw-semibold" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }}<br>{{ $job->proplocation }}"><a href="#" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" >{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,30) }}</a></td>
                            {{-- <td class="text-muted fs-13"><a href="{{url('project-details')}}" class="text-dark">Noa Dashboard UI</a></td> --}}
                            <td class="text-muted fs-13"><p class="mb-0 text-muted">{{ $job->prop_type }}</p></td>
                            <td class="text-muted fs-13"><p class="mb-0 text-muted">{{ $job->prop_size }}</p></td>
                            <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}</td>
                            <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->inspectiondate)->thaidate('D j M y') }}</td>
                            <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->lcduedate)->thaidate('D j M y') }}</td>
                            <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}</td>
                            <td class="text-center">
                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/srp.jpg')}})"></span> 
                            </td>
                            <td class="text-center">
                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mkc.jpg')}})"></span>  
                            </td>
                            <td>
                                <div class="form-group mb-0">
                                    <ul>
                                        <li class="select-status">
                                            <select class="form-control select2-status-search" data-placeholder="Select Status">
                                                {{-- <option value="IP" selected>In Progress</option>
                                                <option value="OH">On Hold</option>
                                                <option value="CP">Completed</option>
                                                <option value="CL">Canceled</option> --}}

                                                {{-- <option value="In Progress" selected>In Progress</option>
                                                <option value="On Hold">On Hold</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Canceled">Cancel</option> --}}

                                                <option value="In Progress" {{$job->job_status=='In Progress'?'selected':''}}>In Progress</option>
                                                <option value="Completed" {{$job->job_status=='Completed'?'selected':''}}>Completed</option>
                                                <option value="On Hold" {{$job->job_status=='On Hold'?'selected':''}}>On Hold</option>
                                                <option value="Cancel" {{$job->job_status=='Cancel'?'selected':''}}>Cancel</option>

                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-stretch">
                                    <a href="#" class="border br-5 px-2 py-1 d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                    
                                    <div class="dropdown-menu dropdown-menu-start">
                                        <a class="dropdown-item" href="{{ url('/job/' . $job->id . '/edit') }}"><i class="icon icon-pencil"></i>&nbsp;Edit Assign Job</a>
                                        <a class="dropdown-item" href="{{ url('/editJobInsertFiles/' . $job->id . '/working_files/APPENDIX')}}"><i class="fa fa-file-pdf-o me-2"></i>Insert File</a>
                                        {{-- <a class="dropdown-item" href="{{ url('/editJobInsertPdf/' . $job->id )}}"><i class="fa fa-file-pdf-o me-2"></i>Insert File</a> --}}
                                        {{-- <a class="dropdown-item" href="#"><i class="fa fa-file-image-o me-2"></i>...</a> --}}
                                    </div>
                                    <p>&nbsp;</p>
                                    <a class="btn btn-sm btn-outline-info border me-2" href="{{ url('/projectmaster') }}" data-bs-toggle="tooltip" data-bs-original-title="Project Detail">
                                        <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16"> <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" fill="green"></path> </svg>
                                    </a>
                                    <a class="btn btn-sm btn-outline-info border me-2" href="{{ url('/editJobInsertFiles/' . $job->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Report Template">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none" /><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z" /></svg> --}}
                                        <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16"> <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" fill="blue"></path> </svg>
                                    </a>
                                    <a class="btn btn-sm btn-outline-info border me-2" href="{{ url('/editJobInsertFiles/' . $job->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Final Report">
                                        <svg style="color: purple" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16"> <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" fill="purple"></path> </svg>
                                    </a>
                                        {{-- <a class="btn btn-sm btn-outline-primary border me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit" href="{{ url('/job/' . $job->id . '/edit') }}"> --}}
                                        {{-- <svg  xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20" width="16" viewBox="0 0 24 24"><path d="M15.8085327,8.6464844l-5.6464233,5.6464844l-2.4707031-2.4697266c-0.0023804-0.0023804-0.0047607-0.0047607-0.0072021-0.0071411c-0.1972046-0.1932373-0.5137329-0.1900635-0.7069702,0.0071411c-0.1932983,0.1972656-0.1900635,0.5137939,0.0071411,0.7070312l2.8242188,2.8232422C9.9022217,15.4474487,10.02948,15.5001831,10.1621094,15.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l6-6c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1972046,0.1900635-0.5137329-0.0071411-0.7069702C16.3183594,8.446106,16.0018311,8.4493408,15.8085327,8.6464844z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg> --}}
                                        {{-- pdf icon --}}
                                        {{-- <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16"> <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" fill="red"></path> <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" fill="red"></path> </svg> --}}
                                        {{-- <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" width="16" height="16" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .hatch_een{fill:#000000;} .hatch_twee{fill:#000000;} </style> <g> <path class="hatch_twee" d="M25.481,8.796l0.707,0.707l-16.62,16.62L8.86,25.416L25.481,8.796z M24.188,7.503l-0.707-0.707 L6.86,23.416l0.707,0.707L24.188,7.503z"></path> <path class="hatch_een" d="M31.067,6.721c-0.05-0.121-0.123-0.233-0.217-0.327l-4.243-4.243c-0.188-0.188-0.442-0.293-0.707-0.293 c-0.265,0-0.52,0.105-0.707,0.293L4.686,22.657c-0.119,0.119-0.193,0.25-0.209,0.362c-0.019,0.032-1.469,5.76-1.469,5.76 c-0.085,0.341,0.015,0.701,0.263,0.95c0.19,0.19,0.445,0.293,0.707,0.293c0.081,0,5.899-1.444,5.899-1.444 c0.033-0.008,0.148-0.057,0.175-0.069c0.106-0.049,0.289-0.192,0.29-0.194L30.849,7.808c0.094-0.094,0.168-0.206,0.217-0.327 C31.166,7.237,31.166,6.964,31.067,6.721z M25.899,2.858L30.142,7.1l-2.471,2.471l-4.243-4.243L25.899,2.858z M3.979,29.021 l0.424-1.697l1.273,1.273L3.979,29.021z M6.808,28.314l-2.122-2.121l0.707-2.829l4.243,4.243L6.808,28.314z M10.343,26.899 l-4.243-4.243l16.62-16.62l4.243,4.243L10.343,26.899z"></path> </g> </g></svg> --}}
                                        {{-- <i class="fe fe-edit"></i> --}}
                                    {{-- </a> --}}
                                    
                                </div>
                            </td>
                        </tr>                                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- COL END -->
<!-- ROW-1 END -->



