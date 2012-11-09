var forgotPassword = new template('#page');


forgotPassword.event('table', 'keyup', function(event){
	if (event.which == 13) 
	{
		forgotPassword.sendMessage();
	} 
});

forgotPassword.event('table td.submit', 'click', function(event){
	forgotPassword.sendMessage();
});

forgotPassword.sendMessage = function()
{
	$.ajax(
		{
			url: "/forgotPassword/sendMessage/",
			type: "POST",
			data: {params: {login: forgotPassword.$('input[name=login]').val()}},
			dataType: "json",
			async: false,
			global: false,
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
					$.jboxmessage('Повідомлення з інструкцією для відновлення паролю надіслане вам на поштову скриньку.', '', 'top');
				}
			}
		}
	);
}