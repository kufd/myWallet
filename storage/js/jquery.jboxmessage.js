$.jboxmessage = function(header, content, position, class_name) 
{
	/*
	//close all previous messages if there are click on body
	$.jboxmessage.closeByClickOnBody = false;
	if($.jboxmessage.initCloseByClickOnBody === undefined)
	{
		$.jboxmessage.initCloseByClickOnBody = true;
		$('body').click(function(){ 
			$.jboxmessage.closeByClickOnBody && $('div.boxmessage').remove(); 
			$.jboxmessage.closeByClickOnBody=true; 
		});
	}
	*/

	//close all previous messages
	$('div.boxmessage').remove();
	
	//clear previous autohide
	$.jboxmessage.autohideTimeoutId && clearTimeout($.jboxmessage.autohideTimeoutId);
	
	//autohide
	$.jboxmessage.autohideTimeoutId = setTimeout(function(){ 
		$.jboxmessage.autohideTimeoutId=null; 
		$('div.boxmessage').remove(); 
	}, 7000);
	
	// create box of message
	var boxmessage = $('<div class="boxmessage ' + class_name + '"><h3>' + header + '</h3>' + content + '</div>');
	
	// set position
	if(position == 'top')
	{
		$(boxmessage).css('top', 0);
	}
	else
	{
		$(boxmessage).css('bottom', 0);
	}

	// close on click
	$(boxmessage).click(function()
	{
		$(this).animate({opacity: 0}, 100, function()
		{
			$(this).remove();
		});
	});
	
	// show message
	$(boxmessage).css('opacity', 0).prependTo(document.body).animate({opacity: 1}, 100);
};

