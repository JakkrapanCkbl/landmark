<div>
    @include('livewire.popup_index_edit')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            {{-- <div>
                <button type="button" class="btn btn-primary" wire:click="addTwoNumbers(5,5)">sum</button>
                Sum : {{ $sum }}
                <button wire:click="showMessage">Click Me</button>
                <p>{{ $message }}</p>
            </div> --}}
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{$SumBfCompletedByMonth}}</h3>
                            <p class="text-muted fs-13 mb-0">F- Completed Tasks</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                {{-- <span class="icn-box text-success fw-semibold fs-13 me-1">
                                    <i class='fa fa-long-arrow-up'></i>
                                    42%</span> --}}
                                MTD
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{$SumRCompletedByMonth}}</h3>
                            <p class="text-muted fs-13 mb-0">R- Completed Tasks</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                {{-- <span class="icn-box text-danger fw-semibold fs-13 me-1">
                                    <i class='fa fa-long-arrow-down'></i>
                                    12%</span> --}}
                                MTD
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.5,7H16V5.9169922c0-2.2091064-1.7908325-4-4-4s-4,1.7908936-4,4V7H4.5C4.4998169,7,4.4996338,7,4.4993896,7C4.2234497,7.0001831,3.9998169,7.223999,4,7.5V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7.5c0-0.0001831,0-0.0003662,0-0.0006104C19.9998169,7.2234497,19.776001,6.9998169,19.5,7z M9,5.9169922c0-1.6568604,1.3431396-3,3-3s3,1.3431396,3,3V7H9V5.9169922z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V8h3v2.5C8,10.776123,8.223877,11,8.5,11S9,10.776123,9,10.5V8h6v2.5c0,0.0001831,0,0.0003662,0,0.0005493C15.0001831,10.7765503,15.223999,11.0001831,15.5,11c0.0001831,0,0.0003662,0,0.0006104,0C15.7765503,10.9998169,16.0001831,10.776001,16,10.5V8h3V19z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">฿{{$AvgCompletedByMonth}}</h3>
                            {{-- <p class="text-muted fs-13 mb-0">Average ({{$CountAllCompletedByMonth}} / {{$CountAllByMonth}}) </p> --}}
                            <p class="text-muted fs-13 mb-0">Average </p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                {{-- <span class="icn-box text-success fw-semibold fs-13 me-1">
                                    <i class='fa fa-long-arrow-up'></i>
                                    27%</span> --}}
                                MTD
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M7.5,12C7.223877,12,7,12.223877,7,12.5v5.0005493C7.0001831,17.7765503,7.223999,18.0001831,7.5,18h0.0006104C7.7765503,17.9998169,8.0001831,17.776001,8,17.5v-5C8,12.223877,7.776123,12,7.5,12z M19,2H5C3.3438721,2.0018311,2.0018311,3.3438721,2,5v14c0.0018311,1.6561279,1.3438721,2.9981689,3,3h14c1.6561279-0.0018311,2.9981689-1.3438721,3-3V5C21.9981689,3.3438721,20.6561279,2.0018311,19,2z M21,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H5c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h14c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z M12,6c-0.276123,0-0.5,0.223877-0.5,0.5v11.0005493C11.5001831,17.7765503,11.723999,18.0001831,12,18h0.0006104c0.2759399-0.0001831,0.4995728-0.223999,0.4993896-0.5v-11C12.5,6.223877,12.276123,6,12,6z M16.5,10c-0.276123,0-0.5,0.223877-0.5,0.5v7.0005493C16.0001831,17.7765503,16.223999,18.0001831,16.5,18h0.0006104C16.7765503,17.9998169,17.0001831,17.776001,17,17.5v-7C17,10.223877,16.776123,10,16.5,10z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">฿{{$TotalSaleByMonth}}</h3>
                            <p class="text-muted fs-13 mb-0">SUM</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                {{-- <span class="icn-box text-success fw-semibold fs-13 me-1">
                                    <i class='fa fa-long-arrow-up'></i>
                                    9%</span> --}}
                                MTD
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M9,10h2.5c0.276123,0,0.5-0.223877,0.5-0.5S11.776123,9,11.5,9H10V8c0-0.276123-0.223877-0.5-0.5-0.5S9,7.723877,9,8v1c-1.1045532,0-2,0.8954468-2,2s0.8954468,2,2,2h1c0.5523071,0,1,0.4476929,1,1s-0.4476929,1-1,1H7.5C7.223877,15,7,15.223877,7,15.5S7.223877,16,7.5,16H9v1.0005493C9.0001831,17.2765503,9.223999,17.5001831,9.5,17.5h0.0006104C9.7765503,17.4998169,10.0001831,17.276001,10,17v-1c1.1045532,0,2-0.8954468,2-2s-0.8954468-2-2-2H9c-0.5523071,0-1-0.4476929-1-1S8.4476929,10,9,10z M21.5,12H17V2.5c0.000061-0.0875244-0.0228882-0.1735229-0.0665283-0.2493896c-0.1375732-0.2393188-0.4431152-0.3217773-0.6824951-0.1842041l-3.2460327,1.8603516L9.7481079,2.0654297c-0.1536865-0.0878906-0.3424072-0.0878906-0.4960938,0l-3.256897,1.8613281L2.7490234,2.0664062C2.6731567,2.0227661,2.5871582,1.9998779,2.4996338,1.9998779C2.2235718,2.000061,1.9998779,2.223938,2,2.5v17c0.0012817,1.380188,1.119812,2.4987183,2.5,2.5H19c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-6.5006104C21.9998169,12.2234497,21.776001,11.9998169,21.5,12z M4.5,21c-0.828064-0.0009155-1.4990845-0.671936-1.5-1.5V3.3623047l2.7412109,1.5712891c0.1575928,0.0872192,0.348877,0.0875854,0.5068359,0.0009766L9.5,3.0761719l3.2519531,1.8583984c0.157959,0.0866089,0.3492432,0.0862427,0.5068359-0.0009766L16,3.3623047V19c0.0008545,0.7719116,0.3010864,1.4684448,0.7803345,2H4.5z M21,19c0,1.1045532-0.8954468,2-2,2s-2-0.8954468-2-2v-6h4V19z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 END-->

    <!-- ROW-2 -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="title-head mb-3">
                                <h3 class="mb-5 card-title">Revenue MTD</h3>
                                <div class="storage-percent">
                                    <div class="progress fileprogress h-auto ps-0 shadow1">
                                        <span class="progress-bar progress-bar-xs wd-15p received" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                        <span class="progress-bar progress-bar-xs wd-15p download" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                        <span class="progress-bar progress-bar-xs wd-15p shared" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                        <span class="progress-bar progress-bar-xs wd-15p my-images" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                    <div class="remaining-storage">
                                        <div class="text-muted fs-13 mb-1 mt-3">Total Revenue Earned</div>
                                        <div class="fw-semibold fs-14 mb-1 mt-3">฿0.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-main mt-5">
                                <ul class="task-list1 row mx-auto">
                                    <li class="col-xl-6">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-primary me-3"></i>UOB</span>
                                        <span class="text-success fw-semibold fs-12">
                                            <span class="mx-1"><i class="fa fa-caret-up"></i></span>
                                            <span class="">(42.34%)</span>
                                        </span>
                                    </li>
                                    <li class="col-xl-6">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-secondary"></i>KK</span>
                                        <span class="text-danger fw-semibold fs-12">
                                            <span class="mx-1"><i class="fa fa-caret-down"></i></span>
                                            <span class="">(13%)</span>
                                        </span>
                                    </li>
                                    <li class="col-xl-6">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-custom-yellow"></i>Others BF</span>
                                        <span class="text-success fw-semibold fs-12">
                                            <span class="mx-1"><i class="fa fa-caret-up"></i></span>
                                            <span class="">(62%)</span>
                                        </span>
                                    </li>
                                    <li class="col-xl-6 mb-xl-0">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-teritary"></i>R</span>
                                        <span class="text-success fw-semibold fs-12">
                                            <span class="mx-1"><i class="fa fa-caret-up"></i></span>
                                            <span class="">(22.46%)</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                    <div class="card overflow-hidden">
                        <div class="card-header border-bottom">
                            <h4 class="card-title fw-semibold">Latest Transactions</h4>
                            <a href="#" class="ms-auto">View All</a>
                        </div>
                        <div class="card-body p-0 customers mt-1">
                            <div class="list-group py-1">
                                <a href="javascript:void(0);" class="border-0">
                                    <div class="list-group-item border-0">
                                        <div class="media mt-0 align-items-center">
                                            <div class="transaction-icon"><i class="fe fe-chevrons-right"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="mt-0">
                                                        <h5 class="mb-1 fs-13 fw-normal text-dark">To Bel Bcron Bank<span class="fs-13 fw-semibold ms-1">Savings Section</span></h5>
                                                        <p class="mb-0 fs-12 text-muted">Transfer 4.53pm</p>
                                                    </div>
                                                    <span class="ms-auto fs-13">
                                                        <span class="float-end text-dark">-$2,543</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="border-0">
                                    <div class="list-group-item border-0">
                                        <div class="media mt-0 align-items-center">
                                            <div class="transaction-icon">
                                                <i class="fe fe-briefcase"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="mt-0">
                                                        <h5 class="mb-1 fs-13 fw-normal text-dark">Payment For <span class="fs-13 fw-semibold ms-1">Day Job</span></h5>
                                                        <p class="mb-0 fs-12 text-muted">Received 2.45pm</p>
                                                    </div>
                                                    <span class="ms-auto fs-13">
                                                        <span class="float-end text-dark">+$32,543</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="border-0">
                                    <div class="list-group-item border-0">
                                        <div class="media mt-0 align-items-center">
                                            <div class="transaction-icon"><i class="fe fe-dollar-sign"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="mt-0">
                                                        <h5 class="mb-1 fs-13 fw-normal text-dark">Bought items from<span class="fs-13 fw-semibold ms-1">Ecommerce site</span></h5>
                                                        <p class="mb-0 fs-12 text-muted">Payment 8.00am</p>
                                                    </div>
                                                    <span class="ms-auto fs-13">
                                                        <span class="float-end text-dark">-$256</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="border-0">
                                    <div class="list-group-item border-0">
                                        <div class="media mt-0 align-items-center">
                                            <div class="transaction-icon"><i class="fe fe-file-text"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="mt-0">
                                                        <h5 class="mb-1 fs-13 fw-normal text-dark">Paid Monthly Expenses<span class="fs-13 fw-semibold ms-1">Bills & Loans</span></h5>
                                                        <p class="mb-0 fs-12 text-muted">Payment 6.43am</p>
                                                    </div>
                                                    <span class="ms-auto fs-13">
                                                        <span class="float-end text-dark">-$1,298</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sales</h3>
                    <div class="ms-auto">
                        <div class="btn-group p-0 ms-auto">
                            <button class="btn btn-primary-light btn-sm disabled" type="button">2021</button>
                            <button class="btn btn-primary-light btn-sm" type="button">2022</button>
                            <button class="btn btn-primary-light btn-sm disabled" type="button">2023</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="sales-stats d-flex">
                        <div>
                            <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                            </div>
                            <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                        </div>
                    </div>
                    {{-- @if ($ShowGraph == "true")
                        <div id="chartD"></div>
                    @endif --}}
                    <div wire:ignore>
                        <div id="chartD"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ROW-2 END -->

    <!-- ROW-3 -->
    <div class="row">
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title fw-semibold">Daily Activity</h4>
                </div>
                <div class="card-body pb-0">
                    <ul class="task-list">
                        <li>
                            <i class="task-icon bg-primary"></i>
                            <p class="fw-semibold mb-1 fs-13">New Products Introduced<span class="text-muted fs-12 ms-2 ms-auto float-end">1:43 pm</span></p>
                            <p class="text-muted fs-12">Lorem ipsum dolor sit.<a href="#"
                                    class="fw-semibold ms-1">Product Light Launched</a></p>
                        </li>
                        <li>
                            <i class="task-icon bg-secondary"></i>
                            <p class="fw-semibold mb-1 fs-13">Hermoine Replied<span class="text-muted fs-12 ms-2 float-end">6:12 am</span></p>
                            <p class="text-muted fs-12">Hermoine replied to your post on<a href="#"
                                    class="fw-semibold ms-1"> Detailed Blog</a></p>
                        </li>
                        <li>
                            <i class="task-icon bg-info"></i>
                            <p class="fw-semibold mb-1 fs-13">New Request<span class="text-muted fs-12 ms-2 float-end">11:22 am</span></p>
                            <p class="text-muted fs-12">Corner sent you a request<a href="#"
                                    class="fw-semibold ms-1"> Facebook</a></p>
                        </li>
                        <li>
                            <i class="task-icon bg-warning"></i>
                            <p class="fw-semibold mb-1 fs-13">Task Due<span class="text-muted fs-12 ms-2 float-end">4:32 pm</span></p>
                            <p class="text-muted mb-0 fs-12">Task has to be completed <a href="#"
                                    class="fw-semibold ms-1"> New Project</a></p>
                        </li>
                        <li class="mb-2">
                            <i class="task-icon bg-primary"></i>
                            <p class="fw-semibold mb-1 fs-13">Maggice Liked<span class="text-muted fs-12 ms-2 float-end">5 mins ago</span></p>
                            <p class="text-muted mb-0 fs-12">Maggice bruce liked your article <a href="#"
                                    class="fw-semibold ms-1"> Article on Projects</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header border-bottom">
                    <div>
                        <h3 class="card-title">Timeline</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tl-container">
                        <div class="tl-blog primary">
                            <div class="tl-img rounded-circle bg-primary-transparent">
                                <i class="fe fe-user-plus text-primary text-17"></i>
                            </div>
                            <div class="tl-details d-flex">
                                <p>
                                    <span class="tl-title-main"> Mr White </span>  Started following you
                                    <span class="d-flex text-muted fs-12">10 Jan 2022</span>
                                </p>
                                <p class="ms-auto text-13">
                                    <span class="badge bg-primary text-white">1m</span>
                                </p>
                            </div>
                        </div>
                        <div class="tl-blog secondary">
                            <div class="tl-img rounded-circle bg-secondary-transparent">
                                <i class="fe fe-message-circle text-secondary text-17"></i>
                            </div>
                            <div class="tl-details d-flex">
                                <p>
                                    <span class="tl-title-main"> Caroline </span>  1 Commented applied
                                    <span class="d-flex text-muted fs-12">09 Jan 2022</span>
                                </p>
                                <p class="ms-auto text-13">
                                    <span class="badge bg-secondary text-white">2m</span>
                                </p>
                            </div>
                        </div>
                        <div class="tl-blog teritary">
                            <div class="tl-img rounded-circle bg-info-transparent">
                                <i class="fe fe-clipboard text-info text-17"></i>
                            </div>
                            <div class="tl-details d-flex">
                                <p>
                                    <span class="tl-title-main"> Juliette </span>  posted a new article
                                    <span class="d-flex text-muted fs-12">07 Jan 2022</span>
                                </p>
                                <p class="ms-auto text-13">
                                    <span class="badge bg-info text-white">3m</span>
                                </p>
                            </div>
                        </div>
                        <div class="tl-blog custom-yellow">
                            <div class="tl-img rounded-circle bg-warning-transparent">
                                <i class="fe fe-thumbs-up text-warning text-17"></i>
                            </div>
                            <div class="tl-details d-flex">
                                <p>
                                    <span class="tl-title-main"> Akimov </span>  liked your site
                                    <span class="d-flex text-muted fs-12">07 Dec 2022</span>
                                </p>
                                <p class="ms-auto text-13">
                                    <span class="badge bg-warning text-white">4m</span>
                                </p>
                            </div>
                        </div>
                        <div class="tl-blog primary">
                            <div class="tl-img rounded-circle bg-primary-transparent">
                                <i class="fe fe-book text-primary text-17"></i>
                            </div>
                            <div class="tl-details d-flex">
                                <p class="mb-0">
                                    <span class="tl-title-main"> Emilie </span>sent you a feedback
                                    <span class="d-flex text-muted fs-12">06 Jan 2022</span>
                                </p>
                                <p class="ms-auto text-13 mb-0">
                                    <span class="badge bg-orange text-white">5m</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card overflow-hidden">
                <div class="card-header title-submenu border-bottom">
                    <h3 class="card-title">To-Do List</h3>
                </div>
                <div class="card-body">
                    <div class="todo-container">
                        <div class="todo-blog primary">
                            <label class="todo-img">
                                <input type="checkbox" class="todo-checkbox" name="todo-checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <div class="todo-details d-flex">
                                <p class="mb-0">Design a UI Dashboard for client
                                    <span class="d-flex text-muted fs-12">3 days remaining</span>
                                </p>
                                <div class="ms-auto text-13 fw-semibold">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-light">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="todo-blog secondary">
                            <label class="todo-img">
                                <input type="checkbox" class="todo-checkbox" name="todo-checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <div class="todo-details d-flex">
                                <p class="mb-0">Design a UI Dashboard for client
                                    <span class="d-flex text-muted fs-12">3 days remaining</span>
                                </p>
                                <div class="ms-auto text-13 fw-semibold">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-light">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="todo-blog teritary">
                            <label class="todo-img">
                                <input type="checkbox" class="todo-checkbox" name="todo-checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <div class="todo-details d-flex">
                                <p class="mb-0">Design a UI Dashboard for client
                                    <span class="d-flex text-muted fs-12">3 days remaining</span>
                                </p>
                                <div class="ms-auto text-13 fw-semibold">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-light">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="todo-blog custom-yellow">
                            <label class="todo-img">
                                <input type="checkbox" class="todo-checkbox" name="todo-checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <div class="todo-details d-flex">
                                <p class="mb-0">Design a UI Dashboard for client
                                    <span class="d-flex text-muted fs-12">3 days remaining</span>
                                </p>
                                <div class="ms-auto text-13 fw-semibold">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-light">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="todo-blog primary">
                            <label class="todo-img">
                                <input type="checkbox" class="todo-checkbox" name="todo-checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <div class="todo-details d-flex">
                                <p class="mb-0">Design a UI Dashboard for client
                                    <span class="d-flex text-muted fs-12">3 days remaining</span>
                                </p>
                                <div class="ms-auto text-13 fw-semibold">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-light">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-3 END -->

    <!-- count task -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4>Total Tasks</h4>
                                    <p>YTD {{$SumTask}}</p>
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
                                    <h4>Completed Tasks</h4>
                                    <p>MYTD {{$this->SumCompleted}}</p>
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
                                    <h4>In Progress</h4>
                                    <p>YTD {{$this->SumInprogress}}</p>
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
                                    <h4>On Hold | Cancel</h4>
                                    <p>YTD {{$this->SumOnHold}} | {{$this->SumCancel}}</p>
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
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('joborder.joborder-add') }}';">ลงทะเบียน</button>
                </div>
                <div wire:ignore>
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="data-table1" class="table text-nowrap mb-0 table-bordered w-100">
                                {{-- <thead class="table-head"> --}}
                                <thead class="dt-head-center">
                                    <tr>
                                        <th>id</th>
                                        <th class="bg-transparent border-bottom-0">ลูกค้า</th>
                                        <th class="bg-transparent border-bottom-0">รายงานเลขที่</th>
                                        <th class="bg-transparent border-bottom-0">Bank's ID</th>
                                        <th class="bg-transparent border-bottom-0">โครงการ / ที่ตั้ง</th>
                                        <th class="bg-transparent border-bottom-0">ปรเภท</th>
                                        <th class="bg-transparent border-bottom-0">เนื้อที่</th>
                                        <th class="bg-transparent border-bottom-0">รับงาน</th>
                                        <th class="bg-transparent border-bottom-0">สำรวจ</th>
                                        <th class="bg-transparent border-bottom-0">ส่งงาน LC</th>
                                        <th class="bg-transparent border-bottom-0">ส่งงานลูกค้า</th>
                                        <th class="bg-transparent border-bottom-0">ผู้ประเมิน</th>
                                        <th class="bg-transparent border-bottom-0">ผู้ตรวจ</th>
                                        <th class="bg-transparent border-bottom-0">สถานะ</th>
                                        {{-- <th class="bg-transparent border-bottom-0 no-btn"></th> --}}
                                    </tr>
                                </thead>
                                
                                <tbody class="table-body">
                                    
                                    @foreach ($jobs as $job)   
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        {{-- <td>{{ $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) }}</td> --}}
                                    
                                        @if($job->client == 'UOB')
                                            <td class="text-center">
                                                <img alt="avatar" class="rounded-circle" src="{{asset('storage/bank/48x48/uob.png')}}">
                                            </td>
                                        @elseif($job->client == 'KK')
                                            <td class="text-center">
                                                <img alt="avatar" class="rounded-circle" src="{{asset('storage/bank/48x48/kk.png')}}">
                                            </td>
                                        @else
                                            <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->customer }}">{{ Str::limit($job->customer, 15) }}</td>
                                        @endif
                 
                                        @if($job->job_status == 'Completed')
                                            <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                        @elseif($job->job_status == 'On Hold' || $job->job_status == 'Cancel')
                                            <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                        @else
                                            @if($job->jobsize == 'HL')
                                                @if($job->easydiff == 'Easy' || $job->easydiff == 'Normal' || $job->easydiff == 'NORM / +++' || $job->easydiff == 'NORM')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @elseif($job->easydiff == 'Difficult')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -1)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @endif
                                            @elseif($job->jobsize == 'S')
                                                @if($job->easydiff == 'Easy')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @elseif($job->easydiff == 'Normal' || $job->easydiff == 'NORM / +++' || $job->easydiff == 'NORM' || $job->easydiff == 'Difficult')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -1)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @endif
                                            @elseif($job->jobsize == 'M')
                                                @if($job->easydiff == 'Easy' || $job->easydiff == 'Normal' || $job->easydiff == 'NORM / +++' || $job->easydiff == 'NORM')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -1)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @elseif($job->easydiff == 'Difficult')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -1 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -2)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @endif
                                            @elseif($job->jobsize == 'L')
                                                @if($job->easydiff == 'Easy')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -1)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @elseif($job->easydiff == 'Normal' || $job->easydiff == 'NORM / +++' || $job->easydiff == 'NORM' || $job->easydiff == 'Difficult')
                                                    @if($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == 0 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -1 || $this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) == -2)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:orange;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @elseif($this->countDaySendJob(Carbon\Carbon::parse($job->clientduedate)) > 0)
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:red;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @else
                                                        <td class="text-muted fs-13"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}','{{ $job->print_checked }}','{{ $job->link_checked }}','{{ $job->file_checked }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:black;font-weight: bold;text-decoration: underline;" >{{ $job->jobcode }}</p></a></td>
                                                    @endif
                                                @endif
                                            @endif

                                        @endif

                                        @if($job->print_checked == true)
                                            {{-- bold front --}}
                                            {{-- <td class="text-muted fs-13"><p class="mb-0 text-dark"><span style="color:black;font-weight: bold;">{{ $job->reportcode }}</p></td> --}}
                                            <td class="text-muted fs-13"><p class="mb-0 text-dark"><span style="font-weight: bold;">{{ $job->reportcode }}</p></td>
                                        @else
                                            <td class="text-muted fs-13"><p class="mb-0 text-dark">{{ $job->reportcode }}</p></td>
                                        @endif
                                        {{-- <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><span style="color:black">{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</p></td> --}}
                                        {{-- <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><a href="{{ route('joborder.joborder-edit', ['id' => $job->id]) }}" target="_blank"><span style="color:black">{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</p></a></td> --}}
                                        @if($job->job_checked == true) 
                                            {{-- bold front --}}
                                            {{-- <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><a href="{{ route('joborder.joborder-edit', ['id' => $job->id]) }}" target="popup" onclick="window.open('{{ route('joborder.joborder-edit', ['id' => $job->id]) }}','name','width=1650,height=1037')"><span style="color:black;font-weight: bold;">{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</p></a></td> --}}
                                            {{-- <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><a href="javascript:void(0);" onclick="openCenteredWindow('{{ route('joborder.joborder-edit', ['id' => $job->id]) }}', 1400, 900)"><span style="font-weight: bold;">{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</p></a></td> --}}
                                            <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><a href="javascript:void(0);" onclick="openCenteredWindow('{{ route('joborder.joborder-edit', ['id' => $job->id]) }}', 1500, 900, 1)"><span style="color:green;font-weight:bold;text-decoration:underline;" >{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</p></a></td>
                                        @else
                                            {{-- normal front --}}
                                            {{-- <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><a href="{{ route('joborder.joborder-edit', ['id' => $job->id]) }}" target="popup" onclick="window.open('{{ route('joborder.joborder-edit', ['id' => $job->id]) }}','name','width=1650,height=1037')"><span style="color:black">{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</p></a></td> --}}
                                            <td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }} {{ $job->proplocation }}"><a href="javascript:void(0);" onclick="openCenteredWindow('{{ route('joborder.joborder-edit', ['id' => $job->id]) }}', 1500, 900, 1)">{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,50) }}</a></td>
                                        @endif
                                        
                                        {{-- <td class="text-muted fs-13 fw-semibold" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $job->projectname }}<br>{{ $job->proplocation }}"><a href="#" wire:click="bindingPopup('{{ $job->id }}','{{ $job->jobcode }}','{{ $job->reportcode }}','{{ $job->projectname }}','{{ $job->proplocation }}','{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}','{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}','{{ $job->job_status }}')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" >{{ $job->projectname }}<br>{{ Str::limit($job->proplocation,30) }}</a></td> --}}
                                        {{-- <td class="text-muted fs-13"><a href="{{url('project-details')}}" class="text-dark">Noa Dashboard UI</a></td> --}}
                                        @if($job->link_checked == true)
                                            {{-- bold front --}}
                                            {{-- <td class="fs-13"><p class="mb-0"><span style="color:black;font-weight: bold;">{{ $job->prop_type }}</p></td> --}}
                                            <td class="fs-13"><p class="mb-0"><span style="font-weight: bold;">{{ $job->prop_type }}</p></td>
                                        @else
                                            <td class="fs-13"><p class="mb-0">{{ $job->prop_type }}</p></td>
                                        @endif
                                        @if($job->file_checked == true)
                                            {{-- bold front --}}
                                            {{-- <td class="text-muted fs-13"><p class="mb-0 text-muted"><span style="color:black;font-weight: bold;">{{ $job->prop_size }}</p></td> --}}
                                            <td class="text-muted fs-13"><p class="mb-0 text-muted"><span style="font-weight: bold;">{{ $job->prop_size }}</p></td>
                                        @else
                                            <td class="text-muted fs-13"><p class="mb-0 text-muted">{{ $job->prop_size }}</p></td>
                                        @endif
                                        
                                        <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->startdate)->thaidate('D j M y') }}</td>
                                        <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->inspectiondate)->thaidate('D j M y') }}</td>
                                        <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->lcduedate)->thaidate('D j M y') }}</span></td>
                                        <td class="text-muted fs-13">{{ Carbon\Carbon::parse($job->clientduedate)->thaidate('D j M y') }}</td>
                                        <td class="text-center">
                                            @if ($job->valuer == 'มงคล')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mkc.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'สาโรจน์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/srp.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'นิรันดร')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/nda.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'วรงค์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/wrg.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'อานิพงศ์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/anp.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'ปริวรรต')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/prw.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'อธิวัฒน์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ath.jpg')}})"></span> 
                                            @elseif ($job->valuer == 'มนต์ชัย')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mcm.jpg')}})"></span>
                                            @elseif ($job->valuer == 'ภัทรกร')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ptk.jpg')}})"></span>                                                                    
                                            @elseif ($job->valuer == 'ณัฐวุฒิ')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ntw.jpg')}})"></span>
                                            @else
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/avatar.jpg')}})"></span> 
                                            @endif
                                            
                                        </td>
                                        <td class="text-center">
                                            @if ($job->headvaluer == 'มงคล')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mkc.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'สาโรจน์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/srp.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'นิรันดร')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/nda.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'วรงค์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/wrg.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'อานิพงศ์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/anp.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'ปริวรรต')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/prw.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'อธิวัฒน์')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ath.jpg')}})"></span> 
                                            @elseif ($job->headvaluer == 'มนต์ชัย')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mcm.jpg')}})"></span>
                                            @elseif ($job->headvaluer == 'ภัทรกร')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ptk.jpg')}})"></span>                                                                    
                                            @elseif ($job->headvaluer == 'ณัฐวุฒิ')
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ntw.jpg')}})"></span>
                                            @else
                                                <span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/avatar.jpg')}})"></span> 
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <div class="form-group mb-0">
                                                <ul>
                                                    <li class="select-status">
                                                        <select class="form-control select2-status-search" data-placeholder="Select Status">
                                                            {{-- <option value="IP" selected>In Progress</option>
                                                            <option value="OH">On Hold</option>
                                                            <option value="CP">Completed</option>
                                                            <option value="CL">Canceled</option> --}}

                                                            {{-- <option value="In Progress" selected>In Progress</option>
                                                            <option value="On Hold">On Hold</option>
                                                            <option value="Completed">Completed</option>
                                                            <option value="Canceled">Cancel</option> --}}

                                                            <option value="In Progress" {{$job->job_status=='In Progress'?'selected':''}}>In Progress</option>
                                                            <option value="Completed" {{$job->job_status=='Completed'?'selected':''}}>Completed</option>
                                                            <option value="On Hold" {{$job->job_status=='On Hold'?'selected':''}}>On Hold</option>
                                                            <option value="Cancel" {{$job->job_status=='Cancel'?'selected':''}}>Cancel</option>

                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <div class="d-flex align-items-stretch">
                                                <a href="#" class="border br-5 px-2 py-1 d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                
                                                <div class="dropdown-menu dropdown-menu-start">
                                                    <a class="dropdown-item" href="{{ route('joborder.joborder-edit', ['id' => $job->id]) }}"><i class="icon icon-pencil"></i>&nbsp;Edit Assign Job</a>
                                                    <a class="dropdown-item" href="{{ url('/editJobInsertFiles/' . $job->id . '/working_files/APPENDIX')}}"><i class="fa fa-file-pdf-o me-2"></i>Insert File</a>
                                                    
                                                </div>
                                                <p>&nbsp;</p>
                                                <a class="btn btn-sm btn-outline-info border me-2" href="{{ url('/projectmaster') }}" data-bs-toggle="tooltip" data-bs-original-title="Project Detail">
                                                    <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16"> <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" fill="green"></path> </svg>
                                                </a>
                                                <a class="btn btn-sm btn-outline-info border me-2" href="{{ url('/editJobInsertFiles/' . $job->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Report Template">
                                                
                                                    <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16"> <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" fill="blue"></path> </svg>
                                                </a>
                                                <a class="btn btn-sm btn-outline-info border me-2" href="{{ url('/editJobInsertFiles/' . $job->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Final Report">
                                                    <svg style="color: purple" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16"> <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" fill="purple"></path> </svg>
                                                </a>
                                            </div>
                                        </td> --}}
                                    </tr>                                            
                                    @endforeach
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





