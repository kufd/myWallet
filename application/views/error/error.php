<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="/"><?php echo __('Мій гаманець'); ?><sup></sup></a></h1>
		<h2></h2>
	</div>
</div>
<!-- end header -->

<!-- start page -->
<div id="page">
	<div class="message">
		<?php echo $message; ?>
	</div>
</div>
<!-- end page -->

<?php echo View::factory('footer'); ?>

