<div class="forgotPassword">


	<div class="alert">
		<h2><?php echo __('Увага!'); ?></h3>
		<?php echo __('При використанні процедури відновлення паролю буде втрачена зашифрована інформація.'); ?>
	</div>

	<div class="form">
		<h3><?php echo __('Відровлення паролю'); ?></h3>
	
		<table>
		<tr>
			<td><?php echo __('Введіть ваш логін'); ?></td>
			<td><input type="text" name="login"></td>
		</tr>
		<tr>
			<td colspan="2" class="submit">
				<input type="button" value="<?php echo __('Відновити'); ?>" />
			</td>
		</tr>
		</table>
	</div>
	
</div>