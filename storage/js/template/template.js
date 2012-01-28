/**
 * class for creating templates
 */
function template(_selector, _template)
{
	/*
	 * template
	 */
	var template = _template ? _template : '';
	
	/*
	 * JQuery selector which sets box fro template
	 */
	var selector = _selector;
	
	/*
	 * Object with variables fro template
	 */
	var view = new Object();
	
	/*
	 * Link to current template object
	 */
	var self = this;
	
	/*
	 * Function which is called before rendering
	 */
	var preRender = function(){};
	
	/*
	 * Function which is called after rendering
	 */
	var afterRender = function(){};
	
	/*
	 * Array with events for template
	 */
	var events = new Array();
	
	/*
	 * Type of inserting template
	 */
	var typeInsert = 'replace'; //replace, add, replaceContainer
	
	/*
	 * JQuery object of current template
	 */
	var obj = null;
	
	/**
	 * method sets variable for template
	 */
	this.set = function(name, value){
		view[name]=value;
	};
	
	/**
	 * method unsets variable for template or all variables
	 */
	this.unset = function(name){
		if(name)
		{
			delete view[name];
		}
		else
		{
			view = new Object();
		}
	};
	
	/**
	 * method gets variable for template
	 */
	this.get = function(name){
		return view[name] ? view[name] : '';
	};
	
	/**
	 * method renders template and put it into setted box and return template as JQuery object
	 */
	this.render = function(){
		preRender();
		
		var html = '';
		var loc1 = 0;
		var loc2 = 0;
		var loc3 = 0;
		//there are sub templates which will be insertend into template
		var subTemplates = new Object(); 
		
		//set variables
		while((loc2=template.indexOf('%%', loc1))!=-1)
		{
			html += template.substring(loc1, loc2);
			loc1=loc2=loc2+2;
			if((loc3=template.indexOf('%%', loc2))!=-1)
			{
				var variable = template.substring(loc2, loc3);
				if(variable.indexOf('template:')===0)
				{
					variable = variable.substring(9);
					eval('subTemplates["subTemplate'+loc2+'"] = '+variable+'.render();');
					html += '<div id="subTemplate'+loc2+'"></div>';
				}
				else
				{
					html += self.get(variable);
				}
				loc1=loc3+2;
			}
		}
		html += template.substring(loc1);

		resObj = $(html);
		
		//insert sub templates
		for(var k in subTemplates)
		{
			var v = subTemplates[k];
			$('#'+k, resObj).after(v).remove();
		}
		
		//init events
		for(var k in events)
		{
			var event = events[k];
			$(event.selector, resObj).bind(event.event, event.func);
		}

		//insert template
		if(self.typeInsert() == 'replace')
		{
			$(selector).empty().append(resObj);
		}
		else if(self.typeInsert() == 'add')
		{
			$(selector).append(resObj);
		}
		else if(self.typeInsert() == 'replaceContainer')
		{
			if(obj)
			{
				obj.after(resObj).remove();
			}
		}
		
		obj = resObj;
		
		afterRender();
		
		return obj;
	};
	
	/**
	 * Method sets events for elements from template
	 */
	this.event = function(selector, eventName, func){
		var event = new Object();
		event.selector = selector;
		event.event = eventName;
		event.func = func;
		events.push(event);
	};
	
	/**
	 * method which is called before rendering templatre
	 */
	this.preRender = function(func){
		preRender = func;
	};
	
	/**
	 * method which is called after rendering templatre
	 */
	this.afterRender = function(func){
		afterRender = func;
	};
	
	/**
	 * Method returns JQuuery object which contains current template 
	 * @returns
	 */
	this.template = function()
	{
		return obj;
	}
	
	/**
	 * Method sets template
	 */
	this.setTemplate = function(_template)
	{
		template = _template;
	}
	
	/**
	 * Method sets and return typeInsert
	 */
	this.typeInsert = function(_typeInsert)
	{
		if($.inArray(_typeInsert, ['replace', 'add', 'replaceContainer'])!=-1)
		{
			typeInsert = _typeInsert;
		}
		
		return typeInsert;
	}
		
}