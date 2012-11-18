<div class="formAddSpending" title="<?php echo __('Нова витрата'); ?>">
	<table>
	<tr>
		<td class="name"><?php echo __('Витрата'); ?></td>
		<td class="value"><input type="text" name="spendingName" /></td>
	</tr>
	<tr>
		<td class="name"><?php echo __('Сума'); ?></td>
		<td class="value"><input type="text" name="amount" value="%%amount%%" /></td>
	</tr>
	<tr>
		<td class="name"><?php echo __('Дата'); ?></td>
		<td class="value">
			<input type="text" name="dateFront" readonly="readonly" value="%%dateFront%%" />
			<input type="hidden" name="date" value="%%date%%" />
		</td>
	</tr>
	</table>
	<input type="hidden" name="spendingId" value="%%spendingId%%" />
</div>