@extends('layouts.app')

@section('styles')
    <style>
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

            address,
            label,
            tr td {
                font-size: 17px;
            }

            input.form-check-input {
                border: 0.6px solid #333;
                width: 1.3rem;
                height: 1.3rem;
            }

            img.img-fluid {
                max-width: 60px !important;
                max-height: 90px !important;
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

        .table td {
            vertical-align: top;
        }

        .value-cell {
            text-indent: -1em;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .value-cell::before {
            content: '\00a0';
            /* Adds a non-breaking space at the start of the line */
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
            <p class="h3 page-title center fw-bold" style="margin-left: 20px; margin-top: 16px;">Order For Service</p>
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
                    <div class="text-end">
                        <button type="button" class="btn btn-primary mb-1 no-print"
                            onclick="window.location='{{ route('invoice.create') }}'"><i class="si si-plus"></i> Create
                            New</button>
                        <button type="button" class="btn btn-success mb-1 no-print"
                            onclick="window.location='{{ route('invoice.edit', ['id' => $invoice->id]) }}'"><i
                                class="si si-pencil"></i> Edit
                            Invoice</button>
                        <button type="button" class="btn btn-info mb-1 no-print" id="print-button""><i
                                class="si si-printer"></i> Print Invoice</button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <address class="fw-bold">รายงานเลขที่ : <u>{{ $job->jobcode }}</u><br>
                                รายงานภาษา : <u>ไทย</u></address>
                            <br>
                            <br>
                            <address class="h4 fw-bold">1. ชื่อที่ระบุไว้ในรายงาน </address>
                        </div>
                        {{-- <div class="col-sm-3">
                            <p>รายงานภาษา : </p>
                        </div> --}}
                        <div class="col-sm-4">
                            <address class="fw-bold">วันที่สำรวจ :
                                <u>{{ \Carbon\Carbon::parse($job->inspectiondate)->thaidate('d M Y') }}</u><br>
                                วันที่ส่งรายงาน LC :
                                <u>{{ \Carbon\Carbon::parse($job->inspectiondate)->thaidate('d M Y') }}</u>
                            </address>
                            <br>
                            <br>
                            <address class="h4 fw-bold text-end" style="margin-right:102px;">ชื่อลูกค้า/ผู้ว่าจ้าง
                            </address>
                        </div>
                        <div class="col-sm-3 text-end">
                            <div class="row">
                                <div class="col-sm-12">
                                    <address class="text-end">วันที่ :
                                        {{ \Carbon\Carbon::parse($job->inspectiondate)->thaidate('d M Y') }}</address>
                                </div>

                                {{-- <div class="col-sm-4">
                                </div> --}}
                                <div class="col-sm-6 text-end">
                                    <img src="{{ URL::asset('/images/icons8-pdf-96.png') }}" class="img-fluid ms-4"
                                        alt="profile Pic">
                                    <address class="me-1">ผู้ตรวจ</address>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <img src="{{ URL::asset('/images/icons8-xls-96.png') }}" class="img-fluid float-right"
                                        alt="profile Pic">
                                    <address class="">ผู้ประเมิน</address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            {{-- <address class="h3">ชื่อที่ระบุไว้ในรายงาน </address> --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>ชื่อ</td>
                                                    <td class="value-cell">: {{ $job->client }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ที่อยู่</td>
                                                    <td class="value-cell">: {{ $job->proplocation }}</td>
                                                </tr>
                                                <tr>
                                                    <td>เรียน</td>
                                                    <td class="value-cell">: {{ $job->client }}</td>
                                                </tr>
                                                <tr>
                                                    <td>โทร</td>
                                                    <td class="value-cell">: {{ $job->customer_tel }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            {{-- <address class="h3">ชื่อลูกค้า/ผู้ว่าจ้าง</address> --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>ชื่อ</td>
                                                    <td class="value-cell">: {{ $job->client }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ที่อยู่</td>
                                                    <td class="value-cell">: {{ $job->proplocation }}</td>
                                                </tr>
                                                <tr>
                                                    <td>เรียน</td>
                                                    <td class="value-cell">: {{ $job->client }}</td>
                                                </tr>
                                                <tr>
                                                    <td>โทร</td>
                                                    <td class="value-cell">: {{ $job->customer_tel }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <address class="h4 fw-bold mt-4">2. ทรัพย์สินที่ประเมิน</address>
                            <address class="mt-4 ms-3">ที่ตั้ง : {{ $job->proplocation }}</address>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12 mt-4">
                                <address class="h4 fw-bold mt-2">3. เอกสารประกอยการประเมินมูลค่าทรัพย์สินที่ได้รับจากลูกค้า
                                </address>
                                <div class="form-check form-check-inline mt-4">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                                    <label class="form-check-label" for="inlineCheckbox1">โฉนด/อช.2</label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left: 38.4px;">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2">
                                    <label class="form-check-label" for="inlineCheckbox2">เล่มรายงานประเมินเดิม</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3">
                                    <label class="form-check-label" for="inlineCheckbox3">แบบแปลนอาคาร</label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left: 61.8px;">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4">
                                    <label class="form-check-label" for="inlineCheckbox4">ผังบริเวณ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5">
                                    <label class="form-check-label" for="inlineCheckbox5">ใบอนุญาตก่อสร้าง</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6">
                                    <label class="form-check-label" for="inlineCheckbox6">BOQ</label>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7">
                                    <label class="form-check-label" for="inlineCheckbox7">โบรชัวร์โครงการ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox8">
                                    <label class="form-check-label" for="inlineCheckbox8">รายละเอียดโครงการ</label>
                                </div>
                                <div class="form-check form-check-inline" style="margin-left: 16px;">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox9">
                                    <label class="form-check-label" for="inlineCheckbox9">Profit & Loss Statement</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox10">
                                    <label class="form-check-label"
                                        for="inlineCheckbox10">ใบอนุญาตประกอบกิจการโรงแรม/โรงงาน
                                        (รง.4)</label>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">โฉนด/อช.2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox7"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox7">โบรชัวร์โครงการ</label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option1">
                                            <label class="form-check-label"
                                                for="inlineCheckbox2">เล่มรายงานประเมินเดิม</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox8"
                                                value="option1">
                                            <label class="form-check-label"
                                                for="inlineCheckbox8">รายละเอียดโครงการ</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox3">แบบแปลนอาคาร</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox9"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox9">Profit & Loss
                                                Statement</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox4">ผังบริเวณ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox5"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox5">ใบอนุญาตก่อสร้าง</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox6"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox6">BOQ</label>
                                        </div>

                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox10"
                                                value="option1">
                                            <label class="form-check-label"
                                                for="inlineCheckbox10">ใบอนุญาตประกอบกิจการโรงแรม/โรงงาน
                                                (รง.4)</label>
                                        </div>
                                    </div>
                                </div> --}}
                        </div>

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
