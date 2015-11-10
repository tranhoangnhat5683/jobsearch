@extends('app')
 
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
    <div class="container" ng-app="itemApp" ng-controller="itemsController">
        <div class="row">
           <ul>
                <li ng-repeat="item in items"> <% item.joke %></li>
           </ul>
        <button class="btn btn-success" ng-click="loadMore()">Load More</button>
 
        </div>
    </div>
 
 
    <script>
        var itemApp = angular.module('itemApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
 
        itemApp.controller('itemsController', function($scope, $http) {
 
            $scope.items = [];
            $scope.lastpage=1;
 
            $scope.init = function() {
                $scope.lastpage=1;
                $http({
                    url: '/api/v1/jokes',
                    method: "GET",
                    params: {page:  $scope.lastpage}
                }).success(function(data, status, headers, config) {
                    $scope.items = data.data;
                    $scope.currentpage = data.current_page;
                });
            };
            $scope.loadMore = function() {
                    $scope.lastpage +=1;
                    $http({
                url: '/api/v1/jokes',
                method: "GET",
                params: {page:  $scope.lastpage}
                }).success(function(data, status, headers, config) {
                            $scope.items = $scope.items.concat(data.data);
                        });
                    };
            $scope.init();
 
        });
 
    </script>
@endsection