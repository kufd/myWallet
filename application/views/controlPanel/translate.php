<div class="controlPanel-translate">

	<div id="dialogDeletePhrase" title="<?php echo __('Увага!'); ?>">
		<?php echo __('Видалити фразу?'); ?>
	</div>

	<table>
	<tr>
		<th class="phrase">
			<?php echo __('Фраза'); ?>
		</th>
		<th class="translation">
			<?php echo __('Переклад'); ?>
		</th>
		<th class="actions">
		</th>
	</tr>
	%%list%%
	<tr>
		<td colspan="3" class="notFound %%notFoudClass%%"><?php echo __('Нічого не знайдено'); ?></td>
	</tr>
	<tr>
		<td colspan="3" class="pagination"><div></div></td>
	</tr>
	</table>

	<div class="options">
		<h5><?php echo __('Опції'); ?></h5>
		
		<div>
			<?php echo __('Пошук'); ?>
			<input type="text" name="searchTerm" />
		</div>
		
		<div>
			<?php echo __('Мова'); ?>&nbsp;
			<select name="lang">
			<?php 
			foreach(I18n::getAvailableLanguages() as $code => $name)
			{
				if($code != I18n::DEFAULT_LANG)
				{
					echo '<option value="'.$code.'">'.$name.'</option>';
				} 
			}
			?>
			</select>
		</div>
		
		<div>
			<label>
				<input type="checkbox" name="showOnlyNotTranslated"><?php echo __('Показати тільки не перекладені'); ?>
			</label>
		</div>
	</div>

	<div class="clear"><span></span></div>
</div>