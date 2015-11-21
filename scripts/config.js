module.exports = function() {
    var configs = {};
    configs.solr = {
        host: 'import.local',
        port: '8983',
        path: '/solr/jobsearch'
    };

    return configs;
};