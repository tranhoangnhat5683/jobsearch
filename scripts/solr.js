module.exports = function() {
    var config = require('./config');
    var solr = require('solr-client');
    var qs = require('querystring');

    var Model = function() {
        this.client = null;
    };

    Model.prototype.getClient = function()
    {
        if (!this.client)
        {
            this.client = solr.createClient(config.solr);
        }

        return this.client;
    };

    Model.prototype.countKeyMentionOfUser = function(identity, keywords, options, callback)
    {
        if (options instanceof Function)
        {
            callback = options;
            options = {};
        }

        var shards = options.shards || config.shards;
        var query = this.getClient().createQuery();
        query.q('"' + keywords.join('" "') + '"')
                .matchFilter('identity', identity)
                .set(qs.stringify({
                    'shards': shards.join(',')
                }))
                .rows(0);

        this.getClient().search(query, callback);
    };

    return Model;
}();
