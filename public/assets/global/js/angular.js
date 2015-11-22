var jobSearchApp = angular.module('jobSearchApp', ['angular-loading-bar'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

jobSearchApp.controller('homeController', function($scope, $http) {
    $scope.items = [];
    $scope.lastpage = 0;

    $scope.init = function() {
        $scope.lastpage = 1;
        $http({
            url: '/api/user/search',
            method: "GET",
            params: {limit: 4, offset: 0}
        }).success(function(data, status, headers, config) {
            $scope.items = data;
        });
    };
    $scope.loadMore = function() {
        $scope.lastpage += 1;
        $http({
            url: '/api/user/search',
            method: "GET",
            params: {limit: 4, offset: $scope.lastpage * 4}
        }).success(function(data, status, headers, config) {
            Array.prototype.push.apply($scope.items, data);
            console.log($scope.items);
        });
    };
    $scope.getSkills = function(user) {
        var text = [];
        for (var i = 0; i < user.skills.length; i++)
        {
            text.push(user.skills[i].name);
        }
        return text.join(', ');
    };
    $scope.getCharacters = function(user) {
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