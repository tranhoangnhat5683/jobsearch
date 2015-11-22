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

    $scope.loadMore = function(callback) {
        if (!this.searchFlag)
        {
            return;
        }

        $http({
            url: '/api/user/search',
            method: "GET",
            params: {
                'character[]': $scope.searchParam.character,
                'skill[]': $scope.searchParam.skill,
                'location[]': $scope.searchParam.location,
                limit: limit,
                offset: $scope.searchParam.nextpage * limit
            }
        }).success(function(data, status, headers, config) {
            Array.prototype.push.apply($scope.profiles, data);
            if (callback instanceof Function)
            {
                callback();
            }
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
        var mapper = {};
        var order = JSON.parse(JSON.stringify($scope.searchParam.character));
        var character = null;
        for (var i = 0; i < user.characters.length; i++)
        {
            character = user.characters[i];
            if (!character.current)
            {
                continue;
            }
            mapper[character.id] = character;
            if (order.indexOf(character.id + '') < 0)
            {
                order.push(character.id + '');
            }
        }

        var characters = [];
        for (var i = 0; i < order.length; i++)
        {
            characters.push(mapper[order[i]]);
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
        $scope.loadMore(function() {
            $('.job-conntent').css("padding-bottom", "50px");
            $('html, body').animate({scrollTop: '+=550px'}, 800);
        });
    };
});