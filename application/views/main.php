<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><?php echo __('Мій гаманець'); ?><sup></sup></a></h1>
		<h2></h2>
	</div>
	<div id="menu">
		<ul>
			<li><a href="#" class="wallet"><?php echo __('Гаманець'); ?></a></li>
			<li><a href="#" class="profile"><?php echo __('Профіль'); ?></a></li>
			<li><a href="#" class="controlPanel"><?php echo __('Адмін-панель'); ?></a></li>
			<li><a href="#" class="login"><?php echo __('Вхід'); ?></a></li>
			<li><a href="#" class="logout"><?php echo __('Вихід'); ?></a></li>
		</ul>
	</div>
</div>
<!-- end header -->

<!-- start page -->
<div id="page">
</div>
<!-- end page -->

<?php echo View::factory('footer'); ?>