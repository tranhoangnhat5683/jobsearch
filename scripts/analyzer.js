var keywords = require('./keywords');
var Solr = require('./solr');

var Script = function() {
    this.solr = new Solr();
};

Script.prototype.start = function() {
    
};

var script = new Script();
script.start();