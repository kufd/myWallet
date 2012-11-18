<div class="wallet">
	<div id="dialogDeleteSpending" title="<?php echo __('Увага!'); ?>">
		<?php echo __('Видалити витрату?'); ?>
	</div>
	
	%%template:spendings%%
	
	<div class="options">
	
		<button class="addSpending"><?php echo __('Додати витрату'); ?></button>
	
		<h5><?php echo __('Опції'); ?></h5>
		<h6><?php echo __('Період'); ?></h6>
	    <input type="text" name="dateStartFront" readonly="readonly" value="%%options.dateStartFront%%" />
	    <input type="hidden" name="dateStart" value="%%options.dateStart%%" />
	    -
	    <input type="text" name="dateEndFront" readonly="readonly" value="%%options.dateEndFront%%" />
	    <input type="hidden" name="dateEnd" value="%%options.dateEnd%%" />
	    
	    <br/><br/><br/>
	    
	    <h6><?php echo __('Групувати по'); ?></h6>
	    <label><input type="checkbox" name="groupByName" data-field="spendingNameId" /> <?php echo __('назві'); ?></label>
	    <br/>
	    <label><input type="checkbox" name="groupByDate" data-field="date" /> <?php echo __('даті'); ?></label>
	</div>
	
	<div class="clear"><span></span></div>
</div>