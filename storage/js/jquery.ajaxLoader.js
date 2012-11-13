/***
@title:
Ajax Loader

@version:
1.0

@author:
Andreas Lagerkvist

@date:
2008-09-25

@url:
http://andreaslagerkvist.com/jquery/ajax-loader/

@license:
http://creativecommons.org/licenses/by/3.0/

@copyright:
2008 Andreas Lagerkvist (andreaslagerkvist.com)

@requires:
jquery, jquery.ajaxLoader.css, jquery.ajaxLoader.gif

@does:
Use this plug-in when you want to inform your visitors that a certain part of your page is currently loading. The plug-in adds a faded 'loading-div' on top of the selected element(s). The div is of course completely stylable.

@howto:
jQuery('#contact').ajaxLoader(); would add the overlay on top of the #contact-element.

When you want to remove the loader simply run jQuery('#contact').ajaxLoaderRemove();

@exampleHTML:
I should start loading after a couple of seconds, then load for a couple more and then stop loading only to start again after a couple of seconds. And so on.

@exampleJS:
setInterval(function () {
	jQuery('#jquery-ajax-loader-example').ajaxLoader();
	setTimeout(function () {
		jQuery('#jquery-ajax-loader-example').ajaxLoaderRemove();
	}, 2000);
}, 4000);
***/
jQuery.fn.ajaxLoader = function (conf) {
	var config = jQuery.extend({
		className:		'jquery-ajax-loader-simple', 
		fadeDuration:	500
	}, conf);

	return this.each(function () {
		var t = jQuery(this);

		if (!this.ajaxLoaderObject) 
		{
			var offset = t.offset();
			var dim = {
				left:	offset ? offset.left : 0, 
				top:	offset ? offset.top : 0, 
				width:	100, 
				height:	17
			};

			this.ajaxLoaderObject = jQuery('<div class="' + config.className + '">Loading...</div>').css({
				position:			'fixed', 
				left:				dim.left + 'px', 
				top:				dim.top + 'px',
				width:				dim.width + 'px',
				height:				dim.height + 'px',
				color:				'white',
				backgroundColor:	'red'
			}).appendTo(document.body).hide();
		}
		
		if(!this.ajaxLoaderObject.is(':visible'))
		{
			this.ajaxLoaderObject.show();
		}
	});
};

jQuery.fn.ajaxLoaderRemove = function (conf) 
{
	
	var config = jQuery.extend({
		fadeDuration:	500
	}, conf);
	
	return this.each(function () {
		if (this.ajaxLoaderObject) 
		{
			setTimeout(
				function()
				{ 
					this.ajaxLoaderObject.hide();
				}, 
				config.fadeDuration
			);
		}
	});
};
