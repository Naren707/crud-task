    <!-- Core JS files -->
    <script src="{{ asset('assets/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/ui/prism.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/buttons/hover_dropdown.min.js') }}"></script>

	<script src="{{ asset('assets/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>

	<script src="{{ asset('assets/admin_assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/demo_pages/layout_fixed_sidebar_custom.js') }}"></script>
	<!-- /theme JS files -->

	<script src="{{ asset('formvalidation/js/formValidation.min.js') }}"></script>
    <script src="{{ asset('formvalidation/js/framework/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>


	<script src="{{ asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('assets/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
	<script src="{{ asset('assets/admin_assets/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/admin_assets/js/summernote.js') }}"></script>

	<script src="{{ asset('admin_assets/assets/libs/growl/growl.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker-standalone.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>

    <script>

        // Get laravel csrf token
		function currentToken() {
			return "{{ csrf_token() }}";
		}

		$(document).ready(function() {
		$('.select2_picker').select2();
		});

		$(document).ready(function() {
		$('.summernote').summernote();
		});

		//$(document).ready(function() {
        //$('#offer_week_days').multiselect();
		//});

        //Datatable initialisation
		//$('.datatable-save-state').DataTable({
         //   stateSave: true
       // });
        //promoCode();
          function promoCode() {

              if(document.getElementById('promo_code_avail').value == 0){
                  document.getElementById('promo_code').disabled = true;
              }
              else if(document.getElementById('promo_code_avail').value == 1){
                  document.getElementById('promo_code').disabled = false;
              }

              }
        //giftCard();
        function giftCard() {

            if(document.getElementById('gift_card_avail').value == 0){
                document.getElementById('gift_card').disabled = true;
            }
            else if(document.getElementById('gift_card_avail').value == 1){
                document.getElementById('gift_card').disabled = false;
            }

        }

         function roomLimit(){
              var r1 = $("#room_booked").val();
              $ajax({
                  type:"POST",
                  datatype:"TEXT",
                  success: function (data) {

                  }

              })








         }



		  function checkIfYes() {
			  if (document.getElementById('defect').value == 'Yes') {
				document.getElementById('extra').style.display = '';
				document.getElementById('auth_by').disabled = false;
				document.getElementById('desc').disabled = false;
			  }
			  else {
				document.getElementById('extra').style.display = 'none';
		  }
		}

			$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});

		$(document).ready(function(){

	  //hides dropdown content
	  $(".size_chart").hide();

	  //unhides first option content
	  $("#option1").show();

	  //listen to dropdown for change
	  $("#size_select").change(function(){
		//rehide content on change
		$('.size_chart').hide();
		//unhides current item
		$('#'+$(this).val()).show();
	  });

	});

			$('#datetimepicker').datetimepicker({
    format: 'hh:mm:ss'
});
    </script>

	@include('admin.layouts.validation')
    @include('admin.layouts.ajax')

</body>

</html>
