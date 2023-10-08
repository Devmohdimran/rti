
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo e(asset('web/assets/images/fav-orange.png')); ?>" type="image/png" />
	<!--plugins-->
	<link href="<?php echo e(asset('assets/plugins/simplebar/css/simplebar.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('assets/plugins/metismenu/css/metisMenu.min.css')); ?>" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo e(asset('assets/css/pace.min.css')); ?>" rel="stylesheet" />
	<script src="<?php echo e(asset('assets/js/pace.min.js')); ?>"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/bootstrap-extended.css')); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet">
	<title>RTI::Login Panel</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">

						<?php if(session('error')): ?>
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								<strong>Error!</strong> <?php echo e(session('error')); ?>

							</div>
						<?php elseif(session('failed')): ?>
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								<strong>Error!</strong> <?php echo e(session('failed')); ?>

							</div>
						<?php endif; ?>
									
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										
									</div>
									
									<div class="login-separater text-center mb-4"> <span>Login Panel</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-4" action="<?php echo e(route('loginPanelPost')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
											<div class="col-12">
												<label for="username" class="form-label">Username</label>
												<input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>

											<div class="col-12">
												<label for="password" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="password" value="" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>

											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
	<!--plugins-->
	<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\RTI\merazrti\resources\views/login/login.blade.php ENDPATH**/ ?>