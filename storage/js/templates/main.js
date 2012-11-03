var main = new template('body');

//set type insert
main.typeInsert('add');

/**
 * Method hide or show links in main template
 */
main.refreshTopMenuLinks = function()
{
	if(db.logged())
	{
		$('a.logout', main.template()).show();
		$('a.login', main.template()).hide();
		
		if(wallet.isRendered())
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
	else
	{
		if(!login.isRendered())
		{
			$('a.login', main.template()).show();
		}
		else
		{
			$('a.login', main.template()).hide();
		}
		$('a.logout', main.template()).hide();
		
		$('a.wallet', main.template()).hide();
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

main.addPreRenderStatic(main.refreshTopMenuLinks);

main.event('a.logout', 'click', main.logout);
main.event('a.login', 'click', login.render);
main.event('a.profile', 'click', profile.render);
main.event('a.wallet', 'click', wallet.render);

db.setEvent('changeLogged', main.refreshTopMenuLinks);

