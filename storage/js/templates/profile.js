var profile = new template('#page');

/**
 * Method saves user`s profile
 */
profile.saveProfile = function()
{
	var params = new Object();
	params['login'] = profile.$('input[name=login]').val();
	params['name'] = profile.$('input[name=name]').val();
	params['newPassword'] = profile.$('input[name=newPassword]').val();
	params['reNewPassword'] = profile.$('input[name=reNewPassword]').val();
	params['password'] = profile.$('input[name=password]').val();
	params['email'] = profile.$('input[name=email]').val();
	params['lang'] = profile.$('select[name=lang]').val();
	params['currency'] = profile.$('input[name=currency]').val();
	params['useEncryption'] = profile.$('input[name=useEncryption]').attr('checked') ? '1' : '0';
	
	var reinitializeApplication = params['lang'] != db.profile('lang');
		
	if(db.updateProfile(params))
	{
		$.jboxmessage(__('Профіль збережено.'), '', 'top');
		
		//clear fields with passsword
		$('input[name=newPassword], input[name=reNewPassword], input[name=password]', register.template()).val('');
		
		if(reinitializeApplication)
		{
			profile.reinitializeApplication();
		}
	}	
}

profile.reinitializeApplication = function()
{
	document.location.reload();
}

profile.preRender(function(){
	profile.set('login', db.profile('login'));
	profile.set('name', db.profile('name'));
	profile.set('email', db.profile('email'));
	profile.set('currency', db.profile('currency'));
});

profile.afterRender(function(){
	profile.$('select[name=lang]').val(db.profile('lang'));
	if(db.profile('useEncryption') == 1)
	{
		profile.$('input[name=useEncryption]').attr('checked', 'checked');
	}
});

profile.event('table td.submit input', 'click', profile.saveProfile);