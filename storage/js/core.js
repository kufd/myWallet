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