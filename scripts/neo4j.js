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

    return Model;
};
