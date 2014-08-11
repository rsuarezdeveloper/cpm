Ext.Loader.setConfig({
    enabled: true
});
Ext.Loader.setPath('Ext.ux', '/bundles/uigengenerator/extjs/ux');

Ext.require([
    'Ext.ux.CheckColumn'
]);

Ext.override(Ext.LoadMask, {
	onHide: function(){
		this.callParent();
	}
});

function CargoGrid(target_el_id){

	function create(){

		Ext.Ajax.request({
			method		: 	'GET',
			url			: 	'/cargo/create',
			params		: 	store.proxy.extraParams,
			success		: 	function(response){
								store.load();
							}									    
		});   
	}
	
	function update(){
	
		var records = store.getUpdatedRecords();
		var da = [];
		for(var i = 0; i < records.length; i++) {
			var record = records[i];
			var jsonData = Ext.encode(records[i].data);
			
			da.push(jsonData);
		}
		var data = '[' + da.join(',') + ']';
		
		Ext.Ajax.request({
			method		:	'post',
			url			: 	'/cargo/update',
			params		: 	{
								data: data
							}, 
			success		: 	function(response){
								var result=eval(response.responseText);
								switch(result){
								case 1:
									
									store.load({});
									break;
								}
							}									    
		});   
	}
	
	var delete_entity_id = 0;
	function confirmDeletion(id){

		Ext.Msg.confirm('delete?','Do you really want to delete this item',function(btn){
		
			if(btn == 'yes'){
				
				destroy(id);
			}
		});
	}
	
	function destroy(id){

		Ext.Ajax.request({
			url			: 	'/cargo/'+id+'/destroy',
			success		: 	function(response){
								store.load();
							}									    
		});   
	}




    // create the Data Store
    var store = new Ext.data.Store({
        proxy	:	new Ext.data.HttpProxy({
						url: '/cargo/read',	
					reader: {
				                root: 'items',
				                totalProperty: 'count'
				            },
					getFilterValues:function(){
						return { 												 };
					},
					extraParams:{ 										 }
					}),
		autoLoad:	true,
		fields	: 	[
						{
							name: 'id',
							type: 'integer'
													},
						{
							name: 'descripcion',
							type: 'string'
													},
			        ]
    });

	var gridMenu = Ext.create('Ext.menu.Menu', {    
	    items: [{
				text		:	"delete entry",
				icon		:	"/bundles/uigengenerator/images/delete.png",
				handler	: 	function(){
								confirmDeletion(delete_entity_id);
								delete_entity_id = 0;
							}
							}]
	  });	
	
	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
	        clicksToEdit: 1
	    });
    var grid = new Ext.grid.Panel({
        store: store,
        plugins: [cellEditing],
		listeners: {
		      beforeitemcontextmenu: function(view, record, item, index, e)
		      {
		        e.stopEvent();
				delete_entity_id = record.data.id;
				
		        gridMenu.showAt(e.getXY());
		      }
		    },
        columns: [
			{
	            header: 'descripcion',
	            dataIndex: 'descripcion',
	            editor: {
					xtype : 'textfield'
	            		}

			},

		],
        renderTo: target_el_id,
        width: '100%',
        height: 500,
        title: 'Cargo',
        tbar: [
				{
	           	 	text	:  'update',
		            handler : 	update,
					icon	:	"/bundles/uigengenerator/images/save.gif"
				},{
	           	 	text	: 	'create',
		            handler : 	create,
					icon	:	"/bundles/uigengenerator/images/add.png"
				},	{
			           	 	text	: 	'window',
				            handler : 	function(){
											var win = Ext.widget('window', {
											                width: 400,
											                height: 400,
											                minHeight: 400,
											                layout: 'fit',
											                resizable: true,
											                modal: true,
											                items: new Ext.custom.CargoForm()
											            });
											win.show();
										},
							icon	:	"/bundles/uigengenerator/images/add.png"
						}											],
		bbar: Ext.create('Ext.PagingToolbar', {
		            store: store,
		            displayInfo: true,
		            displayMsg: 'Displaying items {0} - {1} of {2}',
		            emptyMsg: "No items to display"
		        })    });}


Ext.define('Ext.custom.CargoCustomComboBox',{
	extend:'Ext.form.field.ComboBox',
	alias:'widget.CargoCustomComboBox',
	constructor:function(cnfg){
	    this.callParent(arguments);
	    this.initConfig(cnfg);
	
		var comboStore = this.store;
		Ext.util.Format.CargoIdRenderer = function(v)
		{
			var idx = comboStore.findExact('id',v);
			var rec = comboStore.getAt(idx);
			if(rec && v != '')return rec.get('name');
			return '';
		};
	},

		typeAhead			:	false,
		lazyRender			:	true,
		store				:	new Ext.data.Store({
								    proxy		:	new Ext.data.HttpProxy({
										url: '/Cargo/listCargo_idcombo',
									}),
								    fields		: [ 
													{
													   	name	: 	'id', 
													   	type	: 	'integer'
												   	},{
													   	name	: 	'name', 
													   	type	: 	'string'
												   	}
											      ]

								}),
		displayField		:	'name',
		valueField			:	'id',
		mode				:	'local',
		triggerAction		:	'all',
		editable			: 	false,
		width				:	80
});Ext.define('Ext.custom.CargoForm',{
	extend:'Ext.form.Panel',
	constructor:function(cnfg){
		
	    this.callParent(arguments);
	    this.initConfig(cnfg);
		this.form.url = '/cargo/create';
	},
	bodyPadding: 5,
    fieldDefaults: {
        labelAlign: 'left',
        labelWidth: 90,
        anchor: '100%'
    },
	url: '/cargo/create',
	items:[
		
					{
				xtype 			: 	'textfield',
				fieldLabel		:	'descripcion',
				name				:	'descripcion'
           	},

				],

      buttons: [{
          text: 'Cancel',
          handler: function() {
              console.log(this.up('form').getForm().getValues());
          }
      }, {
          text: 'Send',
          handler: function() {
              if (this.up('form').getForm().isValid()) {
				this.up('form').getForm().submit({params:{form:Ext.encode(this.up('form').getForm().getValues())}});
                  this.up('window').hide();
              }
          }
      }]
});