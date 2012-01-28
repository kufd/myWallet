<div class="wallet">
	<div id="dialogDeleteSpending" title="Увага!">
		Видалити витрату?
	</div>
	
	%%template:spendings%%
	
	<div class="options">
	
		<button class="addSpending">Додати витрату</button>
	
		<h5>Опції</h5>
		<h6>Період</h6>
	    <input type="text" name="dateStartFront" readonly="readonly" value="%%options.dateStartFront%%" />
	    <input type="hidden" name="dateStart" value="%%options.dateStart%%" />
	    -
	    <input type="text" name="dateEndFront" readonly="readonly" value="%%options.dateEndFront%%" />
	    <input type="hidden" name="dateEnd" value="%%options.dateEnd%%" />
	    
	    <br/><br/><br/>
	    
	    <h6>Групувати по</h6>
	    <label><input type="checkbox" name="groupByName" data-field="spendingNameId" /> назві</label>
	    <br/>
	    <label><input type="checkbox" name="groupByDate" data-field="date" /> даті</label>
	</div>
	
	<div class="clear"><span></span></div>
</div>