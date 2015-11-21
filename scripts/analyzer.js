var keywords = require('./keywords');
var Solr = require('./solr');
var Neo4j = require('./neo4j');

var Script = function() {
    this.solr = new Solr();
    this.neo4j = new Neo4j();
};

Script.prototype.start = function() {
//    this.neo4j
};

var script = new Script();
script.start();