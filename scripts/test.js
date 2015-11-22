var solr 	= require('solr-client');
var qs 		= require('querystring');

client 	= solr.createClient({
	host : 'solr.cff',
	port : '8983',
	path : '/solr/jobsearch',
});
//http://www.facebook.com/
var query = client.createQuery();
	query
	//.q('"yêu đời" "lạc quan" "vui" "duoc ngay" "dao nay thich" "chia se"')
	.q('*:*')
	.matchFilter('id', '(10203757816625614)')
	.fl('id')
	.rows(1000)
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
			'id' 				: doc.id
			,'characteristics'	: {
				//add : [64]
				remove: [81]
			}
			/*,'skills'	: {
				remove : [0]
			}*/
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
