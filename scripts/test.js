var solr 	= require('solr-client');
var qs 		= require('querystring');

client 	= solr.createClient({
	host : 'solr.cff',
	port : '8983',
	path : '/solr/jobsearch',
});

var query = client.createQuery();
	query.q('*:*')
	.matchFilter('id', '470356029755907')
	.sort({
		'id' : 'ASC'
	})
	.set(qs.stringify({
		'cursorMark'	: '*'
	}));

client.search(query, function(err, res){
	if( err )
	{
		console.log('Search error | error: ', err);
		process.exit();
		return;
	}
	var docs 	= res.response.docs;
	if( !docs.length )
	{
		console.log('Khong co doc.');
		process.exit();
		return;	
	}
	var doc 	= null;
	var upDocs 	= [];
	for(var i = 0; i < docs.length; i++)
	{
		doc 	= docs[i];
		upDocs.push({
			'id' 				: doc.id,
			'characteristics'	: {
				set : [79]
			}
		})
	}
	client.update(upDocs, function(upErr, upRes){
		if( upErr )
		{
			console.log('Search error | error: ', err);
			process.exit();
			return;
		}
		console.log('Update ok:', upRes);
	})
})
