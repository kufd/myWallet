var main = new template('body');

/**
 * Method hide or show login and logout links in main template
 */
main.refreshLoginLogoutLinks = function()
{
	if(db.logged())
	{
		$('a.logout', main.template()).show();
		$('a.login', main.template()).hide();
	}
	else
	{
		$('a.login', main.template()).show();
		$('a.logout', main.template()).hide();
	}
}

/**
 * Method hide or show profile and wallet links in main template
 */
main.refreshProfileWalletLinks = function()
{
	if(db.logged())
	{
		$('a.profile', main.template()).show();
		$('a.wallet', main.template()).hide();
	}
	else
	{
		$('a.wallet', main.template()).show();
		$('a.profile', main.template()).hide();
	}
}

/**
 * Method logouts user
 */
main.logout = function()
{
	$.ajax(
			{
				url: "logout",
				type: "POST",
				data: {},
				dataType: "json",
				async: false,
				global: false,
				success: function(data)
				{
					if(!core.ajaxErrors(data))
					{
						db.logged(false);
						login.render();
					}
				}
			}
		);
}

main.afterRender(main.refreshLoginLogoutLinks);
main.event('a.logout', 'click', main.logout);
main.event('a.login', 'click', login.render);
main.event('a.profile', 'click', profile.render);


db.setEvent('changeLogged', main.refreshLoginLogoutLinks);