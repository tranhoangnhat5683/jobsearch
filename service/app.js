var express = require('express');
var app 	= express();
var solr 	= require('solr-client');
var qs 		= require('querystring');
var cors 	= require('cors');

app.use(cors());

var client 	= solr.createClient({
	host : 'solr.cff',
	port : '8983',
	path : '/solr/jobsearch',
});

var CHARACTERISTICS =  {
	'77' 	: 'optimism',
	'78'	: 'active',
	'79'	: 'confidence',
	'80'	: 'communication',
	'81'	: 'funny'
};

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
		var docs 	= solrRes.response.docs;
		var doc 	= null;
		for(var i = 0; i < docs.length; i++)
		{
			doc		= docs[i];
			doc.avatar = '//graph.facebook.com/'+doc.identity+'/picture?height=150&amp;width=150';
		}
		res.json(docs);
	});
});


var server 	= app.listen(3000, function () {
	var host 	= server.address().address;
	var port 	= server.address().port;
  	console.log('Example app listening at http://%s:%s', host, port);
});