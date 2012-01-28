var register = new template('#page');

/**
 * Method registers user
 */
register.register = function()
{
	var params = new Object();
	params['login'] = $('input[name=login]', register.template()).val();
	params['name'] = $('input[name=name]', register.template()).val();
	params['password'] = $('input[name=password]', register.template()).val();
	params['rePassword'] = $('input[name=rePassword]', register.template()).val();
	params['email'] = $('input[name=email]', register.template()).val();
		
	$.ajax(
		{
			url: "register",
			type: "POST",
			data: {params: params},
			dataType: "json",
			async: false,
			global: false,
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					login.render();
				}
			}
		}
	);
}

register.event('table td.submit input', 'click', register.register);