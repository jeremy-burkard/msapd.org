<?php
	$galleryid = $_GET['galleryid'];
	//$galleryid = "72157616006731889";
	
	echo "<object width=\"700\" height=\"525\"> ";
	echo "<param name=\"flashvars\" value=\"offsite=true&lang=en-us&page_show_url=%2Fphotos%2Fmsapd%2Fsets%2F" . $galleryid . "%2Fshow%2F&page_show_back_url=%2Fphotos%2Fmsapd%2Fsets%2F".$galleryid."%2F&set_id=".$galleryid."&jump_to=\"></param>";
	echo "<param name=\"movie\" value=\"http://www.flickr.com/apps/slideshow/show.swf?v=71649\"></param>";
	echo "<param name=\"allowFullScreen\" value=\"true\"></param>";
	echo "<param name=\"wmode\" value=\"transparent\"></param>";
	echo "<embed type=\"application/x-shockwave-flash\" src=\"http://www.flickr.com/apps/slideshow/show.swf?v=71649\" allowFullScreen=\"true\" flashvars=\"offsite=true&lang=en-us&page_show_url=%2Fphotos%2Fmsapd%2Fsets%2F".$galleryid."%2Fshow%2F&page_show_back_url=%2Fphotos%2Fmsapd%2Fsets%2F".$galleryid."%2F&set_id=".$galleryid."&jump_to=\" width=\"700\" height=\"525\" wmode=\"transparent\"></embed>";
	echo "</object>";
?>