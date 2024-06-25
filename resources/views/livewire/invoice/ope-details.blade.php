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
            width: 188px;
            /* width: 20%; */
            margin-bottom: 5px;
        }

        tr td {
            /* font-size: 17px; */
            overflow-wrap: break-word;
            /* line break if length exceeds width */
            white-space: normal;
            word-break: break-word;
            box-sizing: border-box;
        }

        tr td.text-on-left {
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
                height: 1210px;
            }

            tr td {
                font-size: 16px;
            }

            p.h5 {
                font-size: 20px;
            }

            .table-bordered,
            .table-bordered td,
            .table-bordered th {
                border: 1px solid #555 !important;
            }

            hr {
                height: 0px;
                border: none;
                border-top: 1px solid #333;
            }

            /*  */
            body {
                height: auto;
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            html,
            body {
                height: auto;
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

            .table-landscape {
                transform: rotate(270deg);
                transform-origin: top left;
                width: 74vh;
                max-width: 100vh;
                /* Use viewport height for width in landscape mode */
                height: 96vw;
                /* Use viewport width for height in landscape mode */
                overflow: visible;
                position: absolute;
                margin-top: 156px;
                top: 90%;
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
            <p class="h3 page-title center fw-bold" style="margin-left: 20px; margin-top: 16px;">
                ใบเบิกค่าจ่ายเช็คเอกสารสิทธิ์-กรมที่ดิน (สำหรับพนักงานเช็คโฉนด)</p>
        </div>
        <div class="ms-auto pageheader-btn no-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">HL {{ $invoice->invoiceno }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">HL Details</li>
            </ol>
        </div>

    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary mb-1 no-print"
                            onclick="window.location='{{ route('invoice.create') }}'"><i class="si si-plus"></i> Create
                            New</button>
                        <button type="button" class="btn btn-success mb-1 no-print"
                            onclick="window.location='{{ route('invoice.edit', ['id' => $invoice->id]) }}'"><i
                                class="si si-pencil"></i> Edit
                            HL</button>
                        <button type="button" id="print-button" class="btn btn-info mb-1 no-print"><i
                                class="si si-printer"></i> Print HL</button>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <p class="h5">วันที่เบิก : {{ Carbon\Carbon::parse($invoice->invoicedate)->thaidate('j M Y') }}
                        </p>
                        <p class="h5">ชื่อผู้เบิก : สมหวัง เบิกบานใจ </p>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                                <tr>
                                    <th class="text-center" width="16%">#</th>
                                    <th class="text-center" width="14%">1</th>
                                    <th class="text-center" width="14%">2</th>
                                    <th class="text-center" width="14%">3</th>
                                    <th class="text-center" width="14%">4</th>
                                    <th class="text-center" width="14%">5</th>
                                    <th class="text-center" width="14%">6</th>
                                    {{-- <th class="text-center" width="10%">7</th>
                                    <th class="text-center" width="10%">7</th> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">รายงานเลขที่</td>
                                    <td class="text-center">{{ $job->jobcode }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">123</td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">ชื่อลูกค้า</td>
                                    <td class="text-center">{{ $job->client }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">ประเภททรัพย์สิน</td>
                                    <td class="text-center">{{ $job->prop_type }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">ที่ตั้ง</td>
                                    <td class="text-center">{{ $job->proplocation }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">วันที่ตรวจสอบ</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($job->inspectiondate)->thaidate('j M Y') }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">ตรวจสอบ ณ สนง.ที่ดิน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">1. ค่าใช้จ่ายในการตรวจสอบโฉนดที่ดิน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">1.1 ฉ./อช. 2</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">1.2 สารบบที่ดิน (ขาย/จำนอง/ภาระจำยอม/อื่่น ๆ</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">1.3 ระวางที่ดิน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">1.4 อช.10 / อช. 13</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">123123123123123123121231233123123</td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">2. ค่าถ่ายเอกสาร</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">3. ค่าเดินทาง</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left">4. ค่าเบี้ยเลี้ยง (ตจว.)</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                                <tr>
                                    <td class="text-on-left"><b>รวมทั้งสิ้น</b></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    {{-- <td class="text-center"></td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="print-bottom">
                        <div class="signature-section no-screen">
                            <div class="signature-block" style="margin-left:0%">
                                <div class="signature-line"></div>
                                <div class="signature-name">ผู้รับเงิน</div>
                            </div>
                            <div class="signature-block" style="margin-left:0%">
                                <div class="signature-line"></div>
                                <div class="signature-name">หัวหน้างานอนุมัติ</div>
                            </div>
                            <div class="signature-block" style="margin-left:0%">
                                <div class="signature-line"></div>
                                <div class="signature-name">ผู้จ่ายเงิน</div>
                            </div>
                        </div>
                        {{-- <hr class="thickhr"> --}}
                        <div class="info-section no-screen mt-5">
                            <div class="info-block">
                                <div class="info-topic">Date:</div>
                                <div class="info-line"></div>
                            </div>
                            <div class="info-block">
                                <div class="info-topic">Date:</div>
                                <div class="info-line"></div>
                            </div>
                            <div class="info-block">
                                <div class="info-topic">Date:</div>
                                <div class="info-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
        </div>
        <!-- ROW-1 CLOSED -->
    @endsection
    @section('scripts')
        <script>
            document.getElementById('print-button').addEventListener('click', function() {
                window.scrollTo(0, 0); // Scroll to the top
                setTimeout(function() {
                    window.print(); // Open print dialog
                }, 200); // Delay to ensure scrolling happens first
            });
        </script>
    @endsection
