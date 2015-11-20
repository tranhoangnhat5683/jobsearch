
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Job search</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="code for food"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/select2.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- <link rel="shortcut icon" href="favicon.ico"/>	 -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<?php echo $page_title; ?>
			<img src="assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content page-content-hack">
			<div class="job-finder-box container" id="job-finder-box">
				<div class="job-finder-content">
					<div class="job-finder-form">
						<h1 class="text-center">Find Employee <br class="visible-xs"><strong>Human Up!</strong></h1>
						<div class="form-content">
							<form class="" action="" method="get" accept-charset="utf-8">
								<div class="row">
									<div class="form-group col-md-12">
										<label>Characteristics</label>
										<input type="text" class="form-control input-lg" placeholder="Nhập tính cách cần tìm...">
										<button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false">
											Careful </button>
										<button type="button" class="btn btn-default active" data-toggle="button" aria-pressed="true">
													Active </button>
										<button type="button" class="btn red active" data-toggle="button" aria-pressed="true">
													Open </button>
										<button type="button" class="btn blue active" data-toggle="button" aria-pressed="true">
													Teamwork </button>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Categories</label>
										<select class="form-control js-example-basic-multiple" id="input-category" multiple="multiple">
											<option>Công Nghệ Thông tin</option>
											<option>Accounting</option>
											<option>Arts/Design</option>
											<option>Architecture/Interior Design</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label>Level</label>
										<select class="form-control" id="input-level" multiple="multiple">
											<option>Junior</option>
											<option>Sennior</option>
											<option>Manager</option>
										</select>
									</div>

								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label>Location</label>
										<select class="form-control js-example-basic-multiple" multiple="multiple" id="input-location">
											<option>Hồ Chí Minh</option>
											<option>Hà Nội</option>
											<option>Phú Yên</option>
											<option>Đà Lạt</option>
											<option>Mỹ Tho</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label>Độ Tuổi</label>
										<select class="form-control" id="input-old">
											<option>18 - 24</option>
											<option>25 - 30</option>
											<option>31 - 40</option>
											<option>41 - 50</option>
											<option>Trên 50</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group form-md-line-input">
										<label class="col-md-2 control-label" for="form_control_1">Sex</label>
										<div class="col-md-10">
											<div class="md-radio-inline">
												<div class="md-radio">
													<input type="radio" id="radio53" name="radio2" class="md-radiobtn" checked="">
													<label for="radio53">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span>
													All </label>
												</div>
												<div class="md-radio">
													<input type="radio" id="radio54" name="radio2" class="md-radiobtn" >
													<label for="radio54">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Male </label>
												</div>
												<div class="md-radio">
													<input type="radio" id="radio55" name="radio2" class="md-radiobtn">
													<label for="radio55">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Female </label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-right">
									<a href="javascript:;" class="btn btn-lg blue text-right">
										Search <i class="fa fa-search"></i>
									</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; Innovation Job Search Hackathon's <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">aa</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/scripts/select2.full.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script>
   	jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
    });
</script>
<script>
	$("#input-location").select2({
		placeholder: "Select a location",
		allowClear: true
	});
	$("#input-category").select2({
		placeholder: "All category",
		allowClear: true
	});
	$("#input-level").select2({
		placeholder: "All level",
		allowClear: true
	});
	$("#input-old").select2({
		placeholder: "All old",
		allowClear: true
	});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
