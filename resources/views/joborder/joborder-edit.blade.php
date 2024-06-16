@extends('layouts.app')
  
@section('content')
    {{-- {{$id}} --}}
    @livewire('job-order-edit', ['edit_id' => $id])
@endsection

@section('scripts')

		<!-- Bootstrap-Date Range Picker js-->
		<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>

		<!-- jQuery UI Date Picker js -->
		<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>

		<!-- bootstrap-datepicker js (Date picker Style-01) -->
		<script src="{{asset('assets/plugins/bootstrap-datepicker/js/datepicker.js')}}"></script>

		<!-- Amaze UI Date Picker js-->
		<script src="{{asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>

		<!-- Simple Date Time Picker js-->
		<script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

		<!-- SELECT2 JS -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

		<!-- BOOTSTRAP MAX-LENGTH JS -->
		<script src="{{asset('assets/plugins/bootstrap-maxlength/dist/bootstrap-maxlength.min.js')}}"></script>

		<!--Internal Fileuploads js-->
		<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>

		<!--Internal Fancy uploader js-->
		<script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
		<script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
        
        
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

        </script>
		 
		 <script>
            document.getElementById('openModal').addEventListener('click', function() {
                var myModal = new bootstrap.Modal(document.getElementById('addJobOrderModal'));
                myModal.show();
            });
        </script>

        <script>
            function confirmEdit($continue) {
                if (confirm('ยืนยันการการบันทึกข้อมูล?')) {
                        Livewire.emit('callUpdate');
                }
            }
        </script>

        <script>
            function updateValue() {
                if (confirm('ยืนยันการการบันทึกข้อมูล?')) {
                        Livewire.emit('updateValue');
                }
            }
        </script>

        



@endsection