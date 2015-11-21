@extends('layouts.master')

@section('stylesheet')
<link href="assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/progress-bar.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
@endsection

@section('content')

<!-- BEGIN CONTAINER -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content page-content-hack">
        <div class="job-conntent container">
            <div id="list-profile" class="dataTables_wrapper no-footer" ng-app="itemApp" ng-controller='itemsController'>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-5 col-sm-5">
                            <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 5 of 25 records</div>
                        </div>
                    </div>
                </div>
                <div class="list-profile">
                    <?php //if (empty($profiles)): ?>
                        <!-- Show empty data -->
                    <?php //else: ?>
                        <?php $item = $profiles[0]; ?>
                            <div ng-repeat="profile in items" class="list-item col-sm-12">
                                <div class="item-content">
                                    <div class="col-sm-2 profile-userpic">
                                        <a class="cff-fullname" href="/profile?identity=<% profile['identity'] %>" target="_blank">
                                            <img src="http://graph.facebook.com/<% profile['identity'] %>/picture?height=150&width=150" || "assets/admin/pages/media/profile/profile_user.jpg" alt="" class="cff-avatar">
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
                                                <a href="<?php echo action('HomeController@profile', array('identity' => $item['identity'])); ?>" target="_blank" class="btn btn-xs green">
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

                <button class="btn btn-success" ng-click="loadMore()">Load More</button>
                <!-- End Pagination -->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- END CONTAINER -->

@endsection

@section('script')
<script>
jQuery(document).ready(function() {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
});
</script>
<script>
    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == $(document).height()) {
           console.log('bottom');
       }
    });
</script>
<script>
    var itemApp = angular.module('itemApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    itemApp.controller('itemsController', function($scope, $http) {
        $scope.items = [];
        $scope.lastpage=0;

        $scope.init = function() {
            $scope.lastpage=1;
            $http({
                url: '/api/user/search',
                method: "GET",
                params: {limit:  4, offset: 0}
            }).success(function(data, status, headers, config) {
                $scope.items = data;
            });
        };
        $scope.loadMore = function() {
            $scope.lastpage +=1;
            $http({
                url: '/api/user/search',
                method: "GET",
                params: {limit:  4, offset: $scope.lastpage*4}
            }).success(function(data, status, headers, config) {
                    Array.prototype.push.apply($scope.items, data);
                    console.log($scope.items);
                });
            };
        $scope.getSkills = function(user){
            var text = [];
            for (var i = 0; i < user.skills.length; i++)
            {
                text.push(user.skills[i].name);
            }
            return text.join(', ');
        };
        $scope.getCharacters = function(user){
            var characters = [];
            var character = null;
            for (var i = 0; i < user.characters.length; i++)
            {
                character = user.characters[i];
                if (!character.current)
                {
                    continue;
                }
                characters.push(character);
            }
            return characters;
        };

        $scope.init();
    });

</script>
@endsection
