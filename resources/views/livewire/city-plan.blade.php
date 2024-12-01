<div>
    @include('livewire.popup_cityplan_files')
    @include('livewire.file-viewer')
    @include('livewire.popup_cityplan_editdata')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">ผังเมือง</h1>
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
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    
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
                            <table id="cityplan-data-table" class="table text-nowrap mb-0 table-bordered w-100">                               
                                <thead class="dt-head-center">
                                    <tr>
                                        <th class="bg-transparent border-bottom-0">id</th>
                                        <th class="bg-transparent border-bottom-0">asa no</th>
                                        <th class="bg-transparent border-bottom-0">ประกาศใช้</th>
                                        <th class="bg-transparent border-bottom-0">จังหวัด</th>
                                        <th class="bg-transparent border-bottom-0">ที่ตั้ง</th>
                                        <th class="bg-transparent border-bottom-0">สิ้นสุดอายุ</th>
                                        <th class="bg-transparent border-bottom-0">หน่วยงาน</th>
                                        <th class="bg-transparent border-bottom-0">หมายเหตุ</th>
                                        <th class="bg-transparent border-bottom-0">PDF ต้นฉบับ</th>
                                        <th class="bg-transparent border-bottom-0">Word</th>
                                        <th class="bg-transparent border-bottom-0">Print แนบรายงาน</th>
                                        <th class="bg-transparent border-bottom-0">doc_group</th>
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