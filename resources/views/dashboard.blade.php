@extends('layouts.app')
@section('styles')
    <style>
        .dt-head-center {
            text-align: center;
        }
    </style>
@endsection  

@section('content')
    {{-- <div class="container"> --}}
        @livewire('index')
    {{-- </div> --}}
@endsection


@section('scripts')
    <!-- APEXCHART JS -->
    <script src="{{asset('assets/js/apexcharts.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

    <!-- INTERNAL DATA-TABLES JS-->
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script> --}}

    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

    <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    {{-- <script src="{{asset('assets/js/table-data.js')}}"></script> --}}


    <!-- INDEX JS -->
    {{-- แสดงกราฟ chartD --}}
    <script src="{{asset('assets/js/index1.js')}}"></script>
    {{-- แสดงฟอร์แมทดาต้าเทเบิล set format datatable --}}
    <script src="{{asset('assets/js/index.js')}}"></script> 

    <!-- Reply JS-->
    <script src="{{asset('assets/js/reply.js')}}"></script>

    {{-- for livewire properties --}}
    <script>
         function showSum(num1,num2) {
            Livewire.emit('showSum',num1,num2);
        }
   
        function updateValue() {
            if (confirm('ยืนยันการการบันทึกข้อมูล?')) {
                    Livewire.emit('updateValue');
            }
        }

        function bindingPopup(value0,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10) {
            Livewire.emit('bindingPopup',value0,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10);
        }

        function addTwoNumbers(num1, num2) {
            // Emit the event to the Livewire component with the numbers
            Livewire.emit('addTwoNumbers', num1, num2);
        }

        

    </script>

    {{-- for set windows center screen --}}
    <script>
        function openCenteredWindow(url, width, height, display = 1) {
            var screenWidth = screen.width;
            var screenHeight = screen.height;

            var screenLeft = window.screenLeft || window.screenX;
            var screenTop = window.screenTop || window.screenY;

            var left, top;

            // Assume primary display is 1 and secondary display is 2
            if (display === 2) {
                // Calculate position for secondary display
                left = screenWidth + ((screenWidth / 2) - (width / 2)) + screenLeft;
                top = (screenHeight / 2) - (height / 2) + screenTop;
            } else {
                // Default to primary display
                left = (screenWidth / 2) - (width / 2) + screenLeft;
                top = (screenHeight / 2) - (height / 2) + screenTop;
            }

            // Open the new window with the calculated position and size
            window.open(url, 'CenteredWindow', `width=${width}, height=${height}, top=${top}, left=${left}`);
        }
    </script>

 
    <script>
            var table = $('#home-data-table1').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": {
                    "url": "{{ route('home_jobs_data') }}", 
                    "type": "GET",
                    "error": function(xhr, error, code) {
                        console.log(xhr.responseText);
                        alert('Error: ' + code);
                    }
                },
                "columns": [
                    { "data": "id" },
                    { "data": "client" },
                    { "data": "jobcode" },
                    { "data": "reportcode" },
                    { "data": "projectname" },
                    { "data": "prop_type" },
                    { "data": "prop_size" },
                    { "data": "startdate" },
                    { "data": "inspectiondate" },
                    { "data": "lcduedate" },
                    { "data": "clientduedate" },
                    { "data": "valuer" },
                    { "data": "headvaluer" },
                    { "data": "job_status" },
                    { "data": "customer" },
                    { "data": "proplocation" },
                    { "data": "print_checked" },
                    { "data": "link_checked" },
                    { "data": "file_checked" }
                ],

                columnDefs: [{
                    targets: 1, // The "Image" column index
                    render: function(data, type, row) {
                        if (data === 'UOB') {
                            return `<td class="text-center"><img alt="avatar" class="rounded-circle" src="{{ asset('storage/bank/48x48/uob.png') }}"></td>`;
                        } else if (data === 'KK') {
                            return `<td class="text-center"><img alt="avatar" class="rounded-circle" src="{{asset('storage/bank/48x48/kk.png')}}"></td>`;
                        } else {
                            return `<td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="` + row.customer + `">` + row.customer.substring(0, 15) + `</td>`;
                        }
                    }
                    },
                    {
                        targets: 2, // jobcode column
                        render: function(data, type, row) {
                            return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="bindingPopup('` + row.id + `','` + row.jobcode + `','` + row.reportcode + `','` + row.projectname + `','` + row.proplocation + `','` + row.startdate + `','` + row.clientduedate + `','` + row.job_status + `','` + row.print_checked + `','` + row.link_checked + `','` + row.file_checked + `')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.jobcode + `</p></a></td>`;
                        }
                    }
                ],
            
            });
    </script>
  

@endsection <!-- script -->



