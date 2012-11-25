var login = new template('#page');

/**
 * Method logins user
 */
login.login = function()
{
	var params = new Object();
	params['login'] = $('input[name=login]', login.template()).val();
	params['password'] = $('input[name=password]', login.template()).val();
	params['remember'] = $('input[name=remember]', login.template()).attr('checked');

	$.ajax(
		{
			url: "login",
			type: "POST",
			data: {login: params['login'], password: params['password'], remember: params['remember']},
			dataType: "json",
			async: false,
			global: false,
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					db.logged(true);
					db.merge(data);
					wallet.render();
				}
			}
		}
	);
}


login.event('table td a.register', 'click', register.render);
login.event('table td a.forgot', 'click', forgotPassword.render);
login.event('p.about a', 'click', about.render);
login.event('table td.submit input', 'click', login.login);
login.event('table', 'keyup', function(event){
	if (event.which == 13) 
	{
		login.login();
	} 
});