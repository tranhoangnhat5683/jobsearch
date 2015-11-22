var jobSearchApp = angular.module('jobSearchApp', ['angular-loading-bar'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

jobSearchApp.controller('homeController', function($scope, $http) {
    var limit = 4;
    this.searchFlag = false;
    $scope.profiles = [];
    $scope.searchParam = {
        character: '',
        skill: '',
        location: '',
        offset: 0
    };

    $scope.loadMore = function() {
        if (!this.searchFlag)
        {
            return;
        }

        $http({
            url: '/api/user/search',
            method: "GET",
            params: {
                character: $scope.searchParam.character,
                skill: $scope.searchParam.skill,
                location: $scope.searchParam.location,
                limit: limit,
                offset: $scope.searchParam.nextpage * limit
            }
        }).success(function(data, status, headers, config) {
            Array.prototype.push.apply($scope.profiles, data);
        });
        $scope.searchParam.nextpage += 1;
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

    $scope.search = function() {
        this.searchFlag = true;
        $scope.profiles = [];
        $scope.searchParam = {
            character: $("#input-character").val(),
            skill: $("#input-skill").val(),
            location: $("#input-location").val(),
            nextpage: 0
        };
        $scope.loadMore();
        $('html, body').animate({scrollTop: '+=550px'}, 800);
    };
});