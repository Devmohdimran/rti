	<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
	<!--plugins-->
	<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/chartjs/chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/jquery-knob/excanvas.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/jquery-knob/jquery.knob.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/form-repeater/repeater.js')); ?>"></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	
		  $(function() {
			  $(".knob").knob();
		  });
	 
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
	<script src="<?php echo e(asset('assets/js/index.js')); ?>"></script>
	<!--app JS-->
	<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/branch/inc/js_script.blade.php ENDPATH**/ ?>