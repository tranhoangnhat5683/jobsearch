@extends('layouts.master')


@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content page-content-hack">
		<!-- Box search -->
		<div class="job-finder-box container" id="job-finder-box">
			<div class="job-finder-content">
				<div class="job-finder-form">
					<h1 class="text-center">FIND HIGH <strong>EQ TALENT!</strong></h1>
					<div class="form-content">
						<form class="" action="" method="get" accept-charset="utf-8">
							<div class="row">
								<div class="form-group col-md-12">
									<!-- <label>Characteristics</label> -->
									<!-- <input type="text" class="form-control input-lg" id="input-character" placeholder="..." autofocus> -->
									<select class="form-control js-example-basic-multiple" id="input-character" multiple="multiple">
										@foreach ($characters as $key => $character)
											<option value="{{ $key }}">{{ $character }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<!-- <label>Skill</label> -->
									<!-- <input type="text" class="form-control input-lg" id="input-skill" multiple="multiple" placeholder="Nhập tính cách cần tìm..."> -->
									<select class="form-control js-example-basic-multiple" id="input-skill" multiple="multiple">
										@foreach ($skills as $key => $skill)
											<option value="{{ $key }}">{{ $skill }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-6">
									<!-- <label>Location</label> -->
									<select class="form-control js-example-basic-multiple" id="input-location" multiple="multiple">
										@foreach ($locations as $key => $location)
											<option value="{{ $key }}">{{ $location }}</option>
										@endforeach
									</select>
								</div>

							</div>
							<div class="text-center">
								<a href="javascript:void(0)" id="btn-search" class="btn btn-lg blue text-right">
									Search <i class="fa fa-search"></i>
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT-->
		<!-- List profile -->
		<div id="list-profile" class="dataTables_wrapper no-footer" ng-app="itemApp" ng-controller='itemsController'>
            <div class="list-profile">
                <div ng-repeat="profile in items" class="list-item col-sm-12 wow bounceInRight animated">
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
</div>
<!-- END CONTENT -->
@endsection

@section('script')
<script>
	jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
    });
	$("#input-location").select2({
		placeholder: "All locations",
		allowClear: true,
		maximumSelectionLength: 4
	});
	$("#input-category").select2({
		placeholder: "All categories",
		allowClear: true,
		maximumSelectionLength: 3
	});
	$("#input-skill").select2({
		placeholder: "All skills",
		allowClear: true,
		maximumSelectionLength: 4
	});

	$("#input-character").select2({
		placeholder: "Enter characters",
		allowClear: true,
		maximumSelectionLength: 5
	});
	$("#input-character").select2("open");

	$("#btn-search").on("click", function(e) {
		var params = {
			_token    : "{{ csrf_token() }}",
			character : $("#input-character").val(),
			skill     : $("#input-skill").val(),
			location  : $("#input-location").val()
		};
		var url = "{{ url('/list') }}?" + $.param(params);
		location.href = url;
    });

</script>
<script>
    var itemApp = angular.module('itemApp', ['angular-loading-bar'], function($interpolateProvider) {
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
