<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php include "subpages/head_common.html"; ?>
	<link rel="stylesheet" type="text/css" href="stylesheets/gallery.css" />
	<title>Maine St. Andrew's Pipes and Drums - Gallery</title>
</head>

<body>
	<div class="site">
		<?php include "subpages/page_top.html"; ?>
		<?php include "includes/dbaccess.php"; ?>
		<?php include "classes/gallery.php"; ?>
		<div class="content" id="gallerycontent">

			<div id="slideshow"> 
				<object> 
					<param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2Fmsapd%2Fsets%2F<?php echo $galleryid ?>%2Fshow%2F&page_show_back_url=%2Fphotos%2Fmsapd%2Fsets%2F<?php echo $galleryid ?>%2F&set_id=<?php echo $galleryid ?>&jump_to="></param>
					<param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=71649"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="wmode" value="transparent"></param>
					<embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=71649" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2Fmsapd%2Fsets%2F<?php echo $galleryid ?>%2Fshow%2F&page_show_back_url=%2Fphotos%2Fmsapd%2Fsets%2F<?php echo $galleryid ?>%2F&set_id=<?php echo $galleryid ?>&jump_to=" width="700" height="525" wmode="transparent"></embed>
				</object>
			</div>
				
			<div class="gallerylist">
				<ul>
					<?php
						$url = "https://api.flickr.com/services/rest/?api_key=d8ea061f2c4b97a33268d0aba331d8bd&method=flickr.collections.getTree&user_id=36855350@N02";
						$rsp = file_get_contents($url);
						
						$coll_doc = new DOMDocument();
						$coll_doc->loadXML($rsp);
						$root = $coll_doc->documentElement;
						foreach ($root->getElementsByTagName("collection") as $collection){
							$collName = $collection->getAttribute("title");
							echo "<li class='galleryyear'>$collName</li>";
							foreach ($collection->getElementsByTagName("set") as $set){
								$setName = $set->getAttribute("title");
								$setID = $set->getAttribute("id");
								if ($setName == "Favorites"){
									echo "<script language=javascript>LoadGallery('$setID')</script>";
								}
								echo "<li><a href=\"javascript:LoadGallery('$setID')\">$setName</a></li>";
							}
						}
					?>
				</ul>
			</div>
			<?php include "subpages/footer.html"; ?>
		</div>
	</div>

	<?php include "includes/GoogleAnalytics.html"; ?>
</body>
</html>