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
    <meta charset="utf-8" />
    <title><?php echo $page_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="assets/global/css/plugins-md.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/css/progress-bar.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link id="style_color" href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed page-sidebar-closed-hide-logo page-container-bg-solid">
    <div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">

            <a href="">
                <?php echo $page_title; ?>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
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
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                Widget settings form goes here
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn blue">Save changes</button>
                                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN PAGE HEADER-->
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PROFILE SIDEBAR -->
                        <div class="col-md-5">
                        	<div class="portlet light col-sm-12">
                        		<div class="col-md-5">
                        			<div class="profile-picture">
                        				<img src="assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                        			</div>
                        		</div>
                        		<div class="col-md-7">
                        			<div class="col-profile-basic-info profile-usertitle">
                                		<div class="profile-usertitle-name"><?php echo $fullname ?></div>
                                		<div class="profile-desc-text">
                                			<div class="col-md-6 text-left">Mobile</div>
                                			<div class="col-md-6 text-left"><?php echo isset($mobile) ? $mobile : '123456789'; ?></div>
                                		</div>
                                		<div class="profile-desc-text">
                                			<div class="col-md-6 text-left">Gender</div>
                                			<div class="col-md-6 text-left"><?php echo isset($gender) ? $gender : 'Male'; ?></div>
                                		</div>
                                		<div class="profile-desc-text">
                                			<div class="col-md-6 text-left">Year of Birth</div>
                                			<div class="col-md-6 text-left"><?php echo isset($birthday) ? $birthday : '1992/07/25'; ?></div>
                                		</div>
                                		<div class="profile-desc-text">
                                			<div class="col-md-6 text-left">Degree</div>
                                			<div class="col-md-6 text-left"><?php echo isset($degree) ? $degree : 'Bachelor'; ?></div>
                                		</div>
                                		<div class="profile-desc-text">
                                			<div class="col-md-6 text-left">Location</div>
                                			<div class="col-md-6 text-left"><?php echo isset($current_city) ? $current_city : 'Ho Chi Minh'; ?></div>
                                		</div>
                                		<div class="profile-desc-text">
                                			<div class="col-md-6 text-left">Level</div>
                                			<div class="col-md-6 text-left profile-usertitle-job"><?php echo isset($level) ? $level : 'Sennior'; ?></div>
                                		</div>
                                	</div>
                        		</div>
                        	</div>
                            <!-- PORTLET MAIN -->
                            <div class="portlet light col-sm-12">
                            	<h4 class="profile-desc-title">Current Job</h4>
                                <div class="primary-link">
                                    <?php echo isset($current_job) ? htmlentities($current_job) : ''; ?>
                                	Front-end developer at Younetmedia
                                	<br>
                                	From 2014 to now
                                </div>
                                <!-- END STAT -->
                                <h4 class="profile-desc-title">Skills</h4>
                                <div class="primary-link">
                                    <?php echo isset($skills) ? $skills : 'HTML/CSS, HTML5/CSS3, JAVASCRIPTS, PHP, NODEJS'; ?>
                                </div>
                                <!-- END STAT -->
                                <h4 class="profile-desc-title">Hobbies</h4>
                                <div class="primary-link">
                                    <?php echo isset($skills) ? $skills : "Swimming, Reading Book, Football" ?>
                                </div>
                                <!-- END STAT -->
                                <h4 class="profile-desc-title">Page/Groups</h4>
                                <div class="primary-link">
                                    <?php echo isset($skills) ? $skills : "Lap Trinh PHP" ?>
                                </div>
                            </div>
                            <!-- END PORTLET MAIN -->
                        </div>
                        <!-- END BEGIN PROFILE SIDEBAR -->
                        <!-- BEGIN PROFILE CONTENT -->
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET -->
                                    <div class="portlet light">
                                        <div class="portlet-title">
                                            <div class="caption caption-md">
                                                <i class="icon-bar-chart theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Characteristics</span>
                                            </div>
                                        </div>
                                        <?php if (!empty($characteristics)): ?>
                                            <?php foreach ($characteristics as $key => $item) : ?>
                                                <div class="row">
        	                                        <div class="col-sm-2 caption-subject font-blue-madison bold"><?php echo $item["name"]; ?></div>
        	                                        <div class="portlet-body col-sm-8">
        	                                    		<progress max="<?php echo $item["max"]; ?>" value="<?php echo $item["current"]; ?>" class="html5">
        													<div class="progress-bar"></div>
        												</progress>
        											</div>
        	                                        <div class="col-sm-2 text-right">
        	                                        	<span class="font-red-intense bold" id='abc'><?php echo $item["current"]; ?></span>/<span class="bold"><?php echo $item["max"]; ?></span>
        	                                        </div>
        	                                    </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
	                                    <!-- <div class="row">
	                                        <div class="col-sm-2 caption-subject font-blue-madison bold">Teamwork</div>
	                                        <div class="portlet-body col-sm-8">
	                                    		<progress max="100" value="0" class="html5">
													<div class="progress-bar"></div>
												</progress>
											</div>
	                                        <div class="col-sm-2 text-right">
	                                        	<span class="font-red-intense bold" id='abc'>0</span>/<span class="bold" id='xyz'>1000</span>
	                                        </div>
	                                    </div> -->
                                    </div>
                                    <!-- END PORTLET -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET -->
                                    <div class="portlet light">
                                        <div class="portlet-title row">
                                            <div class="caption caption-md col-md-9">
                                                <span class="caption-subject font-blue-madison bold uppercase">Active Stream</span>
                                            </div>
                                            <div class="form-group">
												<div class="col-md-3">
                                                    <form method="post" action="#">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    													<select id="activity-view-mode" class="form-control">
    														<option value="0">Last Activity</option>
    														<option value="1">Most related mentions</option>
    													</select>
                                                    </form>
												</div>
											</div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                <div class="general-item-list">
                                                    <?php if (!empty($activities)): ?>
                                                        <?php foreach ($activities as $key => $item) : ?>
                                                            <div class="item">
                                                                <div class="item-head">
                                                                    <div class="item-details">
                                                                        <img class="item-pic" src="{{ $item['avatar'] }}">
                                                                        <a href="" class="item-name primary-link">{{ $item['fullname'] }}</a>
                                                                        <span class="item-label">{{ $item['created_at'] }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-body">
                                                                    {{ $item['content'] }}
                                                                </div>
                                                                <?php if (!empty($item['characteristics'])): ?>
                                                                    <div class="item-footer btn-group-xs">
                                                                        <?php foreach ($item['characteristics'] as $tag) : ?>
                                                                            <button type="button" class="btn green">{{ $tag }}</button>
                                                                        <?php endforeach; ?>
                                                                        <button type="button" class="btn green">Teamwork</button>
                                                                        <button type="button" class="btn green">etc</button>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <!-- <div class="item">
                                                                <div class="item-head">
                                                                    <div class="item-details">
                                                                        <img class="item-pic" src="assets/admin/layout/img/avatar4.jpg">
                                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                                        <span class="item-label">3 hrs ago</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-body">
                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                                </div>
                                                                <div class="item-footer btn-group-xs">
                                                                    <button type="button" class="btn red">Open</button>
                                                                    <button type="button" class="btn green">Teamwork</button>
                                                                    <button type="button" class="btn green">etc</button>
                                                                </div>
                                                            </div> -->
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PORTLET -->
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
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
            2014 &copy; Metronic by keenthemes. <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
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
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    $(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        Profile.init(); // init page demo

        $("#activity-view-mode").on("change", function(e) {
            console.log(e.target);
            var params = {
                view_mode : $(e.target).val(),
                _token : "{{ csrf_token() }}"
            }
            $.ajax({
                method: "POST",
                url: "<?php echo url('/api/characteristic') ?>",
                data: params
            })
            .done(function( response ) {
                alert( "Data Saved: " + response );
            })
            .fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });

    });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>
