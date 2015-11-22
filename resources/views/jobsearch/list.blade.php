@section('stylesheet')
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/progress-bar.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/loading-bar.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
<script src="assets/global/scripts/loading-bar.min.js" type="text/javascript"></script>
@endsection

@section('content_list')

<!-- BEGIN CONTAINER -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content page-content-hack">
        <div class="job-conntent container">
            <div id="list-profile" class="dataTables_wrapper no-footer">
                <div class="list-profile">
                    <div ng-repeat="profile in profiles" class="list-item col-sm-12 wow bounceInRight animated">
                        <div class="item-content">
                            <div class="col-sm-2 profile-userpic">
                                <a class="cff-fullname" href="/profile?identity=<% profile['identity'] %>" target="_blank">
                                    <img ng-src="<% ('http://graph.facebook.com/' + profile['identity'] + '/picture?height=150&width=150') || 'assets/admin/pages/media/profile/profile_user.jpg' %>" alt="" class="cff-avatar">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="profile-usertitle-name">
                                        <a class="cff-fullname" target="_blank" href="/profile?identity=<% profile['identity'] %>"><% profile['fullname'] %></a>
                                    </div>
                                    <div class="profile-desc-text">Level: <span class="profile-usertitle-job"><% profile['level'] || 'Senior' %></span></div>
                                    <div class="profile-desc-text">Location: <span class="profile-usertitle-job"><% profile['location']['name'] || 'HCM' %></span></div>
                                    <div class="profile-desc-text">Skill: <span class="profile-usertitle-job"><% getSkills(profile) %></span></div>
                                    <div class="cff-button">
                                        <a href="/profile?identity=<% profile['identity'] %>" target="_blank" class="btn btn-xs green">
                                            View <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="mailto:<% profile['email'] || '' %>" class="btn btn-xs green">Send Email <i class="fa fa-envelope"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <!-- Characteristics -->
                            </div>
                            <div class="col-sm-4 cff-character-col">
                                <div class="row" ng-repeat="character in getCharacters(profile)">
                                    <div class="col-sm-3 caption-subject font-blue-madison bold"><% character.name %></div>
                                    <div class="portlet-body col-sm-6">
                                        <progress max="<% character.max %>" value="<% character.current %>" class="html5">
                                            <div class="progress-bar"></div>
                                        </progress>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <span class="font-red-intense bold" id='abc'><% character.current %></span>/<span class="bold" id='xyz'><% character.max %></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success" style="display: none" ng-click="loadMore()">Load More</button>
                <!-- End Pagination -->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- END CONTAINER -->

@endsection
