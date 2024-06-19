@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADERFF -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Invoice</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Invoices</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice Edit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!--ROW OPENED-->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="mb-0">Invoice#New</h4>
                </div>
                <div class="card-body p-0 invoice-create-main">
                    <form method="POST" action="{{ route('invoice.create') }}">
                        @csrf
                        <div class="row p-5 border-bottom">
                            <div class="col-sm-12 col-md-12 col-xl">
                                <div class="form-group">
                                    <label for="inv-number" class="form-label text-muted">Invoice Number:</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary-transparent text-primary-dark">#INV-</span>
                                        <input id="invoiceno" name ="invoiceno" type="text"
                                            class="form-control text-dark" placeholder="Enter Invoice Number"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md col-xl">
                                <div class="form-group">
                                    <label class="form-label text-muted">ชื่อลูกค้า: </label>
                                    <textarea name="customer" class="form-control w-60 mb-2 text-dark" placeholder="Enter Client" id="customer"
                                        cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xl">
                                <div class="form-group">
                                    <label for="invoicedate" class="form-label text-muted">Invoice Date:</label>
                                    <div id="inv-datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon input-group-text bg-primary-transparent"><i
                                                class="fe fe-calendar text-primary-dark"></i></span>
                                        <input id="invoicedate" name="invoicedate" class="form-control" type="text"
                                            placeholder="Select Invoice Date"
                                            value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-5 border-bottom">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-5 col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label text-muted mb-2 text-dark">Billing
                                                Address:</label>
                                            <p class="text-dark">
                                                บริษัท แลนด์มาร์ค คอนซัลแทนส์ จำกัด<br>
                                                370/6 อาคารแฟร์ ทาวน์เวอร์ ชั้น 2 ซอยสุขุมวิท 50<br>
                                                ถนนสุขุมวิท แขวงพระโขนง เขตคลองเตย กรุงเทพมหานคร 10260<br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-md-7 col-sm-12">
                                        <div class="form-group">
                                            <label for="shipping-address"
                                                class="form-label text-muted mb-2">ที่อยู่ลูกค้า:</label>
                                            <textarea name="address" class="form-control w-60 mb-2 text-dark" placeholder="Enter Address" id="address"
                                                cols="30" rows="5"></textarea>
                                            <a href="javascript:void(0)" role="button"
                                                class="text-primary text-center d-none" id="addShippingAddress">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary"
                                                    enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                    <path
                                                        d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z" />
                                                </svg>
                                                Add Address
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row p-5 border-bottom">
                            <div class="col-xl-12">
                                <div class="product-description-list">
                                        <div class="product-description-each mb-3 table-responsive">
                                            <table class="invoice-product-table">
                                                <thead>
                                                    <tr>
                                                        <th width=60%>รายการ</th>
                                                        <th>ราคา (ต่อยูนิต)</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="border">
                                                    <tr class="dashed-border-bottom">
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="description0"
                                                                placeholder="ค่าบริการประเมินมูลค่าทรัพย์สิน"
                                                                value="ค่าบริการประเมินมูลค่าทรัพย์สิน ">
                                                        </td>
                                                        <td class="w-10">
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text bg-primary-transparent text-primary-dark">฿</span>
                                                                <input type="number" class="form-control"
                                                                    name="amountjob0"
                                                                    placeholder="ราคา (บาท)"
                                                                    value="" min="0">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <textarea class="form-control border-0 p-2" placeholder="" cols="30" rows="1" value=""></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <i class="fe fe-delete fs-20 text-muted text-center delete-row-btn ms-2"></i>
                                        </div>
                                </div>
                                <a href="javascript:void(0)" role="button"
                                    class="text-primary text-center add-invoice-item-btn mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary"
                                        enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                        <path
                                            d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z" />
                                    </svg>
                                    เพิ่มรายการ
                                </a>
                            </div>
                        </div>
                        <div class="row pt-0 pb-5 px-5 border-bottom">
                            <div class="col-xl-12">
                                <div class="invoice-bottom-table-container table-responsive">
                                    <table class="ms-auto invoice-table-bottom w-50 text-end">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" class="border-top-0">Sub Total</td>
                                                <td class="border-top-0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tax</td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr class="bg-primary-transparent text-primary-dark fw-bold fs-15">
                                                <td colspan="3">Total</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row p-5">
                            <div class="btn-list text-end">
                                <button class="btn btn-outline-danger">
                                    <i class="fe fe-x-circle"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fe fe-check-circle"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--ROW CLOSED-->
@endsection

@section('scripts')
    <!-- bootstrap-datepicker js -->
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/datepicker.js') }}"></script>

    <!-- INVOICE EDIT JS-->
    <script src="{{ asset('assets/js/invoice-create.js') }}"></script>

@endsection
