@extends('app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
<div class="container" ng-app="itemApp" ng-controller="itemsController">
    <div class="row">
        <ul>
            <li ng-repeat="item in items"> <% item.id %> | <% item.name %></li>
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

        $scope.init = function() {
            $scope.items = [{id: 123, name: 456}, {id: 234, name: 567}];
        };
        $scope.loadMore = function() {
            $scope.items.push({id: 123, name: 456}, {id: 234, name: 567});
        };

        $scope.init();
    });

</script>
@endsection