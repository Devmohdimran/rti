<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
	<?php echo $__env->make('branch.inc.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<body>
		<!--wrapper-->
	<div class="wrapper">
		<?php echo $__env->make('branch.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--sidebar wrapper -->
		<?php echo $__env->make('branch.inc.left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php echo $__env->make('branch.inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<?php echo $__env->yieldContent('main'); ?>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright ©<?php echo e(date('Y')); ?>

				<a class="text-dark" href="https://www.cstechnology.org/" style="color:#FFFFFF;">CS-Technology.org</a> All Rights Reserved <a href="https://mail.hostinger.com/" class="text-white" style="cursor: pointer;">Webmail Login</a>
			</p>
		</footer>
	</div>
	<!--end wrapper-->
	
	<?php echo $__env->make('branch.inc.js_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('script'); ?>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/branch/app.blade.php ENDPATH**/ ?>