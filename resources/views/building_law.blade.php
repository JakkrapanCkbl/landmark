@extends('layouts.app-foundation')
@section('styles')
    <style>
        .dt-head-center {
            text-align: center;
        }
    </style>
@endsection  

@section('content')
    @livewire('building-law')
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

    <!-- CHARTJS JS -->
    <script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/chart/utils.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>

    

    {{-- for livewire properties --}}
    <script>

        function showSum(num1,num2) {
            Livewire.emit('showSum',num1,num2);
        }

        function addTwoNumbers(num1, num2) {
            // Emit the event to the Livewire component with the numbers
            Livewire.emit('addTwoNumbers', num1, num2);
        }

        function bindingPopup(value1,value2,value3) {
            Livewire.emit('bindingPopup',value1,value2,value3);
        }

        function opens3file(id,doc_type){
            Livewire.emit('opens3file',id,doc_type);
        }

        function bindingPopupEditData(value1,value2,value3,value4,value5,value6,value7,value8,value9,value10) {
            Livewire.emit('bindingPopupEditData',value1,value2,value3,value4,value5,value6,value7,value8,value9,value10);
        }

        function updateValue() {
            if (confirm('ยืนยันการการบันทึกข้อมูล?')) {
                    Livewire.emit('updateValue');
            }
        }

        function resetInput() {
            Livewire.emit('resetInput');
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
        function HidePopup() {
            alert("Save completed");
            $('#Vertically').modal('hide');
        }
    </script>

 
    <script>
            var table = $('#cityplan-data-table').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": {
                    "url": "{{ route('city_plan_data') }}", 
                    "type": "GET",
                    "error": function(xhr, error, code) {
                        console.log(xhr.responseText);
                        alert('Error: ' + code);
                    }
                },
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "id" },
                    { "data": "asa_no" },
                    { "data": "publish_date" },
                    { "data": "province" },
                    { "data": "description" },
                    { "data": "expire_date" },
                    { "data": "organization" },
                    { "data": "remark" },
                    { "data": "Map" },
                    { "data": "PDF" },
                    { "data": "Word" },
                    { "data": "Print" },
                    { "data": "doc_group" },
                    { "data": "law_type" }
                ],
                columnDefs: [

                    {
                        targets: 0, //  id
                        className: 'text-center',
                        render: function(data, type, row) {
                            return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="bindingPopup('` + row.id + `','` + row.province + `','` + row.description + `')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.id + `</p></a></td>`;
                        }
                    },
                    {
                        targets: 4, //  description
                        render: function(data, type, row) {
                            return `<td class="text-center"><a href="javascript:void(0)" onclick="bindingPopupEditData('` + row.id + `','` + row.doc_group + `','` + row.asa_no + `','` + row.publish_date + `','` + row.law_type + `','`  + row.province + `','` + row.description + `','` + row.expire_date + `','` + row.organization + `','` + row.remark + `')" class="text-dark" data-bs-target="#PopupCityplanEditData" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.description + `</p></a></td>`;

                            //return `<td class="text-center">` + row.description + `</td>`;
                        }
                    },
                    {
                        targets: 8, //  Map
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (row.Map === "True") {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="opens3file('` + row.id +  `','cityplan_map')"  class="text-dark" data-bs-target="#viewfile" data-bs-toggle="modal" ><i class="fa fa-file-pdf-o fa-2x" data-bs-toggle="tooltip" title="PDF" data-bs-original-title="fa fa-file-pdf-o fa-2x" aria-label="fa fa-file-pdf-o fa-2x" style="color: red;"></i></a></td>`;
                            } else {
                                 return `<td class="text-center text-muted"></td>`;
                            }
                        }
                    },
                    {
                        targets: 9, //  PDF
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (row.PDF === "True") {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="opens3file('` + row.id +  `','cityplan_pdf')"  class="text-dark" data-bs-target="#viewfile" data-bs-toggle="modal" ><i class="fa fa-file-pdf-o fa-2x" data-bs-toggle="tooltip" title="PDF" data-bs-original-title="fa fa-file-pdf-o fa-2x" aria-label="fa fa-file-pdf-o fa-2x" style="color: green;"></i></a></td>`;
                            } else {
                                 return `<td class="text-center text-muted"></td>`;
                            }
                        }
                    },
                    {
                        targets: 10, //  Word
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (row.Word === "True") {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="opens3file('` + row.id +  `','cityplan_word')"  class="text-dark"><i class="fa fa-file-word-o fa-2x" data-bs-toggle="tooltip" title="Word" data-bs-original-title="fa fa-file-word-o fa-2x" aria-label="fa fa-file-word-o fa-2x" style="color: purple;"></i></a></td>`;
                            } else {
                                return `<td class="text-center text-muted"></td>`;
                            }
                        }
                    },
                    {
                        targets: 11, //  Print
                        className: 'text-center',
                        render: function(data, type, row) {
                           //if (row.Print === null || row.Print === undefined) {
                                //return `<td class="text-center text-muted"></td>`;
                            //} else {
                                //return `<td class="text-center"><a href="javascript:void(0)" onclick="opens3file('` + row.id +  `','cityplan_print')"  class="text-dark" data-bs-target="#viewfile" data-bs-toggle="modal" ><i class="fa fa-file-pdf-o fa-2x" data-bs-toggle="tooltip" title="PDF" data-bs-original-title="fa fa-file-pdf-o fa-2x" aria-label="fa fa-file-pdf-o fa-2x" style="color: red;"></i></a></td>`;
                            //}

                            if (row.Print === "True") {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="opens3file('` + row.id +  `','cityplan_print')"  class="text-dark" data-bs-target="#viewfile" data-bs-toggle="modal" ><i class="fa fa-file-pdf-o fa-2x" data-bs-toggle="tooltip" title="PDF" data-bs-original-title="fa fa-file-pdf-o fa-2x" aria-label="fa fa-file-pdf-o fa-2x" style="color: blue;"></i></a></td>`;
                            } else {
                                return `<td class="text-center text-muted"></td>`;
                            }
                           
                           
                        }
                    },
                    {
                        targets: 12, //  doc_group
                        visible: false,
                    },
                    {
                        targets: 13, //  law_type
                        visible: false,
                    }
                ],
            
            });

    </script>

     <script>
        document.addEventListener('livewire:load', function () {
            //start --

            var table =  $('#home-data-table').DataTable();
            // Listen for the 'userSaved' event emitted by Livewire
            Livewire.on('userSaved', function () {
                // Reload the DataTable
                table.ajax.reload(null, false); // Keep the current page
                alert("Save completed");
                $('#PopupHomeFoundEditData').modal('hide');
            });
            //end--
        });
    </script>
        
    <script>
        document.addEventListener('livewire:load', function () {
            // Listen for the 'reloadPage' event emitted by Livewire
            Livewire.on('reloadPage', function () {
                // Reload the entire page
                location.reload();
            });
        });
    </script>

@endsection <!-- script -->



