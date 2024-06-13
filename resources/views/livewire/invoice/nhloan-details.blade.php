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

        tr td {
            /* font-size: 17px; */
            overflow-wrap: break-word;
            /* line break if length exceeds width */
            white-space: normal;
            word-break: break-word;
            box-sizing: border-box;
        }

        tr td.text-left {
            box-sizing: border-box !important;
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
            .no-screen * {
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
            <p class="h3 page-title center fw-bold" style="margin-left: 20px; margin-top: 16px;">ใบเบิกค่าใช้จ่าย (Non-Housing
                Loan Site)</p>
            <p class="h3 page-title center fw-bold no-screen" style="margin-left: 20px; margin-top: 16px;">RECEIPT/TAX INVOICE
            </p>
            <p class="h3 page-title center fw-bold no-screen" style="margin-left: 20px; margin-top: 16px;">ต้นฉบับ
                (เอกสารออกเป็นชุด)</p>
        </div>
        <div class="ms-auto pageheader-btn no-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">NHLS {{ $invoice->invoiceno }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">NHLS Details</li>
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
                            <p class="h5 ms-4">วันที่เบิก :
                                {{ Carbon\Carbon::parse($invoice->invoicedate)->thaidate('j M Y') }}<br>
                                ชื่อผู้เบิก : สมหวัง เบิกบานใจ
                            </p>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                                <tr>
                                    <th class="text-center" width="30%">#</th>
                                    <th class="text-center" width="20%">1</th>
                                    <th class="text-center" width="20%">2</th>
                                    <th class="text-center" width="20%">3</th>
                                    <th class="text-center" width="20%">4</th>
                                </tr>
                                <tr>
                                    <td class="text-left">รายงานเลขที่</td>
                                    <td class="text-center">{{ $job->client }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">ชื่อลูกค้า</td>
                                    <td class="text-center">{{ $job->jobcode }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">ประเภททรัพย์สิน</td>
                                    <td class="text-center">{{ $job->prop_type }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">ที่ตั้ง</td>
                                    <td class="text-center">{{ $job->proplocation }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">วันที่สำรวจ</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($job->inspectiondate)->thaidate('j M Y') }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">โซน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">1. ค่าเดินทาง</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">2. ค่าช่างรื้อ</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">3. ค่าน้ำมัน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">4. ค่าทางด่วน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">5. ค่าที่พัก</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">6. ค่าเยี่ยมเสียม</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">7. ค่าเยี่ยมยาน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">8. ค่าเชิดโอนวดสิน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">9. ค่ารายงาน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">10. ค่าเอกสาร</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">11. ค่าจ้างเหมาตส่วน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">12. อื่นๆ</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">รวมทั้งสิ้น</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">หัก-เงินเบิกส่วนหน้า</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-left">คงเหลือ</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <hr class="thickhr">
                    <div class="print-bottom">
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
