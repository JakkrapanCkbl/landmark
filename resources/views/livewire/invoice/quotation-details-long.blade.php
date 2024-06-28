@extends('layouts.app')

@section('styles')
    <style>
        .signature-section-start {
            display: flex;
            justify-content: flex-start;
            margin-top: 100px;
        }
        .signature-section-end {
            display: flex;
            justify-content: flex-end;
            margin-top: 100px;
        }

        .signature-block-start {
            text-align: start;
        }

        .signature-block-end {
            text-align: end;
        }

        .signature-line {
            border-bottom: 1px solid #777;
            width: 231px;
            margin-bottom: 5px;
        }

        .signature-line.short {
            width: 170px;
            /*182*/
        }

        .signature-line.long {
            width: 276px;
            /*430*/
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

        .table-bordered tr td {
            /* break down long sentences */
            word-break: break-word;
            white-space: normal;
        }

        @media print {

            /* Hide scrollbar for all elements */
            ::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for specific elements if needed */
            .hide-scrollbar {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none;
                /* Chrome, Safari, and Opera */
            }

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
                height: 1340px;
            }

            .page-title {
                font-size: 25px;
            }

            address,
            p {
                font-size: 17px;
            }

            .table-bordered tr td,
            .table-bordered tr th {
                font-size: 18.4px;
            }

            .table-bordered,
            .table-bordered td,
            .table-bordered th {
                /* border: 1px solid #333 !important; */
                vertical-align: top;
                text-align: left;
            }

            hr {
                height: 0px;
                border: none;
                border-top: 1px solid #777;
            }

            hr.thickhr {
                /* border-top: 1.6px solid #333; */
            }

            /*  */
            body,
            html {
                height: auto;
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                margin-left: 0.8cm;
                overflow-x: auto;
                width: calc(100% - 0.8cm);
                max-width: 100%;
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
            <p class="h4 page-title center fw-bold" style="margin-left: 20px; margin-top: 16px;">ใบเสนอราคา (Quotation)
            </p>
        </div>
        <div class="ms-auto pageheader-btn no-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">QUO {{ $invoice->invoiceno }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quotation Details</li>
            </ol>
        </div>

    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row hide-scrollbar">
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
                        <button type="button" class="btn btn-secondary mb-1 no-print"
                            onclick="window.location='{{ route('receipt.details', ['id' => $invoice->id]) }}'"><i
                                class="si si-info"></i> Go to Receipt</button>
                        <button type="button" class="btn btn-info mb-1 no-print" id="print-button"><i
                                class="si si-printer"></i> Print Invoice</button>
                    </div>
                    <hr>
                    <div class="row mb-6">
                        <div class="col-sm-8">
                            <p class="h4 card-title ms-1 mb-2 fw-bold">บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด</p>
                            <p class="h4 card-title ms-1 mb-2">370/6 อาคารแฟร์ ทาวน์เวอร์ ชั้น 2 ซอยสุขุมวิท 50
                            </p>
                            <p class="h4 card-title ms-1 mb-2">
                                ถนนสุขุมวิท แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10260<br>
                            </p>
                            <p class="h4 card-title ms-1 mb-4">
                                สำนักงานใหญ่ เลขประจำตัวผู้เสียภาษี 015547070351
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <p class="h4 card-title ms-4 mb-2">#Quo-{{ $invoice->invoiceno }}</p>
                            <p class="h4 card-title ms-4 mb-2">วันที่:
                                {{ Carbon\Carbon::parse($invoice->invoicedate)->thaidate('j M Y') }}
                            </p>
                            <p class="h4 card-title ms-4">
                                <i class="fa fa-phone"></i> โทร : 0-2331-4580-2<br>
                            </p>
                            <p class="h4 card-title ms-4 mb-4">
                                <i class="fa fa-globe"></i> www.landmarkcon.net
                            </p>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                                <tr>
                                    <th class="fw-bold" width="20%">ลูกค้า</th>
                                    <th>บริษัท เอ็ม บี เค การันตี จำกัด</th>
                                </tr>
                                <tr>
                                    <td class="fw-bold">ที่อยู่</td>
                                    <td>444 ชั้น 12 เอ็ม บี เค ทาวเวอรฺ ถนนพญาไท แขวงวังใหม่ เขตปทุมวัน กรุงเทพมหานคร 10330
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">เรียน</td>
                                    <td>คุณกนกวรรณ ชัยอรุณ</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">วัตถุประสงค์</td>
                                    <td>กำหนดมูลค่าตลาดของทรัพย์สิน เพื่อใช้ในประกอบการพิจารณาสินเชื่อ (Financial)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">ประเภททรัพย์สิน</td>
                                    <td>ที่ดินว่างเปล่า</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">รายละเอียดทรัพย์สิน</td>
                                    <td>เนื้อที่ประมาณ 188-1-10.0 ไร่</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">ที่ตั้ง</td>
                                    <td>ซอยเอบีซี ถนนสุขสวัสดิ์ ตำบลบางป่า อำเภอนิคมพัฒนา จังหวัดระยอง</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">ระยะเวลาที่ใช้</td>
                                    <td>ภายใน 10 วันทำงาน (นับจากวันที่เข้าสำรวจทรัพย์สิน)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">รายงานที่จัดทำ</td>
                                    <td>ภาษาไทย 2 ชุด</td>
                                </tr>
                                {{-- Long Form --}}
                                <tr>
                                    <td class="fw-bold">วิธีการประเมิน</td>
                                    <td>วิธีเปรียบเทียบกับข้อมูลตลาด (The Market Approach)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">ค่าบริการประเมิน</td>
                                    <td>21,000 บาท (รวม VAT 7%)</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">การชำระค่าบริการ</td>
                                    <td>100% ณ วันที่ตอบรับข้อเสนอทางานนี้</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">เอกสารที่ใช้ในการประเมิน</td>
                                    <td>โฉนดที่ดิน แบบแปลนอาคาร ใบอนุญาตก่อสร้างอาคาร</td>
                                </tr>
                                {{-- Long Form --}}
                                <tr>
                                    <td class="fw-bold">นิยามมูลค่าตลาด (Market Value)</td>
                                    <td>“มูลค่าเป็นตัวเงินซึ่งประมาณว่าเป็นราคาของทรัพย์สินที่สามารถใช้ตกลงซื้อขายกันได้ระหว่างผู้ซื้อเต็มใจซื้อ
                                        ณ วันที่ประเมินราคา
                                        ภายใต้เงื่อนไขในการซื้อขายปกติซึ่งผู้ขายไม่มีผลประโยชน์เกี่ยวเนื่องกัน
                                        โดยมีการเสนอขายทรัพย์สินในระยะเวลาพอสมควร
                                        และโดยที่ทั้งสองฝ่ายได้ตกลงใจซื้อขายกันด้วยความรอบคอบปราศจากการกดดัน
                                        ทั้งนี้ที่ดินถือว่า สามารถโอนสิทธิครอบครองตามกฎหมายโดยสมบูรณ์ในทรัพย์สินได้”
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">เงื่อนไขและข้อจำกัด</td>
                                    <td>ภายใต้เงื่อนไขและข้อจำกัดในการประเมินค่าไปของบริษัทฯ
                                        ซึ่งได้ระบุไว้ในท้ายรายงานประเมินมูลค่าทรัพย์สิน</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <br>
                    <div class="print-bottom">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-start mt-4">
                                    <p class="h4 text-start ms-8">ขอแสดงความนับถือ</p>
                                    <p class="h4">บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด</p>
                                </div>
                                <div class="signature-section-start no-screen ">
                                    <div class="signature-block-start text-center">
                                        <div class="signature-line long"></div>
                                        <div class="signature-name">(นายมงคล ชัยอรุณ)</div>
                                        <div class="signature-name">กรรมการผู้จัดการ</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-end mt-4">
                                    <p class="h4 me-7">ยินดีตอบรับข้อเสนองานนี้</p>
                                    <br>
                                </div>
                                <div class="signature-section-end no-screen text-end">
                                    <div class="signature-block-end text-center">
                                        <div class="signature-line long"></div>
                                        <div class="signature-name">(ผู้ว่าจ้าง/ลูกค้า)</div>
                                        {{-- <div class="signature-name">วันที่</div> --}}
                                        <div class="info-block text-center ms-7 mt-3">
                                            <div class="info-topic">วันที่</div>
                                            <div class="info-line long"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="margin-left: -36px;">
                    <hr>
                    <div class="col-sm-12">
                        <img src="/assets/images/qrcode_ex.png" class="img-fluid float-start me-2" alt="QR-code"
                            width="90" height="90" style="margin-top: -10px">
                        <p class="h4 card-title mb-2">Account Payment:</p>
                        <p class="h4 card-title fw-bold mb-2">บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด<br></p>
                        <p class="h4 card-title mb-2">เลขที่บัญชี <u>044-2926-727</u> ธนาคารกสิกรไทย สาขาบิ๊กซี อ่อนนุช</p>
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
