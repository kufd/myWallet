var feedback = new template('body');

feedback.typeInsert('add');

feedback.showForm = function()
{
	feedback.$('div.formFeedback').dialog({
		buttons:
			[ 
				{
	               	text: __("Надіслати"),
	               	click: function() { feedback.send(); $(this).dialog("destroy"); }
				},
			 	{
			 		text: __("Відмінити"),
			 		click: function() { $(this).dialog("destroy"); }
			 	}
			],
		close: function() { $(this).dialog("destroy"); },
		modal: true,
		width: 450
	});
}

/**
 * Method sends feedback
 */
feedback.send = function()
{
	var params = new Object();
	params['name'] = $('div.formFeedback input[name=name]').val();
	params['email'] = $('div.formFeedback input[name=email]').val();
	params['feedback'] = $('div.formFeedback textarea[name=feedback]').val();
	$.ajax(
		{
			url: "sendFeedback",
			type: "POST",
			data: {params: params},
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					$.jboxmessage(__('Відгук надіслано.'), '', 'top');
				}
			}
		}
	);
}

feedback.event('div.button', 'click', feedback.showForm);
