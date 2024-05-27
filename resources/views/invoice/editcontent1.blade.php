<div class="container">
	@if(Session::has('message'))
		<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif
	<div class="row">
		<!--<div class="col-md-2">
		  	
		</div>-->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Edit Invoice
				</div>
				<div class="card-body">

					<form action="{{route('invoice.update',[$invoice->id])}}" method="POST" enctype="multipart/form-data">@csrf
						<div class="form-group">
							<label>รหัสใบแจ้งหนี้</label>
							<input type="text" name="invoiceno" class="form-control{{ $errors->has('invoiceno') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->invoiceno }}">
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
								<input name="invoicedate" class="form-control fc-datepicker" placeholder="y-m-d" type="text" value = "{{date('y-m-d', strtotime($invoice->invoicedate))}}">
							</div>	
						</div>

						<div class="form-group">
							<label>ลูกค้า</label>
							<input type="text" name="customer" class="form-control{{ $errors->has('customer') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->customer }}">
							  @if ($errors->has('customer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer') }}</strong>                                       
                                    </span>
                                @endif
						</div>

						<div class="form-group">
							<label>ที่อยู่</label>
							<input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->address }}">
							  @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						
						<div class="form-group">
							<label>รายการ</label>
							<input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->description }}">
							  @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>จำนวน</label>
							<input type="text" name="qty" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->qty }}">
							  @if ($errors->has('qty'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qty') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>ค่า fee</label>
							<input type="text" name="amountjob" class="form-control{{ $errors->has('amountjob') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->amountjob }}">
							  @if ($errors->has('amountjob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amountjob') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>หมายเหตุ</label>
							<input type="text" name="remark" class="form-control{{ $errors->has('remark') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->remark }}">
							  @if ($errors->has('remark'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('remark') }}</strong>                                       
                                    </span>
                                @endif
						</div>
						<div class="form-group">
							<label>รหัสใบเสร็จรับเงิน</label>
							<input type="text" name="receiptno" class="form-control{{ $errors->has('receiptno') ? ' is-invalid' : '' }}" 
							value="{{ $invoice->receiptno }}">
							  @if ($errors->has('receiptno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('receiptno') }}</strong>                                       
                                    </span>
                                @endif
						</div>

						<div class="form-group">
							<label>วันที่ใบเสร็จรับเงิน</label>
							<div class="input-group">												
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-calendar tx-16 lh-0 op-6"></i>
									</div>
								</div>
								<input name="receiptdate" class="form-control fc-datepicker" placeholder="y-m-d" type="text" value = "{{date('y-m-d', strtotime($invoice->receiptdate))}}">
							</div>	
						</div>


						<div class="form-group">
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
		</div>
	</div>
	</div>
</div>
{{csrf_field()}}