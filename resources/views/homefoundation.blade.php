@extends('layouts.app-foundation')
@section('styles')
    <style>
        .dt-head-center {
            text-align: center;
        }
    </style>
@endsection  

@section('content')
    @livewire('home-foundation')
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

      

        function bindingPopup(value1,value2,value3) {
            Livewire.emit('bindingPopup',value1,value2,value3);
        }

         function bindingPopupEditData(value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11,value12,value13,value14,value15,value16) {
            Livewire.emit('bindingPopupEditData',value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,value11,value12,value13,value14,value15,value16);
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
            var table = $('#home-data-table').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": {
                    "url": "{{ route('home_fund_data') }}", 
                    "type": "GET",
                    "error": function(xhr, error, code) {
                        console.log(xhr.responseText);
                        alert('Error: ' + code);
                    }
                },
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "id" },
                    { "data": "prop_type" },
                    { "data": "prop_name" },
                    { "data": "prop_location" },
                    { "data": "deed_no" },
                    { "data": "rai" },
                    { "data": "ngan" },
                    { "data": "wha" },
                    { "data": "owner" },
                    { "data": "prop_status" },
                    { "data": "owner_how" },
                    { "data": "certificate" },
                    { "data": "prop_operator" },
                    { "data": "prop_operator2" },
                    { "data": "remark" },
                    { "data": "gps" }
                ],
                columnDefs: [
                     {
                        targets: 1, // prop type
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (data === 'รพ') {
                                //return `<td class="text-center"><img src="{{ asset('storage/icons/hospital32.png') }}"></td>`;
                                 return `<td class="text-center"><a href="javascript:void(0)" onclick="bindingPopupEditData('` + row.id + `','` + row.prop_type + `','` + row.prop_name + `','` + row.prop_location + `','` + row.deed_no + `','`  + row.rai + `','` + row.ngan + `','` + row.wha + `','` + row.owner + `','` + row.prop_status + `','` + row.owner_how + `','` + row.certificate  + `','` + row.prop_operator + `','` + row.prop_operator2 + `','` + row.remark + `','` + row.gps + `')" class="text-dark" data-bs-target="#PopupHomeFoundEditData" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" ><img src="{{ asset('storage/icons/hospital32.png') }}"></p></a></td>`;
                            }else if (data === 'สนง') {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="bindingPopupEditData('` + row.id + `','` + row.prop_type + `','` + row.prop_name + `','` + row.prop_location + `','` + row.deed_no + `','`  + row.rai + `','` + row.ngan + `','` + row.wha + `','` + row.owner + `','` + row.prop_status + `','` + row.owner_how + `','` + row.certificate  + `','` + row.prop_operator + `','` + row.prop_operator2 + `','` + row.remark + `','` + row.gps + `')" class="text-dark" data-bs-target="#PopupHomeFoundEditData" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" ><img src="{{ asset('storage/icons/office32.png') }}"></p></a></td>`;
                            }else if (data === 'สุสาน') {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="bindingPopupEditData('` + row.id + `','` + row.prop_type + `','` + row.prop_name + `','` + row.prop_location + `','` + row.deed_no + `','`  + row.rai + `','` + row.ngan + `','` + row.wha + `','` + row.owner + `','` + row.prop_status + `','` + row.owner_how + `','` + row.certificate  + `','` + row.prop_operator + `','` + row.prop_operator2 + `','` + row.remark + `','` + row.gps + `')" class="text-dark" data-bs-target="#PopupHomeFoundEditData" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" ><img src="{{ asset('storage/icons/tombstone32.png') }}"></p></a></td>`;
                            }else if (data === 'รร') {
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="bindingPopupEditData('` + row.id + `','` + row.prop_type + `','` + row.prop_name + `','` + row.prop_location + `','` + row.deed_no + `','`  + row.rai + `','` + row.ngan + `','` + row.wha + `','` + row.owner + `','` + row.prop_status + `','` + row.owner_how + `','` + row.certificate  + `','` + row.prop_operator + `','` + row.prop_operator2 + `','` + row.remark + `','` + row.gps + `')" class="text-dark" data-bs-target="#PopupHomeFoundEditData" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" ><img src="{{ asset('storage/icons/school32.png') }}"></p></a></td>`;
                            }else{
                                //return `<td class="text-muted fs-13">` + data + `</td>`;
                                return `<td class="text-center"><a href="javascript:void(0)" onclick="bindingPopupEditData('` + row.id + `','` + row.prop_type + `','` + row.prop_name + `','` + row.prop_location + `','` + row.deed_no + `','`  + row.rai + `','` + row.ngan + `','` + row.wha + `','` + row.owner + `','` + row.prop_status + `','` + row.owner_how + `','` + row.certificate + `','` + row.prop_operator + `','` + row.prop_operator2 + `','` + row.remark + `','` + row.gps + `')" class="text-dark" data-bs-target="#PopupHomeFoundEditData" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + data + `</p></a></td>`;
                            } 
                        }
                    },
                    {
                        targets: 2, // prop name
                        render: function(data, type, row) {
                             //return `<td class="text-muted fs-13">` + data + `</td>`;
                             return `<td class="text-muted fs-13"><a href="javascript:void(0)" onclick="bindingPopup('` + row.id + `','` + row.prop_name + `','` + row.prop_location + `')" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" ><span style="color:green;font-weight: bold;text-decoration: underline;" >` + row.prop_name + `</p></a></td>`;
                        }
                    },
                    {
                        targets: 12, // staff
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (data == 'staff1') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/staff1.jpg')}})"></span></td>`;
                            } else if (data == 'staff2') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/staff2.jpg')}})"></span></td>`;
                            }else {
                                 return `<td class="text-center"></td>`;
                            }
                        }
                    },
                    {
                        targets: 13, // staff 2
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (data == 'staff1') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/staff1.jpg')}})"></span></td>`;
                            } else if (data == 'staff2') {
                                return `<td class="text-center"><span class="data-image avatar avatar-md rounded-circle" style="background-image: url({{asset('storage/avatars/staff2.jpg')}})"></span></td>`;
                            }else {
                                 return `<td class="text-center"></td>`;
                            }
                        }
                    },
                    {
                        targets: 15,       // GPS Index of the column to hide (0-based)
                        visible: false    // Set visibility to false
                    }
                ],
            
            });

    </script>

     <script>
        document.addEventListener('livewire:load', function () {
            var table =  $('#home-data-table').DataTable();
            // Listen for the 'userSaved' event emitted by Livewire
            Livewire.on('userSaved', function () {
                // Reload the DataTable
                table.ajax.reload(null, false); // Keep the current page
                alert("Save completed");
                $('#PopupHomeFoundEditData').modal('hide');
            });
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



