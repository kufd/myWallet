<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : FlashyWeb
Version    : 1.0
Released   : 20081102
Description: A two-column, fixed-width and lightweight template ideal for 1024x768 resolutions. Suitable for blogs and small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/storage/images/favicon.ico">
<title>Мій гаманець - нагадування паролю</title>

<link href="/storage/css/main.css" rel="stylesheet" type="text/css" />
<link href="/storage/css/forgotPassword/generate.css" rel="stylesheet" type="text/css" />

</head>


<body>

<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#">Мій гаманець<sup></sup></a></h1>
		<h2></h2>
	</div>
</div>
<!-- end header -->

<!-- start page -->
<div id="page">
	<div class="message">
	<?php 
		if($isPasswordSent)
		{
			echo 'Пароль був відправлений вам на пошту.';
		} 
		else
		{
			echo 'Неправильне посилання.';
		}
	?>
	</div>
</div>
<!-- end page -->

<!-- start footer -->
<div id="footer">
	<div id="footer-menu">
		<!--ul>
			<li class="active"><a href="index.html">головна</a></li>
		</ul-->
	</div>
	<p id="legal">(c) <?=date('Y')?> mywallet.com. Design by <a href="http://www.freecsstemplates.org/" target="_blank">Free CSS Templates</a>.</p>
</div>
<!-- end footer -->

</body>
</html>
