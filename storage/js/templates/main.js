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
	
	
	if(!user.isControlPanelAllowed() || controlPanel.isRendered())
	{
		main.$('a.controlPanel').hide();
	}
	else
	{
		main.$('a.controlPanel').show();
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

main.event('a.logout', 'click', main.logout)
.event('a.login', 'click', login.render)
.event('a.profile', 'click', profile.render)
.event('a.wallet, #logo h1 a', 'click', wallet.render)
.event('a.controlPanel', 'click', controlPanel.translate.render);

db.setEvent('changeLogged', main.refreshTopMenuLinks);

