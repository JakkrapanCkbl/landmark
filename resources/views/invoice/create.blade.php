<!doctype html>
<html lang="en" dir="ltr">
	<head>
		
		@include('invoice.head')

	

	</head>

	<body class="app">

		<!-- Global Loader-->
		<div id="global-loader"><img src="{{asset('external2/images/svgs/loader.svg')}}" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				@include('invoice.nav')

				@include('invoice.menubar')
				
				<div class="container content-area">
					<div class="container">
						<div class="row">
							
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										Add Invoice
									</div>
									<div class="card-body">
										<form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">@csrf

											<div class="form-group">
												<label>รหัสใบแจ้งหนี้</label>
												<input type="text" id="invoiceno" name="invoiceno" class="form-control{{ $errors->has('invoiceno') ? ' is-invalid' : '' }}" 
												value="{{ old('invoiceno') }}">
												  @if ($errors->has('invoiceno'))
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $errors->first('invoiceno') }}</strong>                                       
					                                    </span>
					                                @endif
											</div>

											<div class="form-group">
							<label>วันที่ใบแจ้งหนี้</label>
							<div class="input-group">												
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-calendar tx-16 lh-0 op-6"></i>
									</div>
								</div>
								<input id="invoicedate" name="invoicedate" class="form-control fc-datepicker" placeholder="y-m-d" type="text" value = "{{ date('y-m-d') }}">
							</div>	
						</div>

						<div class="form-group">
							<label>ลูกค้า</label>
							<input type="text" id="customer" name="customer" class="form-control{{ $errors->has('customer') ? ' is-invalid' : '' }}" 
							value="{{ old('customer') }}">
							  @if ($errors->has('customer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer') }}</strong>                                       
                                    </span>
                                @endif
						</div>

						<div class="form-group">
							<label>ที่อยู่</label>
							<input type="text" id="address" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
							value="{{ old('address') }}">
							  @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						
						<div class="form-group">
							<label>รายการ</label>
							<input type="text" id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
							value="{{ old('description') }}">
							  @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>จำนวน</label>
							<input type="text" id="qty" name="qty" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" 
							value="1">
							  @if ($errors->has('qty'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qty') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>ค่า fee</label>
							<input type="text" id="amountjob" name="amountjob" class="form-control{{ $errors->has('amountjob') ? ' is-invalid' : '' }}" 
							value="3000">
							  @if ($errors->has('amountjob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amountjob') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>หมายเหตุ</label>
							<input type="text" id="remark" name="remark" class="form-control{{ $errors->has('remark') ? ' is-invalid' : '' }}" 
							value="{{ old('remark') }}">
							  @if ($errors->has('remark'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('remark') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						

						<div class="form-group">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>


										</form>
									</div>
							</div>
						</div>
						</div>
					</div>
					{{csrf_field()}}








@include('invoice.footer')