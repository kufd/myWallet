<div class="feedback">

	<div class="button">
		<div class="box">
			<div <?php echo Ga::getTrackEventCode('Feedback', 'Open dialog'); ?>><?php echo __('Надіслати відгук'); ?></div>
		</div>
	</div>
	
	<div class="formFeedback" title="<?php echo __('Надіслати відгук'); ?>">
		<div class="inputBox">
			<input type="text" name="name" placeholder="<?php echo __('Ваше ім’я'); ?>">
		</div>
		<div class="inputBox">
			<input type="text" name="email" placeholder="<?php echo __('Ваш email'); ?>">
		</div>
		<textarea name="feedback"></textarea>
	</div>

</div>