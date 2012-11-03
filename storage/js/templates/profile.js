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
		
	if(db.updateProfile(params))
	{
		$.jboxmessage('Профіль збережено.', '', 'top');
		
		//clear fields with passsword
		$('input[name=newPassword], input[name=reNewPassword], input[name=password]', register.template()).val('');
	}	
}

profile.preRender(function(){
	profile.set('login', db.profile('login'));
	profile.set('name', db.profile('name'));
	profile.set('email', db.profile('email'));
});

profile.event('table td.submit input', 'click', profile.saveProfile);