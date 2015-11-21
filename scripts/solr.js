module.exports = function() {
    var config = require('./config');
    var solr = require('solr-client');

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

    return Model;
};
