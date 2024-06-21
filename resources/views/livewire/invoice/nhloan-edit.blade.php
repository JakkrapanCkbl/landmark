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
                    <div class="text-end">
                        <button type="button" class="btn btn-primary mb-1 no-print"
                            onclick="window.location='{{ route('invoice.create') }}'"><i class="si si-plus"></i> Create
                            New</button>
                        <button type="button" class="btn btn-success mb-1 no-print"
                            onclick="window.location='{{ route('invoice.edit', ['id' => $invoice->id]) }}'"><i
                                class="si si-pencil"></i> Edit
                            NHLS</button>
                        <button type="button" class="btn btn-info mb-1 no-print" onclick="javascript:window.print();"><i
                                class="si si-printer"></i> Print NHLS</button>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <p class="h5">วันที่เบิก :
                            {{ Carbon\Carbon::parse($invoice->invoicedate)->thaidate('j M Y') }}<br>
                            ชื่อผู้เบิก : สมหวัง เบิกบานใจ
                        </p>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                                <tr>
                                    <th class="text-center" width="20%">#</th>
                                    <th class="text-center" width="20%">1</th>
                                    <th class="text-center" width="20%">2</th>
                                    <th class="text-center" width="20%">3</th>
                                    <th class="text-center" width="20%">4</th>
                                </tr>
                                <tr>
                                    <td class="text-on-left">รายงานเลขที่</td>
                                    <td class="text-center">
                                        <textarea name="invoiceno" class="form-control w-60 mb-2 text-dark" placeholder="Enter Client" id="customer"
                                            cols="30" rows="1">{{ $job->jobcode }}</textarea>
                                    </td>
                                    <td class="text-center">
                                        <textarea name="invoiceno" class="form-control w-60 mb-2 text-dark" placeholder="Enter Client" id="customer"
                                            cols="30" rows="1">{{ $invoice->invoiceno }}</textarea>
                                    </td>
                                    <td class="text-center">
                                        <textarea name="invoiceno" class="form-control w-60 mb-2 text-dark" placeholder="Enter Client" id="customer"
                                            cols="30" rows="1">{{ $invoice->invoiceno }}</textarea>
                                    </td>
                                    <td class="text-center">
                                        <textarea name="invoiceno" class="form-control w-60 mb-2 text-dark" placeholder="Enter Client" id="customer"
                                            cols="30" rows="1">{{ $invoice->invoiceno }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">ชื่อลูกค้า</td>
                                    <td class="text-center">{{ $job->client }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">ประเภททรัพย์สิน</td>
                                    <td class="text-center">{{ $job->prop_type }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">ที่ตั้ง</td>
                                    <td class="text-center">{{ $job->proplocation }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">วันที่สำรวจ</td>
                                    <td class="text-center">
                                        {{ Carbon\Carbon::parse($job->inspectiondate)->thaidate('j M Y') }}</td>
                                    <td class="text-center">
                                        <div id="inv-datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <span class="input-group-addon input-group-text bg-primary-transparent"><i
                                                    class="fe fe-calendar text-primary-dark"></i></span><input
                                                id="invoicedate" name="invoicedate" class="form-control" type="text"
                                                placeholder="Select Invoice Date"
                                                value="{{ \Carbon\Carbon::parse($invoice->invoicedate)->format('d-m-Y') }}" />
                                        </div>
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">โซน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">1. ค่าเดินทาง</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">2. ค่าเช่ารถ</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">3. ค่าน้ำมัน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">4. ค่าทางด่วน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">5. ค่าที่พัก</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">6. ค่าเบี้ยเลี้ยง</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">7. ค่าเขียนงาน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">8. ค่าเช็คโฉนดที่ดิน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">9. ระวาง</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">10. ค่าถ่ายเอกสาร</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">11. ค่าเร่งงานด่วน</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">12. อื่นๆ</td>
                                    <td class="text-center">ช่องนี้มันจะขยายออกไปเป็นหลายบรรทัดหากใส่ข้อมูลเข้ามาเยอะเกิน 1
                                        บรรทัด</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left"><b>รวมทั้งสิ้น</b></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">หัก-เงินเบิกล่วงหน้า</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-on-left">คงเหลือ</td>
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
        <!-- bootstrap-datepicker js -->
        <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/datepicker.js') }}"></script>
        <!-- INVOICE EDIT JS-->
        <script src="{{ asset('assets/js/invoice-edit.js') }}"></script>
        <script>
            $(function() {
                $("#inv-datepicker")
                    .datepicker({
                        autoclose: !0,
                        format: "dd-mm-yyyy",
                        todayHighlight: !0,
                    })
                    .datepicker("update", "<?php echo \Carbon\Carbon::parse($invoice->invoicedate)->format('d-m-Y'); ?>")
            });
        </script>
    @endsection
