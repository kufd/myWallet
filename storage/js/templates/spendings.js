var spendings = new template('');

spendings.typeInsert('replaceContainer');

/**
 * Method creates html code of spending list
 */
spendings.createList = function()
{
	var html = '';
	var sum =0;
	
	var params = new Object();
	params['dateBegin'] = wallet.get('options.dateStart');
	params['dateEnd'] = wallet.get('options.dateEnd');
	params['group'] = db.groupBySpendings();
	params['order'] = new Object();
	params['order']['field'] = db.sortingField();
	params['order']['direction'] = db.sortingDirection();
	var data = db.spendingList(params);
	
	core.setDatapickerWordForm(2);
	for(var k in data)
	{
		var v = data[k];
		sum+=parseInt(v['amount']*100);
		
		html += '<tr data-spending-id="'+v['id']+'">';
		html += 	'<td class="spendingName">';
		html += 		v['spendingName']['name'];
		html += 	'</td>';
		html += 	'<td class="amount">';
		html += 		v['amount']+' '+db.currency();
		html += 	'</td>';
		html += 	'<td class="date">';
		html += 		$.datepicker.formatDate('d MM yy', new Date(v['date']));
		html += 	'</td>';
		html += 	'<td class="actions">';
		if(v['editable'])
		{
			html += 		'<div class="edit" title="'+__('Редагувати')+'">&nbsp;</div>';
			html += 		'<div class="delete" title="'+__('Видалити')+'">&nbsp;</div>';
		}
		html += 	'</td>';
		html += '</tr>';
	}
	core.setDatapickerWordForm(1);
	
	html += '<tr class="sum" data-spending-id="">';
	html += 	'<td class="spendingName">';
	html += 		__('Загальна сума');
	html += 	'</td>';
	html += 	'<td class="amount">';
	html += 		(sum/100)+' '+db.currency();
	html += 	'</td>';
	html += 	'<td class="date">';
	html += 	'</td>';
	html += 	'<td class="actions">';
	html += 	'</td>';
	html += '</tr>';
	
	var obj=$(html);

	spendings.set('list', html);
}

spendings.preRender(function(){
	spendings.createList();
});

spendings.afterRender(function(){
	$('th div[data-sort='+db.sortingField()+']', spendings.template()).addClass(db.sortingDirection());
});

spendings.event('div.edit', 'click', function(){
	wallet.showFromEditSpending($(this).parents('tr').attr('data-spending-id')); 
});

//dialog for removing spendings
spendings.event('div.delete', 'click', function(){ 
	wallet.deleteSpendingId = $(this).parents('tr').attr('data-spending-id');

	$('#dialogDeleteSpending').dialog
	(
		{ 
			buttons:
			[ 
			 	{
			 		text: __("Відмінити"),
			 		click: function() { $(this).dialog("close"); }
			 	},
				{
	               	text: __("Видалити"),
	               	click: function() { wallet.deleteSpending(wallet.deleteSpendingId); $(this).dialog("close"); }
				}
			],
			modal: true,
			width: 350
		}
	); 
});


//set sorting
spendings.event('th div', 'click', function(){
	db.sorting($(this).attr('data-sort'));
	spendings.render();
});




