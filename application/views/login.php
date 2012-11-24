<div class="login">

	<h3><?php echo __('Вхід'); ?></h3>
	
	<table>
	<tr>
		<td><?php echo __('Логін'); ?></td>
		<td><input type="text" name="login"></td>
	</tr>
	<tr>
		<td><?php echo __('Пароль'); ?></td>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td></td>
		<td><label><input type="checkbox" name="remember"> <?php echo __('Запам’ятати'); ?></label></td>
	</tr>
	<tr>
		<td colspan="2" class="submit">
			<input type="button" value="<?php echo __('Увійти'); ?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="#" class="forgot"><?php echo __('Забув пароль'); ?></a>
			<a href="#" class="register" <?php echo Ga::getTrackEventCode('Registration', 'Click button register'); ?>>
				<?php echo __('Зареєструватись'); ?>
			</a>
		</td>
	</tr>
	</table>
	
</div>