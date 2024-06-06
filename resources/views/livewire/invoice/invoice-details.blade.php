@extends('layouts.app')

@section('styles')
    <style>
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 100px;
        }

        .signature-block {
            text-align: center;
        }

        .signature-block-left {
            text-align: left;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            width: 300px;
            margin-bottom: 5px;
        }

        .signature-line.short {
            width: 200px;
        }

        .signature-name {
            font-size: 16px;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            /* margin-top: 10px; */
        }

        .info-block {
            display: flex;
            align-items: baseline;
        }

        .info-topic {
            margin-right: 4px;
            font-size: 16px;
        }

        .info-line {
            border-bottom: 1px solid #000;
            width: 140px;
            /* width: 20%; */
            margin-bottom: 5px;
        }

        .info-line.long {
            width: 175px;
        }
    </style>
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <img src="../assets2/images/logo.png">
        </div>
        <div>
            <h1 class="page-title center fw-bold" style="margin-left: 20px; margin-top: 16px;">สำเนาใบแจ้งหนี้/ใบวางบิล</h1>
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
                            <h3 class="card-title">Date:
                                {{ Carbon\Carbon::parse($invoice->invoicedate)->thaidate('j M Y') }}
                            </h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-8 ">
                            <p class="h3">Invoice From:</p>
                            <address>
                                บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด<br>
                                370/6 อาคารแฟร์ ทาวน์เวอร์ ชั้น 2 ซอยสุขุมวิท 50<br>
                                ถนนสุขุมวิท แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10260<br><br>
                                สำนักงานใหญ่<br>
                                เลขประจำตัวผู้เสียภาษี 015547070351<br>
                                โทร : 0-2331-4580-2
                            </address>
                        </div>
                        <div class="col-lg-4 text-end">
                            <p class="h3">Customer:</p>
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
                                    {{-- <th>Item</th> --}}
                                    <th colspan="5" class="text-center">Description</th>
                                    {{-- <th class="text-end">Unit Price</th> --}}
                                    <th class="text-end">Sub Total</th>
                                </tr>
                                <tr>
                                    <td class="text-center">1.</td>
                                    <td colspan="5">
                                        <p class="font-w800 mb-1">ค่าบริการประเมินมูลค่าทรัพย์สิน</p>
                                        <div class="text-muted">
                                            <div class="text-muted">LC/63BF-1101 HLHO 630800328</div>
                                        </div>
                                    </td>
                                    {{-- <td class="text-center"> {{ $invoice->qty }}</td> --}}
                                    <td class="text-end"> {{ $invoice->amountjob }} ฿</td>
                                    {{-- <td class="text-end"> {{ $invoice->amountjob * $invoice->qty }} ฿</td> --}}
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td colspan="5">
                                        <p class="font-w800 mb-1">ค่าบริการประเมินมูลค่าทรัพย์สิน</p>
                                        <div class="text-muted">
                                            <div class="text-muted">LC/63BF-1101 HLHO 630800328</div>
                                        </div>
                                    </td>
                                    {{-- <td class="text-center">15</td> --}}
                                    <td class="text-end">1,600 ฿</td>
                                    {{-- <td class="text-end">฿6,400</td> --}}
                                </tr>
                                @php
                                    // php code in app/thaicounts.php to change number to thai counts
                                    $amount = $invoice->amountjob * 1.07;
                                    $thaiWords = bahtText($amount);
                                @endphp
                                <tr>
                                    <td class=""></td>
                                    <td colspan="4" width=76% rowspan="3"
                                        class="fw-bold text-uppercase text-center h5">
                                        ( {{ $thaiWords }} )</td>
                                    <td colspan="1" class="fw-bold text-uppercase text-end">Total</td>
                                    <td class="fw-bold text-end h5">{{ $invoice->amountjob }} ฿</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class=""></td>
                                    <td colspan="1" class="fw-bold text-uppercase text-end">Vat 7%</td>
                                    <td class="fw-bold text-end h5">{{ $invoice->amountjob * 0.07 }} ฿</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class=""></td>
                                    <td colspan="1" class="fw-bold text-uppercase text-end">Total + Vat</td>
                                    <td class="fw-bold text-end h5">{{ $amount }} ฿</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="signature-section">
                        <div class="signature-block" style="margin-left:3%">
                            <div class="signature-line"></div>
                            <div class="signature-name">ผู้รับวางบิล</div>
                        </div>
                        <div class="signature-block" style="margin-left:-10%">
                            <div class="signature-line short"></div>
                            <div class="signature-name">วันที่</div>
                        </div>
                        <div class="signature-block text-center" style="margin-right:3%">
                            <div class="signature-line"></div>
                            <div class="signature-name">แผนกบัญชี</div>
                        </div>
                    </div>
                    <hr>
                    <h4>Payment</h4>
                    <div class="info-section">
                        <div class="info-block">
                            <div class="info-topic">Cheque No.:</div>
                            <div class="info-line long"></div>
                        </div>
                        <div class="info-block">
                            <div class="info-topic">Bank:</div>
                            <div class="info-line"></div>
                        </div>
                        <div class="info-block">
                            <div class="info-topic">Date:</div>
                            <div class="info-line"></div>
                        </div>
                        <div class="info-block">
                            <div class="info-topic">Amount:</div>
                            <div class="info-line"></div>
                        </div>
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
