var solr = require('solr-client');

var Script = function()
{
	this.client 		= solr.createClient({
		host		: '74.50.117.80',
		port		: '8983',
		path		: '/solr/jobsearch',
	});
	//this.client.autoCommit = true;

	this.arrDocs 	 	= [];




	this.loadDataReq 	= 0;
	this.loadDataRes 	= 0;
	this.loadDataErr 	= 0;

	this.importDataReq	= 0;
	this.importDataRes	= 0;
	this.importDataErr	= 0;

	this.showInfo();
};

Script.prototype.showInfo = function()
{
	console.log('---------------------------------------');
	console.log('[Solr] Load req/res/err                :',[
		this.loadDataReq,
		this.loadDataRes,
		this.loadDataErr
	]);
	console.log('[Solr] Import req/res/err              :',[
		this.importDataReq,
		this.importDataRes,
		this.importDataErr
	]);
	setTimeout(this.showInfo.bind(this), 3000);
};

Script.prototype.start = function()
{
	this.initTestData();
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

	setTimeout(this.loadData.bind(this), 1000);
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
	this.client.add(docs, this.onImportData.bind(this));

	setTimeout(this.importData.bind(this), 1000);
};

Script.prototype.onImportData = function(solrErr, solrRes)
{
	this.importDataRes++;
	if( solrErr )
	{
		this.importDataErr++;
		console.log('onImportData | error: ', solrErr);
		return;
	}
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
	}];
};


var script = new Script();
script.start();

