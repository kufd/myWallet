var formAddSpending = new template('body');
formAddSpending.typeInsert('add');

/**
 * Method removes form
 */
formAddSpending.hide = function()
{
	$('div.formAddSpending').remove();
}


/**
 * Method add spending
 * If error happened returns false and true otherwise
 */
formAddSpending.save = function()
{
	var params = new Object();
	params['amount'] = $('input[name=amount]', formAddSpending.template()).val();
	params['date'] = $('input[name=date]', formAddSpending.template()).val();
	params['spendingNameId'] = $('select[name=spendingName]', formAddSpending.template()).val();
	params['spendingName'] = params['spendingNameId'] ? $('select[name=spendingName] option:selected', formAddSpending.template()).text() : $('input[name=spendingName]', formAddSpending.template()).val();
	params['spendingId'] = $('input[name=spendingId]', formAddSpending.template()).val();

	var result = true;
	
	$.ajax(
		{
			url: "addSpending",
			type: "POST",
			data: {params: params},
			async: false,
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					formAddSpending.hide();
					wallet.render();
				}
				else
				{
					result = false;
				}
			}
		}
	);
	
	return result;
}

/**
 * Method creates select with spending names
 */
formAddSpending.showSpendingNameField = function(type)
{
	var html = '';
	var spendingName = formAddSpending.get('spendingName');
	
	if(type=='text' || !db.topSpendingNames() || spendingName && !db.inTopSpendingNames(spendingName))
	{
		html = '<input type="text" name="spendingName" value="'+spendingName+'" />';
	}
	else
	{
		var topSpendingNames = db.topSpendingNames();
		html += '<select name="spendingName">';
		for(var k in topSpendingNames)
		{
			var v = topSpendingNames[k];
			html += '<option value="'+v['id']+'" '+(spendingName && v['name']==spendingName ? 'selected="selected"' : '')+'>'+v['name']+'</option>';
		}
		html += 	'<option value="0">інша витрата</option>';
		html += '</select>';
	}
	
	var obj = $(html);
	if(type=='text' || !db.topSpendingNames())
	{
		obj.autocomplete({
		    source: 'spendingNamesAutocomplete'
		});
	}
	else
	{
		obj.bind('change', function(){ $(this).val()==0 &&  formAddSpending.showSpendingNameField('text'); });
	}
	
	
	$("*[name=spendingName]", formAddSpending.template()).after(obj).remove();
	//$("*[name=spendingName]", formAddSpending.template()).focus();
}

formAddSpending.preRender(function(){
	formAddSpending.hide();
	if(!formAddSpending.get('dateFront'))
	{
		formAddSpending.set('dateFront', $.datepicker.formatDate('d MM yy', new Date()));
		formAddSpending.set('date', $.datepicker.formatDate('yy-mm-dd', new Date()));
	}
});

formAddSpending.afterRender(function(){
	formAddSpending.showSpendingNameField();

	$("input[name=dateFront]", formAddSpending.template()).datepicker({
		dateFormat:'d MM yy',
		altField: 'input[name=date]',
		altFormat: 'yy-mm-dd'
	});
	
	$(formAddSpending.template()).dialog({
		buttons:
			[ 
			 	{
			 		text: "Відмінити",
			 		click: function() { $(this).dialog("close"); }
			 	},
				{
	               	text: "Зберегти",
	               	click: function() { formAddSpending.save() ? $(this).dialog("close") : false; }
				}
			],
		close: function() { formAddSpending.hide(); },
		modal: true,
		width: 320
	});
});



