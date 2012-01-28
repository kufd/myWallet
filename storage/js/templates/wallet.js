var wallet = new template('#page');

/**
 * id of spending there is storaged for removing
 */
wallet.deleteSpendingId = null;




/**
 * Method remove spending by id
 */
wallet.deleteSpending = function(id)
{
	$.ajax(
		{
			url: "deleteSpending",
			type: "POST",
			data: {id: id},
			dataType: "json",
			async: false,
			global: true,
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					spendings.render();
				}
			}
		}
	);
}

/**
 * Metdot shows form for editing spending
 */
wallet.showFromEditSpending = function(id)
{
	var spending = db.spending(id);
	
	formAddSpending.set('spendingName', spending['spendingName']['name']);
	formAddSpending.set('amount', spending['amount']);
	formAddSpending.set('dateFront', $.datepicker.formatDate('d MM yy', new Date(spending['date'])));
	formAddSpending.set('date', spending['date']);
	formAddSpending.set('spendingId', spending['id']);
	formAddSpending.render();
}


/**
 * Method returns count of days of current Month
 */
wallet.countDaysOfMont = function()
{
	var date = new Date();
	return new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
}

wallet.afterRender(function(){

	$("div.options input[name=dateStartFront]", wallet.template()).datepicker({
		dateFormat:'d MM yy',
		altField: 'div.options input[name=dateStart]',
		altFormat: 'yy-mm-dd',
		onClose: function(){
			wallet.set('options.dateStart', $(this).next().val());
			spendings.render();
		}
	});
	
	$("div.options input[name=dateEndFront]", wallet.template()).datepicker({
		dateFormat:'d MM yy',
		altField: 'div.options input[name=dateEnd]',
		altFormat: 'yy-mm-dd',
		onClose: function(){
			wallet.set('options.dateEnd', $(this).next().val());
			spendings.render();
		}
	});
	
	$("div.options button.addSpending", wallet.template()).button();
});

wallet.preRender(function(){
	wallet.set('options.dateStartFront', $.datepicker.formatDate('d MM yy', new Date(wallet.get('options.dateStart'))));
	wallet.set('options.dateEndFront', $.datepicker.formatDate('d MM yy', new Date(wallet.get('options.dateEnd'))));
});

wallet.set('options.dateStart', $.datepicker.formatDate('yy-mm-01', new Date()));
wallet.set('options.dateEnd', $.datepicker.formatDate('yy-mm-'+wallet.countDaysOfMont(), new Date()));


wallet.event('div.options input[name=groupByDate], div.options input[name=groupByName]', 'change', function(){
	$(this).attr('checked') ? db.addGroupBySpendings($(this).attr('data-field')) : db.deleteGroupBySpendings($(this).attr('data-field')); 
	spendings.render();
});

wallet.event('div.options button.addSpending', 'click', function(){ formAddSpending.unset(); formAddSpending.render(); });






