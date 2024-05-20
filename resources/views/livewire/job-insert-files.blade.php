@extends('layouts.app')

        @section('styles')

        @endsection

        @section('content')
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<div>
					<h1 class="page-title"></h1>
				</div>
				<div class="ms-auto pageheader-btn">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
					</ol>
				</div>
			</div>
			<!-- PAGE-HEADER END -->

			{{-- <form action="{{ route('uploadfile2s3',[$id,$jobcode,'docs']) }}" method="post"enctype="multipart/form-data">
    			@csrf --}}
				
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header border-bottom">
								{{-- <h1 class="card-title">File Upload</h1> --}}
								<div class="col-sm-8 mb-3">
									<select class="form-control select2 form-select" id="cboFolder" name="cboFolder" data-placeholder="Choose Folder"  onchange="getOption()">
										@if(isset($subfolder))
											@if($subfolder == 'APPENDIX')
												<option label="Choose one"></option>
												<option selected value="APPENDIX">APPENDIX</option>
												<option value="WORD">WORD</option>
												<option value="PDF">PDF</option>
												<option value="PHOTO">PHOTO</option>
											@elseif($subfolder == 'WORD')
												<option label="Choose one"></option>
												<option value="APPENDIX">APPENDIX</option>
												<option selected value="WORD">WORD</option>
												<option value="PDF">PDF</option>
												<option value="PHOTO">PHOTO</option>
											@elseif($subfolder == 'PDF')
												<option label="Choose one"></option>
												<option value="APPENDIX">APPENDIX</option>
												<option value="WORD">WORD</option>
												<option selected value="PDF">PDF</option>
												<option value="PHOTO">PHOTO</option>
											@elseif($subfolder == 'PHOTO')
												<option label="Choose one"></option>
												<option value="APPENDIX">APPENDIX</option>
												<option value="WORD">WORD</option>
												<option value="PDF">PDF</option>
												<option selected value="PHOTO">PHOTO</option>
											@else
												<option label="Choose one"></option>
												<option value="APPENDIX">APPENDIX</option>
												<option value="WORD">WORD</option>
												<option value="PDF">PDF</option>
												<option value="PHOTO">PHOTO</option>
											@endif
										@else
											<option label="Choose one"></option>
											<option value="APPENDIX">APPENDIX</option>
											<option value="WORD">WORD</option>
											<option value="PDF">PDF</option>
											<option value="PHOTO">PHOTO</option>
										@endif
									</select>
								</div>
							</div>
							<div class="card-body">
								
								<p class="mb-0 tx-16">Pictures Upload</p>
								<form action="{{route('dropzone.storefiles')}}" method="POST" enctype="multipart/form-data" id="files-upload" class="dropzone">
									@csrf
									<input type="hidden" id="jobid" name="jobid" value={{$id}}>
									<input type="hidden" id="jobcode" name="jobcode" value={{$jobcode}}>
									<input type="hidden" id="mainfolder" name="mainfolder" value={{$mainfolder}}>
									<input type="hidden" id="subfolder" name="subfolder" value={{$subfolder}}>
								</form>
								
							</div>
						</div>
					</div>
					{{-- <div>
        				<input class="btn btn-danger" type="submit">
    				</div> --}}
				</div>
				<!-- row closed -->

				{{-- row start --}}
				<div class="row">
					<div class="col-xl-12 ">
						<div class="card">
							<div class="card-header border-bottom">
								<p class="mb-0 tx-16">Recent Files</p>
							</div>
							<div class="card-body ">
								
								<div class="table-responsive">
								<button class="btn btn-primary" onclick="RefreshPage({{$id}})">Refesh Table</button>
								<button class="btn btn-primary" onclick="testcode()">test code</button>
									<table class="table  border text-nowrap text-md-nowrap recent-files-container">
										<thead>
											<tr class="row-first">
												<th>Image</th>
												<th>File Name</th>
												<th>Date Modified</th>
												<th>Size</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($job_imgs as $job_img)
												<tr>
													<td style="text-align: center; vertical-align: middle;">
													
														{{-- <img class="img-responsive br-5" src="https://laravel8.spruko.com/noa/assets/images/media/1.jpg" width="180" height="100" alt="Thumb-1"> --}}
														@if ($job_img->file_type == 'pdf')
															<a data-bs-toggle="tooltip" data-bs-original-title="Open PDF" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank">						
																{{-- <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16"> <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" fill="red"></path> <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" fill="red"></path> </svg> --}}
																<img class="img-responsive br-5" src="{{asset('images/icons8-pdf-96.png')}}" width="96" height="96" alt="Thumb-1">
															</a>
														@elseif ($job_img->file_type == 'xlsx')
															<a data-bs-toggle="tooltip" data-bs-original-title="Open Excel" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank">
																<img class="img-responsive br-5" src="{{asset('images/icons8-xls-96.png')}}" width="96" height="96" alt="Thumb-1">
															</a>
														@elseif ($job_img->file_type == 'docx')
															<a data-bs-toggle="tooltip" data-bs-original-title="Open Word" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank"> 
																<img class="img-responsive br-5" src="{{asset('images/icons8-microsoft-word-96.png')}}" width="96" height="96" alt="Thumb-1">
															</a>
														@elseif ($job_img->file_type == 'pptx')
															<a data-bs-toggle="tooltip" data-bs-original-title="Open Powerpoint" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank"> 
																<img class="img-responsive br-5" src="{{asset('images/icons8-microsoft-powerpoint-96.png')}}" width="96" height="96" alt="Thumb-1">
															</a>	
														@elseif ($job_img->file_type == 'vsdx')
															<a data-bs-toggle="tooltip" data-bs-original-title="Open Visio" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank"> 
																<img class="img-responsive br-5" src="{{asset('images/icons8-microsoft-visio-96.png')}}" width="96" height="96" alt="Thumb-1">
															</a>
														@else
															<a data-bs-toggle="tooltip" data-bs-original-title="Open Image" href="{{Storage::disk('s3')->url($job_img->file_path)}}" target="_blank">
																<img class="img-responsive br-5" src="{{Storage::disk('s3')->url($job_img->file_path)}}" width="180" height="110" alt="Thumb-1">
															</a>
														@endif
														
														
													</td>
													<td>
														<div class="recent-files">
															<svg class="file-manager-icon w-icn me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#b6dfff" d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z"/><path fill="#86cbff" d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z"/></svg>
															<span class="mb-1 font-weight-semibold">{{ $job_img->file_name }}</span>
														</div>
													</td>
													<td>
														<span>{{ $job_img->file_date }}</span>
													</td>
													<td>
														<span>{{ $job_img->file_size }}</span>
													</td>
													<td>
													
														<div class="float-end ms-auto">
															<a href="#" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
															<div class="dropdown-menu dropdown-menu-start recent-files-options">
																<a class="dropdown-item" href="#"><i class="fe fe-edit me-2"></i> Edit</a>
																<a class="dropdown-item" href="#"><i class="fe fe-share me-2"></i> Share</a>
																<a class="dropdown-item" href="#"><i class="fe fe-download me-2"></i> Download</a>
																<a class="dropdown-item" href="#"><i class="fe fe-info me-2"></i> Info</a>
																<a class="dropdown-item" href="{{ route('deletejobfile',[$id,$job_img->file_name]) }}"><i class="fe fe-trash me-2"></i> Delete</a>
															</div>
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- row closed --}}

			{{-- </form> --}}
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

		<script type="text/javascript">
			//var foldername = document.getElementById('cboFolder');
			//alert(foldername);
			new Dropzone('#files-upload',{
				acceptedFiles:".jpg,.png,.gif,.pdf,.docx,.docm,.xlsx,.xlsm,.pptx,.pptm,.vsd,.mp4,.zip,.mkv",
				init: function() {
					this.on("addedfile", file => {
      					var foldername = document.getElementById('cboFolder').value;
						if(foldername == ''){
							alert("Can not insert file. Please seclect target folder");
							this.removeAllFiles() ; 
						}
    				});
				}
			});
			

			//let myDropzone = Dropzone("#files-upload", { 
				/* options */
				//acceptedFiles:".pdf,.docx,.xlsx" 
			//});
			//addedfile  dragstart
			//myDropzone.on("addedfile", file => {
				//console.log("A file has been added");
			//});

		</script>

		

		<script>
			function RefreshPage(id) {
				$mainfolder = document.getElementById('mainfolder').value;
				$subfolder = document.getElementById('subfolder').value;
				window.location.href = '/editJobInsertFiles/' + id + '/' + $mainfolder + '/' + $subfolder;
			}
		</script>

		<script>
			function testcode() {
				window.location.href = '/testcode/';
			}
		</script>

		<script>
			function getOption() {
				document.getElementById('subfolder').value = document.getElementById('cboFolder').value;
				//console.log(document.getElementById('cboFolder').value);
			}
		</script>

		
        @endsection
