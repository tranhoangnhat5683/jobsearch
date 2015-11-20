@extends('layouts.master')

@section('stylesheet')
<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/progress-bar.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
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
											<select id="activity-view-mode" class="form-control">
												<option value="0">Last Activity</option>
												<option value="1">Most related mentions</option>
											</select>
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
@endsection

@section('script')
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
            _token      : "{{ csrf_token() }}",
            view_mode   : $(e.target).val()
        }
        $.ajax({
            url: "{{ url('/api/page/search') }}",
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
@endsection
