<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 text-center">
									Copyright © 2019 <a href="#">Spaner</a>. Designed by <a href="https://spruko.com/">Spruko Technologies Pvt.Ltd</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- footer End-->
				</div> <!-- Close div class="container content-area" -->
			</div> <!-- Close div class="page-main"" -->
		</div> <!-- Close div class="page"" -->

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>

		<!--Jquery js -->
		<script src="{{asset('external2/js/vendors/jquery-3.2.1.min.js')}}"></script>

		<!--Jquery.Sparkline js -->
		<script src="{{asset('external2/js/vendors/jquery.sparkline.min.js')}}"></script>

		<!--Circle-Progress js -->
		<script src="{{asset('external2/js/vendors/circle-progress.min.js')}}"></script>

		<!--Jquery.rating js -->
		<script src="{{asset('external2/plugins/jquery.rating/jquery.rating-stars.js')}}"></script>

		<!--Bootstrap.min js-->
		<script src="{{asset('external2/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('external2/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- Custom scroll bar Js-->
		<script src="{{asset('external2/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>


		<!--Sticky JS -->
		<script src="{{asset('external2/js/sticky.js')}}"></script>


		<!--Sidemenu js-->
		<script src="{{asset('external2/plugins/side-menu/side-menu.js')}}"></script>

		<!-- Sidemenu-responsive-tabs js-->
		<script src="{{asset('external2/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js')}}"></script>
		<script src="{{asset('external2/js/left-menu.js')}}"></script>

		<!--Horizontal js -->
		<script src="{{asset('external2/plugins/horizontal-menu/horizontal-menu.js')}}"></script>

		<!--Sticky JS -->
		<script src="{{asset('external2/js/sticky.js')}}"></script>

		<!-- Input Mask js -->
		<script src="{{asset('external2/plugins/jquery.mask/jquery.mask.min.js')}}"></script>

		<!-- Progress js-->
        <script src="{{asset('external2/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Chart js -->
		<script src="{{asset('external2/plugins/chart.js/chart.min.js')}}"></script>
		<script src="{{asset('external2/plugins/chart.js/chart.extension.js')}}"></script>

		<!--Jquery.knob js-->
		<script src="{{asset('external2/plugins/othercharts/jquery.knob.js')}}"></script>
		<script src="{{asset('external2/plugins/othercharts/othercharts.js')}}"></script>

		<!--Echart Plugin -->
		<script src="{{asset('external2/plugins/echart/echart.js')}}"></script>

		<!--Jquery.sparkline js-->
		<script src="{{asset('external2/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- peitychart -->
		<script src="{{asset('external2/plugins/peitychart/jquery.peity.min.js')}}"></script>

		<!--Counters -->
		<script src="{{asset('external2/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('external2/plugins/counters/waypoints.min.js')}}"></script>

		<!-- Sidebar js -->
		<script src="{{asset('external2/plugins/sidebar/sidebar.js')}}"></script>

		<!--Index js -->
		<script src="{{asset('external2/js/index.js')}}"></script>

		<!-- custom js -->
		<script src="{{asset('external2/js/custom.js')}}"></script>

		<!-- Datepicker js -->
		<script src="{{asset('external2/plugins/date-picker/date-picker.js')}}"></script>
		<script src="{{asset('external2/plugins/date-picker/jquery-ui.js')}}"></script>
		<script src="{{asset('external2/plugins/jquery.mask/jquery.maskedinput.js')}}"></script>

		<script>
		    $(document).ready(function(){
		      var date_input=$('input[name="invoicedate"]'); //our date input has the name "date"
		      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		      var options={
		        format: 'yyyy-mm-dd',
		        container: container,
		        todayHighlight: true,
		        autoclose: true,
		      };
		      date_input.datepicker(options);
		    })		
		</script>

		<script>
		    $(document).ready(function(){
		      var date_input=$('input[name="receiptdate"]'); //our date input has the name "date"
		      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		      var options={
		        format: 'yyyy-mm-dd',
		        container: container,
		        todayHighlight: true,
		        autoclose: true,
		      };
		      date_input.datepicker(options);
		    })
		</script>

	</body>

</html>