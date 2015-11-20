
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>EQ Job Search</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<link href="assets/global/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
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
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
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
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/global/scripts/select2.full.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="assets/admin/pages/scripts/components-jqueryui-sliders.js"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script>
      jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		ComponentsjQueryUISliders.init();
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
