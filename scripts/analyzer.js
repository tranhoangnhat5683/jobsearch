var async = require('async');
var keywords = require('./keywords');
var Solr = require('./solr');
var Neo4j = require('./neo4j');

var Script = function() {
    this.solr = new Solr();
    this.neo4j = new Neo4j();
};

Script.prototype.start = function() {
    this.neo4j.getUsers(this.onGetUsers.bind(this));
};

Script.prototype.onGetUsers = function(err, users) {
    if (err)
    {
        console.log('onGetUsers | err', err);
        return;
    }

    var flows = [];
    for (var i = 0; i < users.length; i++)
    {
        users[i].score = {};
        for (var keywordId in keywords)
        {
            flows.push(this.countMention.bind(this, users[i], keywordId));
        }
    }

    async.parallel(flows, this.onCountMentions.bind(this, users));
};

Script.prototype.countMention = function(user, keywordId, callback)
{
    this.solr.countKeyMentionOfUser(
            user.identity,
            keywords[keywordId],
            this.onCountMention.bind(this, user, keywordId, callback)
            );
};

Script.prototype.onCountMention = function(user, keywordId, callback, err, res)
{
    if (err)
    {
        callback(err);
        return;
    }

    user.score[keywordId] = (res && res.response && res.response.numFound) || 0;
    callback();
};

Script.prototype.onCountMentions = function(users, err, res)
{
    if (err)
    {
        console.log('onCountMentions | err:', err);
        return;
    }

    this.neo4j.updateUsersScore(users, keywords, this.onUpdateUsersScore.bind(this));
};

Script.prototype.onUpdateUsersScore = function(err, res)
{
    if (err)
    {
        console.log('users | err:', err);
        return;
    }

    console.log(res);
};

var script = new Script();
script.start();