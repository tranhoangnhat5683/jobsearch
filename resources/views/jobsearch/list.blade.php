@extends('layouts.master')

@section('stylesheet')
<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/progress-bar.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content page-content-hack">
            <div class="job-conntent container">
                <div id="list-profile" class="dataTables_wrapper no-footer">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="col-md-5 col-sm-5">
                                <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 5 of 25 records</div>
                            </div>
                            <div class="pull-right" id="sample_1_length">
                                <label>Show
                                    <select name="sample_1_length" aria-controls="sample_1" class="form-control input-xsmall input-inline">
                                        <option value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="-1">All</option>
                                    </select> records
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="list-profile">
                        <?php if (empty($profiles)): ?>
                            <!-- Show empty data -->
                        <?php else: ?>
                            <?php foreach ($profiles as $item) : ?>
                                <div class="list-item col-sm-12">
                                    <div class="item-content">
                                        <div class="col-sm-2 profile-userpic">
                                            <img src="{{ isset($item['avatar']) ? $item['avatar'] : 'assets/admin/pages/media/profile/profile_user.jpg' }}" alt="" class="cff-avatar">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="profile-usertitle-name">{{ $item['fullname'] }}</div>
                                                <div class="profile-desc-text">Level: <span class="profile-usertitle-job">{{ isset($item['level']) ? $item['level'] : 'Senior' }}</span></div>
                                                <div class="profile-desc-text">Location: <span class="profile-usertitle-job">{{ isset($item['location']['name']) ? $item['location']['name'] : 'HCM' }}</span></div>
                                                <div class="profile-desc-text">Skill: <span class="profile-usertitle-job">{{ isset($item['skill_list']) ? $item['skill_list'] : '' }}</span></div>
                                                <div class="cff-button">
                                                    <a href="<?php echo action('HomeController@profile', array('identity' => $item['identity'])); ?>" class="btn btn-xs green">
                                                        View <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="mailto:{{ isset($item['email']) ? $item['email'] : '' }}" class="btn btn-xs green">Send Email <i class="fa fa-envelope"></i>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            Characteristics
                                        </div>
                                        <div class="col-sm-4 cff-character-col">
                                            <?php if (!empty($characters)): ?>
                                                <?php foreach ($characters as $item) : ?>
                                                    <div class="row">
                                                        <div class="col-sm-3 caption-subject font-blue-madison bold">{{ $item['name'] }}</div>
                                                        <div class="portlet-body col-sm-6">
                                                            <progress max="{{ $item['max'] }}" value="{{ $item['current'] }}" class="html5">
                                                                <div class="progress-bar"></div>
                                                            </progress>
                                                        </div>
                                                        <div class="col-sm-3 text-right">
                                                            <span class="font-red-intense bold" id='abc'>{{ $item['current'] }}</span>/<span class="bold" id='xyz'>{{ $item['max'] }}</span>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            <!-- Demo data -->
                                            <div class="row">
                                                <div class="col-sm-3 caption-subject font-blue-madison bold">Positi</div>
                                                <div class="portlet-body col-sm-6">
                                                    <progress max="100" value="80" class="html5">
                                                        <div class="progress-bar"></div>
                                                    </progress>
                                                </div>
                                                <div class="col-sm-3 text-right">
                                                    <span class="font-red-intense bold" id='abc'>777</span>/<span class="bold" id='xyz'>1000</span>
                                                </div>
                                            </div>
                                            <!-- End Demo data -->
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="text-center" id="cff-pagination">
                                <ul class="pagination" style="visibility: visible;">
                                    <li class="prev disabled"><a href="#" title="First"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
                                    <li class="next"><a href="#" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Pagination -->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@endsection

@section('script')
<script>
jQuery(document).ready(function() {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    ChartsAmcharts.init(); // init demo charts
});
</script>
@endsection
