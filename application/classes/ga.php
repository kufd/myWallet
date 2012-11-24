<?php
class Ga
{
	public static function getTrackingCode()
	{
		return "
			<script type=\"text/javascript\">

				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-36569552-1']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();

			</script>";
	}
	
	public static function getTrackEventCode($category, $action, $opt_label = '')
	{
		return "onclick=\"_gaq.push(['_trackEvent', '$category', '$action', '$opt_label']);\"";
	}
}