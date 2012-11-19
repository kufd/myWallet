var core = new Object();

/**
 * Method checks errors from ajax request and shows messages
 */
core.ajaxErrors = function(data)
{
	if(data && data['errors'])
	{
		var msg = '';
		for(var k in data['errors'])
		{
			var v = data['errors'][k];
			msg && (msg += '<br/>');
			msg += v;
		}
		
		$.jboxmessage('Помилка!', msg, 'top', 'error');
		
		return true;
	}
	
	return false;
}

/**
 * Method sets word form for datapicker 
 */
core.setDatapickerWordForm = function(number)
{
	if(number && $.datepicker._defaults['monthNames'+number])
	{
		$.datepicker._defaults.monthNames = $.datepicker._defaults['monthNames'+number];
	}
}

/**
 * 
 */
core.setDatapickerLang = function()
{
	$.datepicker.setDefaults($.datepicker.regional[db.getLang()]);
}

/**
 * Method initialize application
 */
core.initApplication = function()
{
	db.load();

	//set templates
	main.setTemplate(db.template('main'));
	login.setTemplate(db.template('login'));
	forgotPassword.setTemplate(db.template('forgotPassword'));
	register.setTemplate(db.template('register'));
	wallet.setTemplate(db.template('wallet'));
	formAddSpending.setTemplate(db.template('formAddSpending'));
	spendings.setTemplate(db.template('spendings'));
	profile.setTemplate(db.template('profile'));
	
	controlPanel.translate.setTemplate(db.template('controlPanel/translate'));
	
	core.setDatapickerLang();
}

function __(phrase)
{
	var translation = db.getTranslation(phrase);
	return translation ? translation : phrase;
}