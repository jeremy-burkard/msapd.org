<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php 
		include "subpages/head_common.html";
		//include_once "classes/Calendar.v1_0_0.php";
	?>
	<link rel="stylesheet" type="text/css" href="stylesheets/index.css" />
	<link rel="stylesheet" type="text/css" href="stylesheets/newsbar.css" />
	<!--<script type="text/javascript" src="includes/mootools-1.2.4-core-yc.js"></script> -->
	<script type="text/javascript" src="includes/mootools-1.2.4.4-more.js"></script> 
	<script type="text/javascript" src="smoothbox/smoothbox.js"></script>
	<script type="text/javascript" src="includes/accordion.js"></script>
	<link rel="stylesheet" href="smoothbox/smoothbox.css" type="text/css" media="screen" />
	<title>Maine St. Andrew's Pipes and Drums - Home Page</title>
</head>

<body>
	<div class="site">
		<?php include "subpages/page_top.html"; ?>
		<div class="content" id="home">
			<!--
			<div class="newsflash" id="newsflashheader">MSAPD WINS BEST DRUM CORPS!</div>
			<div class="newsflash"></div>-->
			<?php 
				//include "subpages/news_bar.php"; 
			?>
			<div id="currentevents">
				<?php include_once "content/news.html"; ?>
				<br/>
				<?php include_once "content/upcoming_events.html"; ?>
			</div>

			<table>
				<tr>
					<td align="center">
						<img src="images/2007MemDay-15percent.jpg" alt="Maine St Andrew's Pipes &amp; Drums"/><br/>
						<div class="caption">
							Maine St. Andrew's Pipes and Drums<br/>
							Ellsworth Maine, Memorial Day 2007<br/>
							<br/>
						</div>
						<div id="description">
							We are a bagpipe band based in Ellsworth Maine. MSAPD entertains audiences throughout Maine
							in parades and concerts, competes in Highland Games in New England and Canada,
							and provides educational presentations to Maine's school children.
						</div>
					</td>
				</tr>
			</table>
			<?php include "subpages/footer.html"; ?>
		</div>
	</div>

	<?php include "includes/GoogleAnalytics.html"; ?>
</body>
</html>