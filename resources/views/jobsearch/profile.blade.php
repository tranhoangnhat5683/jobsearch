@extends('layouts.master')

@section('stylesheet')
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/progress-bar.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
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
                                <img src="{{ isset($avatar) ? $avatar : 'assets/admin/pages/media/profile/profile_user.jpg' }}" class="img-responsive" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="col-profile-basic-info">
                                <div class="col-md-12 profile-usertitle-name text-left">{{ isset($fullname) ? $fullname : '' }}
                                    <a target="_blank" href="//www.facebook.com/{{$identity}}" class="item-label fb-link">
                                        <i class="fa fa-facebook-square fa-2x"></i>
                                    </a>
                                </div>
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
                                    <div class="col-md-6 text-left">{{ isset($location['name']) ? $location['name'] : 'Ho Chi Minh City' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PORTLET MAIN -->
                    <div class="portlet light col-sm-12">
                        <h4 class="profile-desc-title">Jobs</h4>
                        <div class="primary-link">
                            @if (isset($jobs))
                                <ul class="profile-job-list">
                                @foreach ($jobs as $job)
                                    <li class="profile-job-item">{{ htmlentities($job) }}</li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- END STAT -->
                        <h4 class="profile-desc-title">Skills</h4>
                        <div class="primary-link">
                            <?php echo isset($skill_list) ? $skill_list : '' ; ?>
                        </div>
                        <!-- END STAT -->
                        <h4 class="profile-desc-title">Hobbies</h4>
                        <div class="primary-link">
                            <?php echo isset($hobby_list) ? $hobby_list : "" ?>
                        </div>
                        <!-- END STAT -->
                        <h4 class="profile-desc-title">Page/Groups</h4>
                        <div class="primary-link">
                            <?php echo isset($page_list) ? $page_list : "" ?>
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
                            <div class="portlet light portlet-right" id="characters-portlet">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Characters</span>
                                    </div>
                                </div>
                                @if (!empty($characters))
                                    @foreach ($characters as $item)
                                        @if ($item["current"] > 0)
                                            <div class="row">
                                                <div class="col-sm-2 caption-subject font-blue-madison bold"><?php echo $item["name"]; ?></div>
                                                <div class="portlet-body col-sm-8">
                                                    <progress max="<?php echo $item["max"]; ?>" value="<?php echo $item["current"]; ?>" class="html5">
                                                        <div class="progress-bar"></div>
                                                    </progress>
                                                </div>
                                                <div class="col-sm-2 text-right" data-toggle="tooltip" data-placement="top" title="{{ $item['current'] }} scores/ {{ $item['max'] }} max scores">
                                                    <span class="font-red-intense bold" title="{{ $item['current'] }} scores/ {{ $item['max'] }} max scores">{{ $item['current'] }}</span>/<span class="bold" title="{{ $item['current'] }} scores/ {{ $item['max'] }} max scores">{{ $item['max'] }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <!-- END PORTLET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light portlet-right" id="active-stream-portlet">
                                <div class="portlet-title">
                                    <div class="caption caption-md col-md-9">
                                        <span class="caption-subject font-blue-madison bold uppercase">Active Stream</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <!-- <form method="post" action="#">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <select id="activity-view-mode" class="form-control">
                                                    <option value="0">Last Activity</option>
                                                    <option value="1">Most related mentions</option>
                                                </select>
                                            </form> -->
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
                                                                <!-- <a target="_blank" href="//www.facebook.com/{{$item['identity']}}" class="item-name primary-link">{{ isset($item['fullname']) ? $item['fullname'] : 'No name' }}</a> -->
                                                                Posted at
                                                                <a target="_blank" href="//www.facebook.com/{{$item['id']}}" class="item-label">{{ date('Y-m-d H:i:s', strtotime($item['created_at'])) }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="item-body">
                                                            {{ $item['message'] }}
                                                        </div>
                                                        <?php if (!empty($item['characteristics'])): ?>
                                                            <div class="item-footer btn-group-xs">
                                                                <?php foreach ($item['characteristics'] as $key => $tag) : ?>
                                                                    <button type="button" class="btn {{ isset($characters_colors[$key]) ? $characters_colors[$key] : '' }}">{{ $tag }}</button>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
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
@endsection

@section('script')
<script>
$(document).ready(function() {
    // initiate layout and plugins
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Profile.init(); // init page demo

    $('[data-toggle="tooltip"]').tooltip();
    /*$("#activity-view-mode").on("change", function(e) {
        $.ajax({
            method      : "POST",
            url         : "<?php echo url('/api/characteristic') ?>",
            data        : {
                _token      : "{{ csrf_token() }}",
                view_mode   : $(e.target).val()
            }
        })
        .done(function( response ) {
            alert( "Data Saved: " + response );
        })
        .fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });*/
});
</script>
@endsection
