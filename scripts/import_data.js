var solr = require('solr-client');

var Script = function()
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

	this.cursorMark		= 0;
	this.shards			= [100];
	this.keywords		= "python";
	this.arrDocs 	 	= [];




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
		.set(qs.querystring({
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
		console.log('onLoadData | Khong con du lieu nua!');
		return;
	}
	this.loadDataRecv += docs.length;
	var doc	  = null;
	for(var i = 0, n = docs.length; i < n; i++)
	{
		doc = docs[i];
		if( !doc.seach_text ){
			doc.seach_text = [];
		}
		this.arrDocs.push({
			"id"				: doc.id_social,
			"identity"			: doc.identity,
			"id_source"			: doc.id_source,
			"message"			: doc.seach_text[0] || '',
			"description"		: doc.seach_text[1] || '',
			"attachment"		: doc.attachment,
			"created_at"		: doc.crated_date,
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
			"type"				: null
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
		setTimeout(this.importData.bind(this), 1000);
		return false;
	}
	var docs = this.arrDocs.splice(0, 100);

	this.importDataReq++;
	this.client.add(docs, this.onImportData.bind(this, docs));

	setTimeout(this.importData.bind(this), 1000);
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


var script = new Script();
script.start();

