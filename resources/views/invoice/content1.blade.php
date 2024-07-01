<div class="horizontal-content">

						<div class="page-header">
							<h3 class="page-title"><i class="fe fe-home mr-1"></i>Invoice / Receipt</h3>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Employee Dashboard</li>
							</ol>
						</div>



						<div class="row">
							<div class="col-xl-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Invoice List </h3>
										
										<div class="card-options d-none d-sm-block">
											<div class="btn-group btn-sm">
												<form action="/invoicesearch" method="get">	
													<div class="input-group w-100 p-2">
														<input type="search" name="search" class="form-control " placeholder="Search....">
														<div class="input-group-append ">
															<button type="submit" class="btn btn-primary ">
																<i class="fas fa-search" aria-hidden="true"></i>
															</button>
														</div>
													</div>
												</form>

	
											</div>

										</div>
									</div>
									<div class="card-body">
										@if(Session::has('message'))
										    <div class="alert alert-success">{{Session::get('message')}}</div>
										 @endif
										<div class="table-responsive">
											<table class="table card-table table-vcenter  border text-nowrap">
												<thead>
													<tr>
														
														<th>Invoice No</th>
														<th>Invoice Date</th>
														<th>Customer</th>														
														<th>Discription</th>
														<th>Amount Job</th>
														<th>Receipt No</th>
														<th>Receipt Date</th>
														
														<th><a href="{{route('invoice.create')}}" class="btn btn-secondary btn-sm"><i class="fe fe-folder-plus "></i> Add</a></th>
													</tr>
												</thead>
												<tbody>
													@foreach($invoices as $invoice)
													<tr>
														<td>{{$invoice->invoiceno}}</td>
														<td><i class="mdi mdi-av-timer text-muted mr-1 num-font"></i>{{date('d-m-Y', strtotime($invoice->invoicedate))}}</td>
														<td>{{ Str::limit($invoice->customer, 15) }}</td>
														<td>{{ Str::substr($invoice->description, -27,27) }}</td>
														<td>{{$invoice->amountjob}}</td>
														<td>{{$invoice->receiptno}}</td>

														@if($invoice->receiptdate =='')         
														      <td></td>        
														@else
														      <td><i class="mdi mdi-av-timer text-muted mr-1 num-font"></i>{{date('d-m-Y', strtotime($invoice->receiptdate))}}</td>    
														@endif

														
														<td>
															<a href="{{route('invoice.edit',[$invoice->id])}}" class="mr-3" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fe fe-edit-2 text-dark fs-16"></i></a>
															<a href="{{route('print-invoice.show',[$invoice->id])}}" class="mr-3" data-toggle="tooltip" title="" data-original-title="Check"><i class="fe fe-file text-dark fs-16"></i></a>
															<a href="{{route('print-receipt.show',[$invoice->id])}}" class="mr-3" data-toggle="tooltip" title="" data-original-title="Check"><i class="fe fe-file text-dark fs-16"></i></a>
															<!--<a href="" class="mr-3" data-toggle="tooltip" title="" data-original-title="Folder"><i class="fe fe-folder-plus text-dark fs-16"></i></a> -->
															<a href="javascript:void(0)" class="mr-3" title="" data-original-title="Delete" data-toggle="modal" data-target="#exampleModal{{$invoice->id}}"><i class="fe fe-trash-2 text-dark fs-16"></i></a>

															<!-- Modal -->
									                        <div class="modal fade" id="exampleModal{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									                          <div class="modal-dialog" role="document">
									                            <div class="modal-content">
									                              <div class="modal-header">
									                                  <h5 class="modal-title" id="exampleModalLabel">Delete Invoice</h5>
									                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                                    <span aria-hidden="true">&times;</span>
									                                  </button>
									                              </div>
									                              <div class="modal-body">Do you want to delete {{$invoice->id}}?</div>                             
									                              <form action="{{route('invoice.delete')}}" method="POST">@csrf
									                                  <div class="modal-footer">
									                                      <input type="hidden" name="id" value="{{$invoice->id}}">
									                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									                                      <button type="submit" class="btn btn-danger">delete</button>
									                                  </div>
									                              </form>
									                            </div>
									                          </div>
									                        </div>
									                        <!-- End Modal -->

														</td>
													</tr>
													@endforeach											
												</tbody>
											</table>
										</div>
										{{ $invoices->links() }}
									</div>
								</div>
							</div>
						</div>
					</div>