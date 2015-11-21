module.exports = function() {
    var config = require('./config');
    var Neo4j = require('node-neo4j');

    var Model = function() {
        this.client = null;
    };

    Model.prototype.getClient = function()
    {
        if (!this.client)
        {
            this.client = new Neo4j(config.neo4j);
        }

        return this.client;
    };

    Model.prototype.getUsers = function(callback)
    {
        this.getClient().cypherQuery("MATCH (user:User) RETURN user", function(err, result) {
            if (err)
            {
                callback(err);
                return;
            };

            callback(null, result.data);
        });
    };

    Model.prototype.updateUsersScore = function(users, characters, callback)
    {
        var characterWhere = [];
        var characterSearch = [];
        for (var characterId in characters)
        {
            characterSearch.push('(character_' + characterId + ':Character)');
            characterWhere.push('ID(character_' + characterId + ')=' + characterId);
        }

        var user = null;
        var userId = 0;
        var merges = [];
        var userWhere = [];
        var usersSearch = [];
        for (var i = 0; i < users.length; i++)
        {
            user = users[i];
            userId = user._id;
            usersSearch.push('(user_' + userId + ':User)');
            userWhere.push('ID(user_' + userId + ')=' + userId);
            for (var characterId in user.score)
            {
                merges.push('MERGE (user_' + userId + ')-[:Has{score:' + user.score[characterId] + '}]->(character_' + characterId + ')');
            }
        }
        console.log([
                'MATCH ' + usersSearch.join(','),
                ',' + characterSearch.join(','),
                'WHERE ' + userWhere.join(' AND '),
                'AND ' + characterWhere.join(' AND '),
                merges.join(' ')].join(' '));
//        this.getClient().cypherQuery([
//                'MATCH ' + usersSearch.join(','),
//                ' WHERE ' + userWhere.join(' AND '),
//                ' AND ' + characterWhere.join(' AND '),
//                merges.join(' ')].join(' '), function(err, result) {
//            if (err)
//            {
//                callback(err);
//                return;
//            };
//
//            callback(null, result.data);
//        });
    };

    return Model;
}();
