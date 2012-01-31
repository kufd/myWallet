var profile = new template('#page');

/**
 * Method saves user`s profile
 */
profile.saveProfile = function()
{
	var params = new Object();
	params['login'] = $('input[name=login]', register.template()).val();
	params['name'] = $('input[name=name]', register.template()).val();
	params['newPassword'] = $('input[name=newPassword]', register.template()).val();
	params['reNewPassword'] = $('input[name=reNewPassword]', register.template()).val();
	params['password'] = $('input[name=password]', register.template()).val();
	params['email'] = $('input[name=email]', register.template()).val();
		
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
	main.refreshProfileWalletLinks();
});

profile.event('table td.submit input', 'click', profile.saveProfile);