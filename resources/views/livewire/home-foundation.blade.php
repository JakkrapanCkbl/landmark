<div>
    @include('livewire.popup_homefound_edit')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">รายการทรัพย์สิน</h1>
            {{-- <div>
                <button type="button" class="btn btn-primary" wire:click="addTwoNumbers(5,5)">sum</button>
                Sum : {{ $sum }}
                <button wire:click="showMessage">Click Me</button>
                <p>{{ $message }}</p>
            </div> --}}
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">มูลนิธิแห่งสภาคริสตจักรในประเทศไทย</li>

            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    

    <!-- count task -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4>โรงเรียน</h4>
                                    <p>99 รายการ</p>
                                </div>
                                <div class="col-4">
                                    <div class="hpx-50 wpx-50 bg-primary br-5 d-flex align-items-center justify-content-center ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M17,4h-1.1846313C15.4013672,2.8383179,14.3035889,2.0014648,13,2h-2C9.6964111,2.0014648,8.5986328,2.8383179,8.1846313,4H7C5.3438721,4.0018311,4.0018311,5.3438721,4,7v12c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7C19.9981689,5.3438721,18.6561279,4.0018311,17,4z M9,5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2v2H9V5z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V7c0.0014038-1.1040039,0.8959961-1.9985962,2-2h1v2.5006104C8.0001831,7.7765503,8.223999,8.0001831,8.5,8h7.0006104C15.7765503,7.9998169,16.0001831,7.776001,16,7.5V5h1c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4>โรงพยาบาล</h4>
                                    <p>99 รายการ</p>
                                </div>
                                <div class="col-4">
                                    <div class="hpx-50 wpx-50 br-5 d-flex align-items-center justify-content-center bg-secondary ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M17,4h-1.1846313C15.4013672,2.8383179,14.3035889,2.0014648,13,2h-2C9.6964111,2.0014648,8.5986328,2.8383179,8.1846313,4H7C5.3438721,4.0018311,4.0018311,5.3438721,4,7v12c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7C19.9981689,5.3438721,18.6561279,4.0018311,17,4z M9,5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2v2H9V5z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V7c0.0014038-1.1040039,0.8959961-1.9985962,2-2h1v2.5006104C8.0001831,7.7765503,8.223999,8.0001831,8.5,8h7.0006104C15.7765503,7.9998169,16.0001831,7.776001,16,7.5V5h1c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4>สุสาน</h4>
                                    <p>99 รายการ</p>
                                </div>
                                <div class="col-4">
                                    <div class="hpx-50 wpx-50 br-5 d-flex align-items-center justify-content-center bg-info ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M17,4h-1.1846313C15.4013672,2.8383179,14.3035889,2.0014648,13,2h-2C9.6964111,2.0014648,8.5986328,2.8383179,8.1846313,4H7C5.3438721,4.0018311,4.0018311,5.3438721,4,7v12c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7C19.9981689,5.3438721,18.6561279,4.0018311,17,4z M9,5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2v2H9V5z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V7c0.0014038-1.1040039,0.8959961-1.9985962,2-2h1v2.5006104C8.0001831,7.7765503,8.223999,8.0001831,8.5,8h7.0006104C15.7765503,7.9998169,16.0001831,7.776001,16,7.5V5h1c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4>ที่ดินว่างเปล่า</h4>
                                    <p>99 รายการ</p>
                                </div>
                                <div class="col-4">
                                    <div class="hpx-50 wpx-50 br-5 d-flex align-items-center justify-content-center bg-warning ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white w-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M17,4h-1.1846313C15.4013672,2.8383179,14.3035889,2.0014648,13,2h-2C9.6964111,2.0014648,8.5986328,2.8383179,8.1846313,4H7C5.3438721,4.0018311,4.0018311,5.3438721,4,7v12c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7C19.9981689,5.3438721,18.6561279,4.0018311,17,4z M9,5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2v2H9V5z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V7c0.0014038-1.1040039,0.8959961-1.9985962,2-2h1v2.5006104C8.0001831,7.7765503,8.223999,8.0001831,8.5,8h7.0006104C15.7765503,7.9998169,16.0001831,7.776001,16,7.5V5h1c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end count task -->

    <!-- ROW-4 -->
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card product-sales-main">
                <div class="card-header border-bottom">
                    {{-- <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/job/create') }}';">ลงทะเบียน</button> --}}
                    <button type="button" class="btn btn-primary" onclick="location.href='#';">ลงทะเบียน</button>
                </div>
                <div wire:ignore>
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="home-data-table" class="table text-nowrap mb-0 table-bordered w-100">                               
                                <thead class="dt-head-center">
                                    <tr>
                                        <th class="bg-transparent border-bottom-0">ลำดับ</th>
                                        <th class="bg-transparent border-bottom-0">ประเภท</th>
                                        <th class="bg-transparent border-bottom-0">ชื่อสถานที่</th>
                                        <th class="bg-transparent border-bottom-0">ที่ตั้ง</th>
                                        <th class="bg-transparent border-bottom-0">โฉนดเลขที่</th>
                                        <th class="bg-transparent border-bottom-0">ไร่</th>
                                        <th class="bg-transparent border-bottom-0">งาน</th>
                                        <th class="bg-transparent border-bottom-0">ตารางวา</th>
                                        <th class="bg-transparent border-bottom-0">ชื่อผู้ถือกรรมสิทธิ์ที่ดิน</th>
                                        <th class="bg-transparent border-bottom-0">สถานะ</th>
                                        <th class="bg-transparent border-bottom-0">วันที่จดทะเบียนที่ดินล่าสุด</th>
                                        <th class="bg-transparent border-bottom-0">หนังสือรับอนุญาตเลขที่ / เมื่อวันที่</th>
                                        <th class="bg-transparent border-bottom-0">หมายเหตุ</th>
                                        <th class="bg-transparent border-bottom-0">ผู้ดำเนินการ</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody class="table-body">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div><!-- COL END -->
    </div>
    <!-- ROW-4 END -->

</div>
