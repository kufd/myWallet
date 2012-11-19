controlPanel.translate = new template('#page');

controlPanel.addTemplate(controlPanel.translate);

controlPanel.translate.phraseBeforeFocus = '';

controlPanel.translate.settings = {
	lang: 'en-us',
	showOnlyNotTranslated: false,
	page: 1,
	onPage: 10,
	total: 0,
	searchTerm: ''
};

controlPanel.savePhrase = function(phrase, translation)
{
	var params = {
		lang: controlPanel.translate.settings.lang,
		phrase: phrase,
		translation: translation
	};
	$.ajax(
		{
			url: "/controlPanel/savePhrase",
			type: "POST",
			data: {params: params},
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
				}
			}
		}
	);
}

controlPanel.removePhrase = function(phrase)
{
	var params = {
		lang: controlPanel.translate.settings.lang,
		phrase: phrase
	};
	$.ajax(
		{
			url: "/controlPanel/removePhrase",
			type: "POST",
			data: {params: params},
			success: function(data)
			{
				if(!core.ajaxErrors(data))
				{
				}
			}
		}
	);
	
	controlPanel.translate.reloadList();
}

controlPanel.translate.createList = function()
{
	var phrases = db.getPhrasesForTranslations(controlPanel.translate.settings);
	
	controlPanel.translate.settings.total = phrases['total'];
	
	phrases = phrases['phrases'];
	
	var html = '';
	
	for(var phrase in phrases)
	{
		var translation = phrases[phrase];
		
		html += '<tr>\
				<td class="phrase">\
					<textarea>'+phrase+'</textarea>\
				</td>\
				<td class="translation">\
					<textarea>'+translation+'</textarea>\
				</td>\
				<td class="actions">\
					<div class="delete" title="Видалити"><span></span></div>\
				</td>\
				</tr>';
	}
	
	this.set('notFoudClass', (!html ? 'notFoundVisible' : ''));
	
	this.set('list', html);
}

controlPanel.translate.reloadList = function()
{
	this.render();
}

controlPanel.translate.preRender(function(){
	controlPanel.translate.createList();
});

controlPanel.translate.afterRender(function(){
	
	controlPanel.translate.$('div.options input[name=showOnlyNotTranslated]').attr('checked', controlPanel.translate.settings.showOnlyNotTranslated);
	controlPanel.translate.$('div.options select[name=lang]').val(controlPanel.translate.settings.lang);
	controlPanel.translate.$('div.options input[name=searchTerm]').val(controlPanel.translate.settings.searchTerm);
	
	controlPanel.translate.$('table td.pagination div').pagination({
        items: controlPanel.translate.settings.total,
        itemsOnPage: controlPanel.translate.settings.onPage,
        cssStyle: 'light-theme',
        currentPage: controlPanel.translate.settings.page,
        selectOnClick: false,
        onPageClick: function(pageNumber){
        	controlPanel.translate.settings.page = pageNumber;
        	controlPanel.translate.reloadList();
        }
    });
	
});

controlPanel.translate.event(
	'div.options input[name=showOnlyNotTranslated]', 
	'click', 
	function()
	{
		controlPanel.translate.settings.showOnlyNotTranslated = $(this).is(':checked');
		controlPanel.translate.settings.page = 1;
		controlPanel.translate.reloadList();
	}
)
.event(
	'div.options select[name=lang]', 
	'change', 
	function()
	{
		controlPanel.translate.settings.lang = $(this).val();
		controlPanel.translate.settings.page = 1;
		controlPanel.translate.reloadList();
	}
)
.event(
	'div.options input[name=searchTerm]', 
	'blur', 
	function()
	{
		controlPanel.translate.settings.searchTerm = $(this).val();
		controlPanel.translate.settings.page = 1;
		controlPanel.translate.reloadList();
	}
)
.event(
	'table td.translation textarea', 
	'focus', 
	function()
	{
		controlPanel.translate.phraseBeforeFocus = $(this).val();
	}
)
.event(
	'table td.translation textarea', 
	'blur', 
	function()
	{
		if(controlPanel.translate.phraseBeforeFocus != $(this).val())
		{
			controlPanel.savePhrase($(this).closest('td').prev().find('textarea').text(), $(this).val());
		}
		
		if(controlPanel.translate.settings.showOnlyNotTranslated)
		{
			controlPanel.translate.reloadList();
		}
	}
)
.event(
	'table td.actions div.delete', 
	'click', 
	function()
	{
		var phraseToDelete = $(this).closest('tr').find('td.phrase textarea').text();
		$('#dialogDeletePhrase').dialog
		(
			{ 
				buttons:
				[ 
				 	{
				 		text: __("Видалити"),
				 		click: function() {
				 			controlPanel.removePhrase(phraseToDelete);
				 			$(this).dialog("close"); 
				 		}
				 	},
				 	{
				 		text: __("Відмінити"),
				 		click: function() { $(this).dialog("close"); }
				 	}
				],
				modal: true,
				width: 350
			}
		); 
	}
);

