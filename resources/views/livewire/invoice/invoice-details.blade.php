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
            border-bottom: 1px solid #222;
            width: 231px;
            margin-bottom: 5px;
        }

        .signature-line.short {
            width: 182px;
        }

        .signature-line.long {
            width: 430px;
        }

        .signature-name {
            font-size: 17px;
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
            font-size: 17px;
        }

        .info-line {
            border-bottom: 1px solid #333;
            width: 140px;
            /* width: 20%; */
            margin-bottom: 5px;
        }

        .info-line.long {
            width: 140px;
        }

        @media print {

            .no-print,
            .no-print *,
            #back-to-top {
                display: none !important;
            }

            .content {
                page-break-before: always;
                position: relative;
            }

            .header-space {
                /* height: 0; */
                /* Adjust as needed to remove extra space */
                margin: 0;
                padding: 0;
            }

            .page-header {
                margin: 0;
                padding: 0;
            }

            .card-body {
                height: 1040px;
            }

            address {
                font-size: 17px;
            }

            tr td p,
            tr td div .text-muted {
                font-size: 17px;
                overflow-wrap: break-word;
                /* line break if length exceeds width */
                white-space: normal;
                word-break: break-word;
            }

            tr td {
                font-size: 17px;
            }

            tr td .text-end,
            tr td.thai-totalAmount {
                font-size: 21px;
            }

            tr th.text-center,
            tr th.text-end {
                font-size: 18px;
            }

            .table-bordered,
            .table-bordered td,
            .table-bordered th {
                border: 1px solid #333 !important;
            }

            hr {
                height: 0px;
                border: none;
                border-top: 1px solid #333;
            }

            hr.thickhr {
                border-top: 1.6px solid #333;
            }

            /*  */
            body,
            html {
                height: auto;
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            .page {
                width: 100%;
                height: 100%;
                overflow: hidden;
                /* Ensure content does not overflow */
            }

            /* Resetting margins and paddings for all elements */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Header specific adjustments */
            .page-header,
            .page-footer {
                /* position: fixed; */
                left: 0;
                width: 100%;
            }

            .page-header {
                top: 0;
            }

            .page-footer {
                bottom: 0;
            }

            /* Avoid page breaks within the content */
            .content {
                page-break-inside: avoid !important;
            }

        }

        @page {
            margin-top: -30px;
        }

        @media screen {

            .no-screen,
            .no-screen *,
            {
            display: none !important;
        }
        }
    </style>
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header header-space">
        <div class="no-screen">
            <img src="../assets2/images/logo.png">
        </div>
        <div class="text-center">
            <p class="h3 page-title center fw-bold" style="margin-left: 20px; margin-top: 16px;">สำเนาใบแจ้งหนี้/ใบวางบิล</p>
            <p class="h3 page-title center fw-bold no-screen" style="margin-left: 20px; margin-top: 16px;">RECEIPT/TAX INVOICE
            </p>
            <p class="h3 page-title center fw-bold no-screen" style="margin-left: 20px; margin-top: 16px;">ต้นฉบับ
                (เอกสารออกเป็นชุด)</p>
        </div>
        <div class="ms-auto pageheader-btn no-print">
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
                    <hr>
                    <div class="row mb-6">
                        <div class="col-sm-8">
                            <address>
                                <b>บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด</b><br>
                                370/6 อาคารแฟร์ ทาวน์เวอร์ ชั้น 2 ซอยสุขุมวิท 50<br>
                                ถนนสุขุมวิท แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10260<br>
                                <b>สำนักงานใหญ่</b> เลขประจำตัวผู้เสียภาษี 015547070351<br>
                                โทร : 0-2331-4580-2<br>
                                www.landmarkcon.net
                            </address>
                        </div>
                        <div class="col-sm-4 text-end">
                            <p class="h4 card-title text-end mb-2">#INV-{{ $invoice->invoiceno }}</p>
                            <p class="h4 card-title text-end mb-4">Date:
                                {{ Carbon\Carbon::parse($invoice->invoicedate)->thaidate('j M Y') }}
                            </p>
                        </div>
                        <div class="col-sm-10">
                            <p class="h4">ลูกค้า:</p>
                            <address>
                                {{ $invoice->customer }}<br>
                                {{ $invoice->address }}<br>
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                                <tr class=" ">
                                    <th class="text-center">#</th>
                                    <th colspan="5" class="text-center">Item</th>
                                    <th class="text-end">Amount (Baht)</th>
                                </tr>
                                @php
                                    // php code in app/thaicounts.php to change number to thai counts
                                    //if error run composer dump-autoload
                                    $totalAmount = round($invoice->amountjob * 1.07, 2);
                                    $thaiWords = bahtText($totalAmount);
                                @endphp
                                <tr>
                                    <td class="text-center">1.</td>
                                    <td colspan="5">
                                        <p class="font-w800 mb-1">ค่าบริการประเมินมูลค่าทรัพย์สิน</p>
                                        <div class="text-muted">
                                            <div class="text-muted">{{ Str::substr($invoice->description, 31) }}</div>
                                        </div>
                                    </td>
                                    <td class="text-end"> {{ number_format($invoice->amountjob, 2, '.', ',') }} </td>
                                </tr>
                                {{-- <tr>
                                    <td class="text-center">2.</td>
                                    <td colspan="5">
                                        <p class="font-w800 mb-1">ค่าบริการประเมินมูลค่าทรัพย์สิน</p>
                                        <div class="text-muted">
                                            <div class="text-muted">LC/63BF-1101 HLHO 630800328</div>
                                        </div>
                                    </td>
                                    <td class="text-end">1,600</td>
                                </tr> --}}
                                <tr>
                                    <td rowspan ="3"></td>
                                    <td colspan="4" width=76% rowspan="3"
                                        class="fw-bold text-uppercase text-center h4 thai-totalAmount">
                                        ( {{ $thaiWords }} )</td>
                                    <td colspan="1" class="fw-bold text-uppercase text-end">Sub Total</td>
                                    <td class="fw-bold text-end h5">
                                        {{ number_format($invoice->amountjob, 2, '.', ',') }}
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="1" class="fw-bold text-uppercase text-end">Vat 7%</td>
                                    <td class="fw-bold text-end h5">
                                        {{ number_format($invoice->amountjob * 0.07, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="fw-bold text-uppercase text-end">Total</td>
                                    <td class="fw-bold text-end h5">{{ number_format($totalAmount, 2, '.', ',') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <hr class="thickhr">
                    <div class="print-bottom">
                        <div class="text-end mr-6" style="margin-right:62px;">
                            <p class="h3" style="font-size:20px;">บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด</p>
                        </div>
                        <div class="signature-section no-screen">
                            <div class="signature-block" style="margin-left:0%">
                                <div class="signature-line"></div>
                                <div class="signature-name">ผู้รับวางบิล</div>
                            </div>
                            <div class="signature-block" style="margin-left:0%">
                                <div class="signature-line short"></div>
                                <div class="signature-name">วันที่</div>
                            </div>
                            <div class="signature-block text-center" style="margin-right:0%">
                                <div class="signature-line long"></div>
                                <div class="signature-name">แผนกบัญชี</div>
                            </div>
                        </div>
                        <hr class="thickhr">
                        <h4 class="mb-2 text-start">Payment</h4>
                        <div class="info-section no-screen">
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
                    <button type="button" class="btn btn-primary mb-1 no-print" onclick="javascript:window.print();"><i
                            class="si si-wallet"></i> Pay Invoice</button>
                    <button type="button" class="btn btn-success mb-1 no-print" onclick="javascript:window.print();"><i
                            class="si si-paper-plane"></i> Send Invoice</button>
                    <button type="button" class="btn btn-info mb-1 no-print" onclick="javascript:window.print();"><i
                            class="si si-printer"></i> Print Invoice</button>
                </div>
            </div><!-- COL-END -->
        </div>
        <!-- ROW-1 CLOSED -->
    @endsection
    @section('scripts')
    @endsection
