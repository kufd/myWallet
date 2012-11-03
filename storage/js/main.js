$(document).ready(function() {
	
	$('body').ajaxSend(function() {
		$(window).ajaxLoader({fadeDuration:0});
	})
	.ajaxStop(function() {
		$(window).ajaxLoaderRemove({fadeDuration:0});
	});

	db.load();

	//set templates
	main.setTemplate(db.template('main'));
	login.setTemplate(db.template('login'));
	forgotPassword.setTemplate(db.template('forgotPassword'));
	register.setTemplate(db.template('register'));
	wallet.setTemplate(db.template('wallet'));
	formAddSpending.setTemplate(db.template('formAddSpending'));
	spendings.setTemplate(db.template('spendings'));
	profile.setTemplate(db.template('profile'));
	

	main.render();
	db.logged() ? wallet.render() : login.render();
});

