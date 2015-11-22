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
	'62'	: 'positive',
	'63'	: 'teamwork',
	'64'	: 'open',
	'65'	: 'confidence',
	'66'	: 'sincere',
	'77' 	: 'optimism',
	'78'	: 'active',
	'79'	: 'confidence',
	'80'	: 'communication',
	'81'	: 'funny'
};

app.get('/stream', function(req, res) {
	var identity 	= req.param('identity');
	var limit 		= req.param('limit', 5);
	var offset 		= req.param('limit', 0);
	if( !identity )
	{
		res.status(400).json({
			'code'		: 400,
			'message'	: 'Invalid param identity'
		});
		return;
	}
	var query = client.createQuery()
		.q('characteristics:[* TO *] OR skills:[* TO *]')
		.rows(limit)
		.start(offset)
		.sort({
			'created_at' : 'DESC'
		})
		.matchFilter('identity', identity);

	client.search(query, function(solrErr, solrRes){
		if( solrErr )
		{
			res.status(500).json({
				'code'		: 500,
				'message'	: solrErr.message
			});
			return;
		}
		var characteristics = null;
		var docs 	= solrRes.response.docs;
		var doc 	= null;
		for(var i = 0; i < docs.length; i++)
		{
			doc					= docs[i];
			doc.avatar 			= '//graph.facebook.com/'+doc.identity+'/picture?height=150&amp;width=150';
			characteristics 	= {};
			if( (doc.characteristics instanceof Array) && doc.characteristics.length )
			{
				for(var j = 0; j < doc.characteristics.length; j++)
				{
					if( CHARACTERISTICS[doc.characteristics[j]] ) {
						characteristics[doc.characteristics[j]] = CHARACTERISTICS[doc.characteristics[j]];
					}
				}
			}
			doc.characteristics = characteristics;
		}
		res.json(docs);
	});
});


var server 	= app.listen(3000, function () {
	var host 	= server.address().address;
	var port 	= server.address().port;
  	console.log('Example app listening at http://%s:%s', host, port);
});