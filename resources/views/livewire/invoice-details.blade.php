@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">สำเนาใบแจ้งหนี้/ใบวางบิล</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Invoices {{ $invoice->invoiceno }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-start">
                            <h3 class="card-title mb-0">#INV-{{ $invoice->invoiceno }}</h3>
                        </div>
                        <div class="float-end">
                            <h3 class="card-title">Date: {{ $invoice->invoicedate }}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-8 ">
                            <p class="h3">Invoice From:</p>
                            <address>
                                บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด<br>
                                370/6 อาคารแฟร์ ทาวน์เวอร์ ชั้น 2 ซอยสุขุมวิท 50<br>
                                ถนนสุขุมวิท แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10260<br>
                                invoice@spruko.com
                            </address>
                        </div>
                        <div class="col-lg-4 text-end">
                            <p class="h3">Invoice To:</p>
                            <address>
                                {{ $invoice->customer }}<br>
                                {{ $invoice->address }}<br>
                                invoice@spruko.com
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                                <tr class=" ">
                                    <th class="text-center"></th>
                                    <th>Item</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Sub Total</th>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>
                                        <p class="font-w600 mb-1">ค่าบริการประเมินมูลค่าทรัพย์สิน</p>
                                        <div class="text-muted">
                                            <div class="text-muted">LC/63BF-1101 HLHO 630800328</div>
                                        </div>
                                    </td>
                                    <td class="text-center"> {{ $invoice->qty }}</td>
                                    <td class="text-end"> {{ $invoice->amountjob }} ฿</td>
                                    <td class="text-end"> {{ $invoice->amountjob * $invoice->qty }} ฿</td>
                                </tr>
                                {{-- <tr>
                                    <td class="text-center">2</td>
                                    <td>
                                        <p class="font-w600 mb-1">ค่าบริการประเมินมูลค่าทรัพย์สิน</p>
                                        <div class="text-muted">LC/63BF-1101 HLHO 630800328</div>
                                    </td>
                                    <td class="text-center">15</td>
                                    <td class="text-end">฿1,600</td>
                                    <td class="text-end">฿6,400</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>
                                        <p class="font-w600 mb-1">Design and layout of 2 pages in Photoshop</p>
                                        <div class="text-muted">Dolor in reprehenderit Duis in voluptate aute irure nulla
                                            esse cillum dolore eu fugiat pariatur velit</div>
                                    </td>
                                    <td class="text-center">14</td>
                                    <td class="text-end">฿530</td>
                                    <td class="text-end">฿1,060</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>
                                        <p class="font-w600 mb-1">Logo Design</p>
                                        <div class="text-muted">Lorem ipsum dolor dignissimos, consectetur irure nulla esse
                                            cillum adipiscing elit, sed do eiusmod</div>
                                    </td>
                                    <td class="text-center">5</td>
                                    <td class="text-end">฿820</td>
                                    <td class="text-end">฿2,460</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>
                                        <p class="font-w600 mb-1">PSD to HTML coding</p>
                                        <div class="text-muted">voluptate aute irure nulla sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore</div>
                                    </td>
                                    <td class="text-center">24</td>
                                    <td class="text-end">฿630</td>
                                    <td class="text-end">฿1,890</td>
                                </tr> --}}
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end">Total</td>
                                    <td class="fw-bold text-end h4">{{ $invoice->amountjob * $invoice->qty }} ฿</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i
                            class="si si-wallet"></i> Pay Invoice</button>
                    <button type="button" class="btn btn-success mb-1" onclick="javascript:window.print();"><i
                            class="si si-paper-plane"></i> Send Invoice</button>
                    <button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i
                            class="si si-printer"></i> Print Invoice</button>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
@endsection
