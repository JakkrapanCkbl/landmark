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

        function bindingPopup(value0,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11) {
            Livewire.emit('bindingPopup',value0,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11);
        }

        

        function addTwoNumbers(num1, num2) {
            // Emit the event to the Livewire component with the numbers
            Livewire.emit('addTwoNumbers', num1, num2);
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Listen for the browser event
            window.addEventListener('open-url', function (event) {
                const url = event.detail.url;
               
                var screenWidth = screen.width;
                var screenHeight = screen.height;
                var screenLeft = window.screenLeft || window.screenX;
                var screenTop = window.screenTop || window.screenY;
                var left, top
                var width = 1350;
                var height = 1000;
                left = (screenWidth / 2) - (width / 2) + screenLeft;
                top = (screenHeight / 2) - (height / 2) + screenTop;
                
                window.open(url, 'CenteredWindow', `width=${width}, height=${height}, top=${top}, left=${left}`);
               
            });
        });

        function openreport(jobid) {
            Livewire.emit('openreport',jobid);
        }

         
    </script>
    <script>
        function confirmEdit($continue) {
            if (confirm('ยืนยันการการบันทึกข้อมูล?')) {
                    Livewire.emit('callUpdate');
            }
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
                dom: 'Bfrtip', // Define where the buttons appear
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        title: 'Data Export',
                        exportOptions: {
                            //columns: ':visible' // Export only visible columns
                            //columns: ':visible' // Export only visible columns
                            columns: [0, 2, 3, 4, 5,
                            6, 7, 8, 9, 10,
                            11, 12, 13, 14, 15, 
                            16, 22] // Specify the columns to export (0-based index)
                        }
                    }
                ],

                pageLength: 10,
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
                "order": [[ 0, "desc" ]],
                "columns": [
                    { "data": "id" },
                    { "data": "client" },
                    { "data": "jobcode" },
                    { "data": "reportcode" },
                    { "data": "showprojectname" },
                    { "data": "obj_method" },
                    { "data": "marketvalue" },
                    { "data": "marketvalue_unit" },
                    { "data": "prop_type" },
                    { "data": "prop_size" },
                    { "data": "startdate" },
                    { "data": "inspectiondate" },
                    { "data": "lcduedate" },
                    { "data": "pre_report_checked_date" },
                    { "data": "job_checked_date" },
                    { "data": "send_check_report_date" },
                    { "data": "valuer" },
                    { "data": "headvaluer" },
                    { "data": "do_advance" },
                    { "data": "job_status" },
                    { "data": "customer" },
                    { "data": "proplocation" },
                    { "data": "print_checked" },
                    { "data": "link_checked" },
                    { "data": "file_checked" },
                    { "data": "file_name" }, 
                    { "data": "projectname" }
                ],
                columnDefs: [
                     {
                        targets: 0, // jobcode column
                        render: function(data, type, row) {
                            //return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="bindingPopup('` + row.id + `','` + row.jobcode + `','` + row.reportcode + `','` + row.projectname + `','` + row.proplocation + `','` + row.startdate + `','` + row.clientduedate + `','` + row.job_status + `','` + row.print_checked + `','` + row.link_checked + `','` + row.file_checked + `')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.jobcode + `</p></a></td>`;
                            //return `<td class="text-muted fs-13"><a data-bs-toggle="tooltip" data-bs-original-title="Open PDF" href="` + {{ Storage::disk("s3")->url("/working_files/LC_66BF_0824/LC-66BF-0824-T.pdf") }} + `" target="_blank"><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.jobcode + `</p></a></td>`;
                            
                            if (row.file_name === null) {
                                return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="openreport('` + row.id + `')""><span style="color:black;" >` + row.id + `</p></a></td>`;
                            }else{
                                return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="openreport('` + row.id + `')""><span style="color:green;text-decoration: underline;" >` + row.id + `</p></a></td>`;
                            }
                            
                        }
                    },
                    {
                        targets: 1, // The "Image" column index
                        className: 'text-center',
                        render: function(data, type, row) {
                        if (data === 'UOB') {
                            return `<td class="text-center"><img alt="avatar" class="rounded-circle" src="{{ asset('storage/bank/48x48/uob.png') }}"></td>`;
                        } else if (data === 'KK') {
                            return `<td class="text-center"><img alt="avatar" class="rounded-circle" src="{{asset('storage/bank/48x48/kk.png')}}"></td>`;
                        } else {
                            //return `<td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="` + row.customer + `">` + row.customer.substring(0, 15) + `</td>`;
                            //return `<td class="text-muted fs-13">` + row.customer + `</td>`;
                            if (row.customer === null) {
                                return `<td class="text-muted fs-13"></td>`;
                            }else{
                                return `<td class="text-muted fs-13" data-bs-placement="top" data-bs-toggle="tooltip" title="` + row.customer + `">` + row.customer.substring(0, 15) + `</td>`;
                            }
                        }
                        }
                    },

                    {
                        targets: 2, // jobcode column
                        render: function(data, type, row) {
                            return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="bindingPopup('` + row.id + `','` + row.jobcode + `','` + row.reportcode + `','` + row.projectname + `','` + row.proplocation + `','` + row.startdate + `','` + row.clientduedate + `','` + row.job_status + `','` + row.print_checked + `','` + row.link_checked + `','` + row.file_checked + `','` + row.client + `')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.jobcode + `</p></a></td>`;
                        }
                    },
                    {
                        targets: 6, // market value
                        className: 'text-end',
                        render: function(data, type, row) {
                            //return `<td class="text-muted fs-13">` + row.marketvalue + `</td>`;
                            if (type === 'display' && !isNaN(data)) {
                                // Format the number with commas and no decimal places
                                return parseFloat(data).toLocaleString('en-US', {
                                    maximumFractionDigits: 0
                                });
                            }
                            return `<td class="text-muted fs-13">` + data + `</td>`;
                        }
                    },
                    {
                        targets: 7, // market value unit
                        className: 'text-end',
                        render: function(data, type, row) {
                            //return `<td class="text-muted fs-13">` + row.marketvalue_unit + `</td>`;
                             if (type === 'display' && !isNaN(data)) {
                                // Format the number with commas and no decimal places
                                return parseFloat(data).toLocaleString('en-US', {
                                    maximumFractionDigits: 0
                                });
                            }
                            //return data;
                            return `<td class="text-muted fs-13">` + data + `</td>`;
                        }
                    },
                    {
                        targets: 10, // startdate column
                        render: function(data, type, row) {
                            let dateObj = new Date(row.startdate);
                            let referenceDate = new Date('1976-04-27');
                            if (!isNaN(dateObj) && dateObj.getTime() !== referenceDate.getTime()) {
                                if (row.startdate === null) {
                                    return `<td class="text-muted fs-13"></td>`;
                                }else{
                                    // Define Thai weekday and month arrays
                                    const thaiWeekdays = ['อา. ', 'จ. ', 'อ. ', 'พ. ', 'พฤ. ', 'ศ. ', 'ส. '];
                                    const thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                                    // Get the day, month, and year
                                    let day = dateObj.getDate(); // Get the day of the month
                                    let month = thaiMonths[dateObj.getMonth()]; // Get the abbreviated month name
                                    //let year = dateObj.getFullYear() % 100 + 543; // Get the last two digits of the year in BE
                                    let year = (dateObj.getFullYear() + 543) % 100; // Get last two digits of Buddhist year

                                    // Get the day of the week (0-6) and convert to Thai weekday name
                                    let weekday = thaiWeekdays[dateObj.getDay()];

                                    // Format the date as 'Weekday Day Month Year'
                                    let formattedDate = `${weekday} ${day} ${month} ${year}`;

                                    // Return the HTML with the formatted date
                                    return `<td class="text-muted fs-13">` + formattedDate + `</td>`;
                                }
                            }else{
                                return `<td class="text-muted fs-13"></td>`;
                            }
                        }
                    },
                    {
                        targets: 11, // inspectiondate column
                        render: function(data, type, row) {
                            let dateObj = new Date(row.inspectiondate);
                            let referenceDate = new Date('1976-04-27');
                            if (!isNaN(dateObj) && dateObj.getTime() !== referenceDate.getTime()) {
                                if (row.inspectiondate === null) {
                                    return `<td class="text-muted fs-13"></td>`;
                                }else{
                                    // Define Thai weekday and month arrays
                                    const thaiWeekdays = ['อา. ', 'จ. ', 'อ. ', 'พ. ', 'พฤ. ', 'ศ. ', 'ส. '];
                                    const thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                                    // Get the day, month, and year
                                    let day = dateObj.getDate(); // Get the day of the month
                                    let month = thaiMonths[dateObj.getMonth()]; // Get the abbreviated month name
                                    //let year = dateObj.getFullYear() % 100 + 543; // Get the last two digits of the year in BE
                                    let year = (dateObj.getFullYear() + 543) % 100; // Get last two digits of Buddhist year

                                    // Get the day of the week (0-6) and convert to Thai weekday name
                                    let weekday = thaiWeekdays[dateObj.getDay()];

                                    // Format the date as 'Weekday Day Month Year'
                                    let formattedDate = `${weekday} ${day} ${month} ${year}`;

                                    // Return the HTML with the formatted date
                                    return `<td class="text-muted fs-13">` + formattedDate + `</td>`;
                                }
                            }else{
                                return `<td class="text-muted fs-13"></td>`;
                            }
                        }
                    },
                    {
                        targets: 12, // lcduedate column
                        render: function(data, type, row) {
                            let dateObj = new Date(row.lcduedate);
                            let referenceDate = new Date('1976-04-27');
                            if (!isNaN(dateObj) && dateObj.getTime() !== referenceDate.getTime()) {
                                if (row.lcduedate === null) {
                                    return `<td class="text-muted fs-13"></td>`;
                                }else{
                                    // Define Thai weekday and month arrays
                                    const thaiWeekdays = ['อา. ', 'จ. ', 'อ. ', 'พ. ', 'พฤ. ', 'ศ. ', 'ส. '];
                                    const thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                                    // Get the day, month, and year
                                    let day = dateObj.getDate(); // Get the day of the month
                                    let month = thaiMonths[dateObj.getMonth()]; // Get the abbreviated month name
                                    //let year = dateObj.getFullYear() % 100 + 543; // Get the last two digits of the year in BE
                                    let year = (dateObj.getFullYear() + 543) % 100; // Get last two digits of Buddhist year

                                    // Get the day of the week (0-6) and convert to Thai weekday name
                                    let weekday = thaiWeekdays[dateObj.getDay()];

                                    // Format the date as 'Weekday Day Month Year'
                                    let formattedDate = `${weekday} ${day} ${month} ${year}`;

                                    // Return the HTML with the formatted date
                                    return `<td class="text-muted fs-13">` + formattedDate + `</td>`;
                                }
                            }else{
                                return `<td class="text-muted fs-13"></td>`;
                            }
                        }
                    },
                    
                    {
                        targets: 13, // pre_report_checked_date
                        render: function(data, type, row) {
                            let dateObj = new Date(row.pre_report_checked_date);
                            // Define the reference date
                            let referenceDate = new Date('1976-04-27');
                            if  (!isNaN(dateObj) && dateObj.getTime() !== referenceDate.getTime()) {
                                // Check if dateObj is invalid
                                if (row.pre_report_checked_date === null) {
                                    return `<td class="text-muted fs-13"></td>`;
                                }else{
                                    // Define Thai weekday and month arrays
                                    const thaiWeekdays = ['อา. ', 'จ. ', 'อ. ', 'พ. ', 'พฤ. ', 'ศ. ', 'ส. '];
                                    const thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                                    // Get the day, month, and year
                                    let day = dateObj.getDate(); // Get the day of the month
                                    let month = thaiMonths[dateObj.getMonth()]; // Get the abbreviated month name
                                    //let year = dateObj.getFullYear() % 100 + 543; // Get the last two digits of the year in BE
                                    let year = (dateObj.getFullYear() + 543) % 100; // Get last two digits of Buddhist year
                                    // Get the day of the week (0-6) and convert to Thai weekday name
                                    let weekday = thaiWeekdays[dateObj.getDay()];

                                    // Format the date as 'Weekday Day Month Year'
                                    let formattedDate = `${weekday} ${day} ${month} ${year}`;

                                    // Return the HTML with the formatted date
                                    return `<td class="text-muted fs-13">` + formattedDate + `</td>`;
                                }
                                
                            }else{
                                return `<td class="text-muted fs-13"></td>`;
                            }
                        }
                    },
                    {
                        targets: 14, // job_checked_date
                        render: function(data, type, row) {
                            let dateObj = new Date(row.job_checked_date);
                            // Define the reference date
                            let referenceDate = new Date('1976-04-27');
                            if (!isNaN(dateObj) && dateObj.getTime() !== referenceDate.getTime()) {
                                // Check if dateObj is invalid
                                if (row.job_checked_date === null) {
                                    return `<td class="text-muted fs-13"></td>`;
                                }else{
                                    // Define Thai weekday and month arrays
                                    const thaiWeekdays = ['อา. ', 'จ. ', 'อ. ', 'พ. ', 'พฤ. ', 'ศ. ', 'ส. '];
                                    const thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                                    // Get the day, month, and year
                                    let day = dateObj.getDate(); // Get the day of the month
                                    let month = thaiMonths[dateObj.getMonth()]; // Get the abbreviated month name
                                    //let year = dateObj.getFullYear() % 100 + 543; // Get the last two digits of the year in BE
                                    let year = (dateObj.getFullYear() + 543) % 100; // Get last two digits of Buddhist year
                                    // Get the day of the week (0-6) and convert to Thai weekday name
                                    let weekday = thaiWeekdays[dateObj.getDay()];

                                    // Format the date as 'Weekday Day Month Year'
                                    let formattedDate = `${weekday} ${day} ${month} ${year}`;

                                    // Return the HTML with the formatted date
                                    return `<td class="text-muted fs-13">` + formattedDate + `</td>`;
                                }
                            }else{
                                return `<td class="text-muted fs-13"></td>`;
                            }
                        }
                    },
                    {
                        targets: 15, // send_check_report_date column
                        render: function(data, type, row) {
                            let dateObj = new Date(row.send_check_report_date);
                            // Define the reference date
                            let referenceDate = new Date('1976-04-27');
                            if (!isNaN(dateObj) && dateObj.getTime() !== referenceDate.getTime()) {
                                // Check if dateObj is invalid
                                if (row.send_check_report_date === null) {
                                    return `<td class="text-muted fs-13"></td>`;
                                }else{
                                    // Define Thai weekday and month arrays
                                    const thaiWeekdays = ['อา. ', 'จ. ', 'อ. ', 'พ. ', 'พฤ. ', 'ศ. ', 'ส. '];
                                    const thaiMonths = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 
                                                        'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                                    // Get the day, month, and year
                                    let day = dateObj.getDate(); // Get the day of the month
                                    let month = thaiMonths[dateObj.getMonth()]; // Get the abbreviated month name
                                    //let year = dateObj.getFullYear() % 100 + 543; // Get the last two digits of the year in BE
                                    let year = (dateObj.getFullYear() + 543) % 100; // Get last two digits of Buddhist year
                                    // Get the day of the week (0-6) and convert to Thai weekday name
                                    let weekday = thaiWeekdays[dateObj.getDay()];

                                    // Format the date as 'Weekday Day Month Year'
                                    let formattedDate = `${weekday} ${day} ${month} ${year}`;

                                    // Return the HTML with the formatted date
                                    return `<td class="text-muted fs-13">` + formattedDate + `</td>`;
                                }
                            }else{
                                return `<td class="text-muted fs-13"></td>`;
                            }
                        }
                    },
                    {
                        targets: 16, // valuer column
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (row.valuer == 'มงคล') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mkc.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'สาโรจน์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/srp.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'นิรันดร') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/nda.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'วรงค์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/wrg.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'อานิพงศ์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/anp.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'ปริวรรต') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/prw.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'อธิวัฒน์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ath.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'มนต์ชัย') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mcm.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'ภัทรกร') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ptk.jpg')}})"></span></td>`;
                            } else if (row.valuer == 'ณัฐวุฒิ') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ntw.jpg')}})"></span></td>`;
                            }
                             else {
                                 return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/avatar.jpg')}})"></span></td>`;
                            }
                            
                        }
                    },
                    {
                        targets: 17, // headvaluer column
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (row.headvaluer == 'มงคล') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mkc.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'สาโรจน์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/srp.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'นิรันดร') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/nda.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'วรงค์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/wrg.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'อานิพงศ์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/anp.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'ปริวรรต') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/prw.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'อธิวัฒน์') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ath.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'มนต์ชัย') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/mcm.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'ภัทรกร') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ptk.jpg')}})"></span></td>`;
                            } else if (row.headvaluer == 'ณัฐวุฒิ') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/ntw.jpg')}})"></span></td>`;
                            }
                             else {
                                 return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/avatar.jpg')}})"></span></td>`;
                            }
                            
                        }
                    },
                    {
                        targets: 18, // do_advance
                        className: 'text-center',
                        render: function(data, type, row) {
                            return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/avatar.jpg')}})"></span></td>`;
                        }
                    },
                    {
                        targets: 19, // job_status column
                        render: function(data, type, row) {
                            if (row.job_status == 'In Progress') {
                                return `<td class="text-center">In Progress</td>`;
                            }else if (row.job_status == 'Completed') {
                                return `<td class="text-center">Completed</td>`;
                            }else if (row.job_status == 'On Hold') {
                                return `<td class="text-center">On Hold</td>`;
                            }else if (row.job_status == 'Cancel') {
                                return `<td class="text-center">Cancel</td>`;
                            }else {
                                 return `<td class="text-center"></td>`;
                            }
                        }
                    },
                    {
                        targets: 20,  // Adjust based on the index of another column to hide
                        visible: false // Hide the third column
                    },
                    {
                        targets: 21,  // Adjust based on the index of another column to hide
                        visible: false // Hide the third column
                    },
                    {
                        targets: 22,  // Adjust based on the index of another column to hide
                        visible: false // Hide the third column
                    },
                    {
                        targets: 23,  // Adjust based on the index of another column to hide
                        visible: false // Hide the third column
                    },
                    {
                        targets: 24,  // Adjust based on the index of another column to hide
                        visible: false // Hide the third column
                    },
                    {
                        targets: 25,  // file_name
                        visible: false // Hide the third column
                    },
                    {
                        targets: 26,  // projectname
                        visible: true // Hide the third column
                    },
                    
                ],
            
            });
    </script>

    {{-- Custom Function --}}
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
        <script>
            flatpickr("#startdate", {
                dateFormat: "d M Y",
                locale: "th",
                onReady: function(selectedDates, dateStr, instance) {
                // Convert and display the year in Thai Buddhist Era (พ.ศ.)
                const thaiBuddhistYear = instance.currentYear + 543;
                document.getElementById("startdate").value = dateStr.replace(instance.currentYear.toString(), thaiBuddhistYear.toString());   
                }
            });
            
            flatpickr("#inspectiondate", {
                dateFormat: "d M Y",
                locale: "th",
                onReady: function(selectedDates, dateStr, instance) {
                // Convert and display the year in Thai Buddhist Era (พ.ศ.)
                const thaiBuddhistYear = instance.currentYear + 543;
                document.getElementById("inspectiondate").value = dateStr.replace(instance.currentYear.toString(), thaiBuddhistYear.toString());
               
                },
            });

            flatpickr("#lcduedate", {
                dateFormat: "d M Y",
                locale: "th",
                onReady: function(selectedDates, dateStr, instance) {
                // Convert and display the year in Thai Buddhist Era (พ.ศ.)
                const thaiBuddhistYear = instance.currentYear + 543;
                document.getElementById("lcduedate").value = dateStr.replace(instance.currentYear.toString(), thaiBuddhistYear.toString());
               
                },
            });

            flatpickr("#clientduedate", {
                dateFormat: "d M Y",
                locale: "th",
                onReady: function(selectedDates, dateStr, instance) {
                // Convert and display the year in Thai Buddhist Era (พ.ศ.)
                const thaiBuddhistYear = instance.currentYear + 543;
                document.getElementById("clientduedate").value = dateStr.replace(instance.currentYear.toString(), thaiBuddhistYear.toString());
               
                },
            });

            flatpickr("#report_checked_date", {
                dateFormat: "d M Y",
                locale: "th",
                onReady: function(selectedDates, dateStr, instance) {
                // Convert and display the year in Thai Buddhist Era (พ.ศ.)
                const thaiBuddhistYear = instance.currentYear + 543;
                document.getElementById("report_checked_date").value = dateStr.replace(instance.currentYear.toString(), thaiBuddhistYear.toString());
               
                },
            });

            flatpickr("#approve_checked_date", {
                dateFormat: "d M Y",
                locale: "th",
                onReady: function(selectedDates, dateStr, instance) {
                // Convert and display the year in Thai Buddhist Era (พ.ศ.)
                const thaiBuddhistYear = instance.currentYear + 543;
                document.getElementById("approve_checked_date").value = dateStr.replace(instance.currentYear.toString(), thaiBuddhistYear.toString());
               
                },
            });
    </script>
  

@endsection <!-- script -->



