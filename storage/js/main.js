$(document).ready(function() {
	
	$.ajaxSetup({
	    beforeSend: function() {
	    	$(window).ajaxLoader({fadeDuration:0});
	    },
	    complete: function() {
	    	$(window).ajaxLoaderRemove({fadeDuration:500});
	    },
	    async: false,
	    dataType: "json",
	    cache: false
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

