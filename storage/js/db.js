var db = new Object();

/**
 * Data
 */
db.data = null;

/**
 * Db events
 */
db.events = new Object();
db.events.changeLogged = null; //changing logged

/**
 * Method sets event
 */
db.setEvent = function(event, func)
{
	this.events[event]=func;
}

/**
 * Method unsets event
 */
db.unsetEvent = function(event)
{
	delete this.events[event];
}


/**
 * function load data from server using ajax
 */
db.load = function()
{
	$.ajax(
		{
			url: "export",
			type: "POST",
			data: {},
			success: function(data)
			{
				db.data = data;
			}
		}
	);
}

/**
 * Method returns template by name
 */
db.template = function(name)
{
	return this.data.templates[name];
}

/**
 * Method returns is user logged in or no and allow to set this value
 */
db.logged = function(logged)
{
	if(logged!==undefined)
	{
		//set triger call event
		var callEvent = this.data.logged != logged;
		
		//setting property
		this.data.logged = logged;
		
		//calling event changeLogged
		if(db.events.changeLogged && callEvent)
		{
			db.events.changeLogged();
		}
	}

	return !(!this.data.logged);
}

/**
 * Method returns top spepending names
 */
db.topSpendingNames = function()
{
	return this.data.topSpendingNames && !$.isEmptyObject(this.data.topSpendingNames) ? this.data.topSpendingNames : null;
}

/**
 * Method returns true if there are name of spending in top spepending names
 */
db.inTopSpendingNames = function(name)
{
	for(var k in this.data.topSpendingNames)
	{
		if(this.data.topSpendingNames[k]['name'] == name)
		{
			return true;
		}
	}
	
	return false;
}

/**
 * Method add data to current data
 */
db.merge = function (data)
{
	$.extend(this.data, data);
}

/**
 * Method returns currency for user
 */
db.currency = function()
{
	return 'грн.';
}

/**
 * Method return spending list
 */
db.spendingList = function(params)
{
	$.ajax(
		{
			url: "spendingList",
			type: "POST",
			data: {params: params},
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					db.data.spendingList = data;
				}
			}
		}
	);
	
	return db.data.spendingList;
}

/**
 * Method returns spending by id
 */
db.spending = function(id)
{
	return db.data.spendingList[id+"_"] ? db.data.spendingList[id+"_"] : {};
}


/**
 * Method returns fields for grouping spendings
 */
db.groupBySpendings = function()
{
	return db.data.groupBySpendings;
}
/**
 * Method addes field for grouping spendings
 */
db.addGroupBySpendings = function(field)
{
	db.data.groupBySpendings[field]=field;
}
/**
 * Method removes field for grouping spendings
 */
db.deleteGroupBySpendings = function(field)
{
	delete db.data.groupBySpendings[field];
}

/**
 * Method sets and returns sorting field
 */
db.sortingField = function(field)
{
	field && (db.data.sorting.field = field);
	return db.data.sorting.field;
}

/**
 * Method sets and returns sorting direction
 */
db.sortingDirection = function(direction)
{
	direction && (db.data.sorting.direction = direction);
	return db.data.sorting.direction;
}

/**
 * Method sets sorting of spending list
 */
db.sorting = function(field)
{
	if(field != db.sortingField())
	{
		db.sortingField(field);
		db.sortingDirection('asc');
	}
	else
	{
		db.sortingDirection(db.sortingDirection() == 'asc' ? 'desc' : 'asc');
	}
	
}

/**
 * Method returns profile data
 * 
 * @param name
 * @param value
 */
db.profile = function(name, value)
{
	if(!name)
	{
		return db.data.profile;
	}
	else
	{
		if(value)
		{
			db.data.profile[name] = value;
		}
		return db.data.profile[name];
	}
}

/**
 * Method updates user`s profile
 * Method returns false if error happen or true otherwise
 * 
 * @param data
 * @return bool
 */
db.updateProfile = function(data)
{
	var result = true;
	
	$.ajax({
				url: "saveProfile",
				type: "POST",
				data: {params: data},
				success: function(response)
				{
					if(!core.ajaxErrors(response))
					{
						for(var k in data)
						{
							db.profile(k, data[k]);
						}
					}
					else
					{
						result = false;
					}
				}
	});
	
	return result;
}



