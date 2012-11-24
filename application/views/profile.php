<div class="profile">

	<h3><?php echo __('Профіль'); ?></h3>
	
	<table>
	<tr>
		<td><?php echo __('Логін'); ?></td>
		<td><input type="text" name="login" readonly="readonly" value="%%login%%"/></td>
	</tr>
	<tr>
		<td><?php echo __('Ім’я'); ?></td>
		<td><input type="text" name="name" value="%%name%%"/></td>
	</tr>
	<tr>
		<td><?php echo __('e-mail'); ?></td>
		<td><input type="text" name="email" value="%%email%%"/></td>
	</tr>
	<tr>
		<td><?php echo __('Мова'); ?></td>
		<td>
			<select name="lang">
			<?php 
			foreach(I18n::getAvailableLanguages() as $code => $name)
			{
				echo '<option value="'.$code.'">'.$name.'</option>';
			}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td><?php echo __('Валюта'); ?></td>
		<td><input type="text" name="currency" value="%%currency%%"/></td>
	</tr>
	<tr>
		<td class="pt-15"><?php echo __('Новий пароль'); ?></td>
		<td class="pt-15"><input type="password" name="newPassword"/></td>
	</tr>
	<tr>
		<td><?php echo __('Повтор нового паролю'); ?></td>
		<td><input type="password" name="reNewPassword"/></td>
	</tr>
	<tr>
		<td class="pt-15"><?php echo __('Поточний пароль'); ?></td>
		<td class="pt-15"><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td colspan="2" class="submit">
			<input type="button" value="<?php echo __('Зберегти'); ?>" />
		</td>
	</tr>
	</table>
	
</div>