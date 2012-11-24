<div class="register">

	<h3><?php echo __('Реєстрація'); ?></h3>
	
	<table>
	<tr>
		<td><?php echo __('Логін'); ?></td>
		<td><input type="text" name="login"></td>
	</tr>
	<tr>
		<td><?php echo __('Ім’я'); ?></td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td><?php echo __('e-mail'); ?></td>
		<td><input type="text" name="email"></td>
	</tr>
	<tr>
		<td><?php echo __('Пароль'); ?></td>
		<td><input type="text" name="password"></td>
	</tr>
	<tr>
		<td><?php echo __('Повтор пароля'); ?></td>
		<td><input type="text" name="rePassword"></td>
	</tr>
	<tr>
		<td colspan="2" class="submit">
			<input type="button" value="<?php echo __('Зареєструватись'); ?>" <?php echo Ga::getTrackEventCode('Registration', 'Submit form'); ?> />
		</td>
	</tr>
	</table>
	
</div>