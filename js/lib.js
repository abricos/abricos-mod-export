/*
@version $Id$
@package Abricos
@copyright Copyright (C) 2008 Abricos All rights reserved.
@license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

var Component = new Brick.Component();
Component.requires = {
	yahoo: ['dom']
};
Component.entryPoint = function(){
	
	var Dom = YAHOO.util.Dom,
		E = YAHOO.util.Event,
		L = YAHOO.lang;
	
	var NS = this.namespace, 
		TMG = this.template,
		API = NS.API;

	var buildTemplate = function(w, templates){
		var TM = TMG.build(templates), T = TM.data, TId = TM.idManager;
		w._TM = TM; w._T = T; w._TId = TId;
	};
	
	var PrintLink = function(config){
		config = L.merge({
			'module': '',
			'page': '',
			'params': []
		}, config || {});
		this.init(config);
	};
	PrintLink.prototype = {
		init: function(config){
			this.config = config;
			buildTemplate(this, 'printlink');
		},
		getHTML: function(){
			var cfg = this.config;
			var link = [];

			return this._TM.replace('printlink', {
				'link': "/export/print/"+cfg.module+"/"+cfg.page+"/"+cfg.params.join("/")+(cfg.params.length > 0 ? "/" : "")
			});
		}
	};
	NS.PrintLink = PrintLink;
	
};