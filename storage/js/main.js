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

	core.initApplication();
	

	main.render();
	
	db.logged() ? wallet.render() : login.render();
	
});

