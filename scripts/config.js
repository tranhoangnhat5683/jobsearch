module.exports = function() {
    var config = {};
    config.solr = {
        host: 'import.local',
        port: '8983',
        path: '/solr/jobsearch'
    };

    config.neo4j = 'http://neo4j:CFF!123@456PTNC@neo4j.cff:7474';
    return config;
};