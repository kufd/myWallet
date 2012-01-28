jQuery.fn.shadow = function (conf) 
{
	var config = jQuery.extend({
		className:		'jquery-shadow', 
		fadeDuration:	0,
		zIndex:			100,
	}, conf);

	return this.each(function () {
		var t = jQuery(this);

		if (!this.shadow) {
			var offset = t.offset();
			var dim = {
				left:	offset ? offset.left : 0, 
				top:	offset ? offset.top : 0, 
				width:	t.outerWidth() ? t.outerWidth() : t.width(), 
				height:	t.outerHeight() ? t.outerHeight() : t.height()
			};

			this.shadow = jQuery('<div class="' + config.className + '"></div>').css({
				position:			'absolute', 
				left:				dim.left + 'px', 
				top:				dim.top + 'px',
				width:				dim.width + 'px',
				height:				dim.height + 'px',
				zIndex:				dim.zIndex,
				backgroundColor: 	'#333',
				opacity:			0.6
			}).appendTo(document.body).hide();
		}

		this.shadow.fadeIn(config.fadeDuration);
	});
};

jQuery.fn.shadowHide = function (conf) {
	
	var config = jQuery.extend({
		fadeDuration:	0
	}, conf);
	
	return this.each(function () {
		if (this.shadow) {
			this.shadow.fadeOut(config.fadeDuration);
		}
	});
};

