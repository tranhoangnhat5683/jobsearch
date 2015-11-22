var solr 	= require('solr-client');
var qs 		= require('querystring');

var Script = function(argv)
{
	this.client 	= solr.createClient({
		host : 'solr.cff',
		port : '8983',
		path : '/solr/jobsearch',
	});
	//this.client.autoCommit = true;
	
	//
	this.clientData = solr.createClient({
		host : 'import.local',
		port : '8080',
		path : '/solr/documents',
	});

	this.cursorMark		= '*';
	this.shards			= !argv.shards?[100]:[argv.shards];
	this.keywords		= argv.keywords || "python";
	this.arrDocs 	 	= [];

	if( !this.keywords )
	{
		throw new Error('Keyword khong ton tai');
	}



	this.loadDataReq 	= 0;
	this.loadDataRes 	= 0;
	this.loadDataErr 	= 0;
	this.loadDataRecv	= 0;

	this.importDataReq	= 0;
	this.importDataRes	= 0;
	this.importDataErr	= 0;
	this.importDataRecv	= 0;

	this.showInfo();
};

Script.prototype.showInfo = function()
{
	console.log('---------------------------------------');
	console.log('[Buffer] shard/keywords/cursorMark     :',[
		this.shards.join(','),
		this.keywords,
		this.cursorMark
	]);
	console.log('[Solr] Load req/res/err/recv           :',[
		this.loadDataReq,
		this.loadDataRes,
		this.loadDataErr,
		this.loadDataRecv
	]);
	console.log('[Solr] Import req/res/err/recv         :',[
		this.importDataReq,
		this.importDataRes,
		this.importDataErr,
		this.importDataRecv,
	]);
	setTimeout(this.showInfo.bind(this), 3000);
};

Script.prototype.start = function()
{
	this.startAt = new Date();
	//this.initTestData();
	this.loadData();
	this.importData();
};

Script.prototype.canLoadData = function()
{
	if( this.loadDataReq > this.loadDataRes )
	{
		return false;
	}
	if( this.loadDataStop )
	{
		console.log('onLoadData | Khong con du lieu nua!');
		return false;
	}
	return true;
};

Script.prototype.loadData = function()
{
	if( !this.canLoadData() )
	{
		setTimeout(this.loadData.bind(this), 1000);
		return;
	}

	var query = this.clientData.createQuery();
		query.q(this.keywords)
		.sort({
			'id' : 'ASC'
		})
		.set(qs.stringify({
			'shards' 		: this.shards.join(','),
			'cursorMark'	: this.cursorMark
		}));

	this.loadDataReq++;
	this.clientData.search(query, this.onLoadData.bind(this));
	setTimeout(this.loadData.bind(this), 1000);
};

Script.prototype.onLoadData = function(solrErr, solrRes)
{
	this.loadDataRes++;
	if( solrErr ) {
		this.loadDataErr++;
		console.log('onLoadData | err: ', solrErr);
		return;
	};
	var docs 		= solrRes.response.docs;
	this.cursorMark = solrRes.nextCursorMark;
	if ( !(docs instanceof Array) || !docs.length )
	{
		this.loadDataStop = true;
		console.log('onLoadData | Khong con du lieu nua!');
		return;
	}
	this.loadDataRecv += docs.length;
	var doc	  		= null;
	var id_social 	= null;
	var id_parent 	= null;
	var id_parent 	= null;
	var attachment	= null;
	for(var i = 0, n = docs.length; i < n; i++)
	{
		doc = docs[i];
		if( !doc.search_text ){
			doc.search_text = [];
		}
		if( [1, 2, 6, 12].indexOf(doc.id_table) === -1 ) {
			continue;
		}
		if( !doc.identity || !doc.id_source  ){
			continue;
		}
		id_social 	= doc.id_social;
		if( id_social.search('_') !== -1 ) {
			id_social = id_social.split('_')[1];
		}
		id_parent	= null;
		if( doc.id_table === 2 || doc.id_table === 12 ){
			try {
				attachment 	= JSON.parse(doc.attachment);
				id_parent	= attachment.parent_info.id;
				if( id_parent && (id_parent.search('_') !== -1) ){
					id_parent = id_parent.split('_')[1];
				}
			} catch ( e ) {
				console.log('Can not get id_parent | error: ', e);
			}
		}
		this.arrDocs.push({
			"id"				: id_social,
			"id_parent"			: id_parent,
			"identity"			: doc.identity,
			"id_source"			: doc.id_source,
			"message"			: doc.search_text[0] || '',
			"description"		: doc.search_text[1] || '',
			"attachment"		: doc.attachment,
			"created_at"		: doc.created_date,
			"updated_at"		: new Date().toISOString(),
			"skills"			: [],
			"characteristics"	: [],
			"location"			: "",
			"id_location"		: 1,
			"likes"				: doc.likes || 0,
			"comments"			: doc.comments || 0,
			"shares"			: doc.shares || 0,
			"with_identity"		: null,
			"with_name"			: null,
			"type"				: null,
			"_version_"			: -1
		});
	}
};

Script.prototype.canImportData = function()
{
	if( this.importDataReq > this.importDataRes )
	{
		return false;
	}
	if( !this.arrDocs.length )
	{
		return false;
	}
	return true;
};

Script.prototype.importData = function()
{
	if( !this.canImportData() )
	{
		setTimeout(this.importData.bind(this), 100);
		return false;
	}
	var docs = this.arrDocs.splice(0, 1);

	this.importDataReq++;
	this.client.add(docs, this.onImportData.bind(this, docs));

	setTimeout(this.importData.bind(this), 100);
};

Script.prototype.onImportData = function(docs, solrErr, solrRes)
{
	this.importDataRes++;
	if( solrErr )
	{
		this.importDataErr++;
		console.log('onImportData | error: ', solrErr);
		return;
	}
	this.importDataRecv += docs.length;
};

Script.prototype.initTestData = function()
{
	this.arrDocs 	 	= [{
	   "id": "fb$1234",
	   "identity": "123",
	   "id_source": "123",
	   "message": "test message",
	   "description": "test description",
	   "attachment": "{}",
	   "created_at": new Date().toISOString(),
	   "updated_at": new Date().toISOString(),
	   "skills": [1, 2, 3],
	   "characteristics": [1, 2, 3],
	   "location": "Ho Chi Minh",
	   "id_location": 1,
	   "likes": 1,
	   "comments": 1,
	   "shares": 1,
	   "with_identity": null,
	   "with_name": null,
	   "type": null
	},{
	   "id": "fb$1235",
	   "identity": "123",
	   "id_source": "123",
	   "message": "test message",
	   "description": "test description",
	   "attachment": "{}",
	   "created_at": new Date().toISOString(),
	   "updated_at": new Date().toISOString(),
	   "skills": [1, 2, 3],
	   "characteristics": [1, 2, 3],
	   "location": "Ho Chi Minh",
	   "id_location": 1,
	   "likes": 1,
	   "comments": 1,
	   "shares": 1,
	   "with_identity": null,
	   "with_name": null,
	   "type": null
	},{
	   "id": "fb$1236",
	   "identity": "123",
	   "id_source": "123",
	   "message": "test message",
	   "description": "test description",
	   "attachment": "{}",
	   "created_at": new Date().toISOString(),
	   "updated_at": new Date().toISOString(),
	   "skills": [1, 2, 3],
	   "characteristics": [1, 2, 3],
	   "location": "Ho Chi Minh",
	   "id_location": 1,
	   "likes": 1,
	   "comments": 1,
	   "shares": 1,
	   "with_identity": null,
	   "with_name": null,
	   "type": null
	}];
};

var argv        = require('optimist')        
    .alias('k', 'keywords')
    .alias('s', 'shards')
    .argv;

var script = new Script(argv);
script.start();

