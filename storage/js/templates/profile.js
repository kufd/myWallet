var profile = new template('#page');

/**
 * Method saves user`s profile
 */
profile.saveProfile = function()
{
	var params = new Object();
	params['login'] = $('input[name=login]', register.template()).val();
	params['name'] = $('input[name=name]', register.template()).val();
	params['password'] = $('input[name=password]', register.template()).val();
	params['rePassword'] = $('input[name=rePassword]', register.template()).val();
	params['email'] = $('input[name=email]', register.template()).val();
		
	db.updateProfile(params);
}

profile.preRender(function(){
	profile.set('login', db.profile('login'));
	profile.set('name', db.profile('name'));
	profile.set('email', db.profile('email'));
});

profile.event('table td.submit input', 'click', profile.saveProfile);