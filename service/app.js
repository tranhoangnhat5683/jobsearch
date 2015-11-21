var express = require('express');
var app 	= express();
var solr 	= require('solr-client');
var qs 		= require('querystring');


var client 	= solr.createClient({
	host : 'solr.cff',
	port : '8983',
	path : '/solr/jobsearch',
});

app.get('/stream', function(req, res) {
	var identity = req.param('identity');
	if( !identity )
	{
		res.status(400).json({
			'code'		: 400,
			'message'	: 'Invalid param identity'
		});
		return;
	}
	var query = client.createQuery()
		.q('*:*')
		.matchFilter('identity', identity);
	client.search(query, function(solrErr, solrRes){
		if( solrErr )
		{
			res.status(400).json({
				'code'		: 400,
				'message'	: 'Invalid param identity'
			});
			return;
		}
		var docs = solrRes.response.docs;
		res.json(docs);
	});
});


var server 	= app.listen(3000, function () {
	var host 	= server.address().address;
	var port 	= server.address().port;
  	console.log('Example app listening at http://%s:%s', host, port);
});