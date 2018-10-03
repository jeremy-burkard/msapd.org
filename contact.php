<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php include "subpages/head_common.html"; ?>
	<link rel="stylesheet" type="text/css" href="stylesheets/contact.css" />
	<title>Maine St. Andrew's Pipes and Drums - Contact</title>
</head>

<body>
	<div class="site">
		<?php include "subpages/page_top.html"; ?>
		<?php include "includes/dbaccess.php"; ?>

		<div class="content" id="contact">
			<div class="padded">
				<table class="contact">
					<tr>
						<td>
							<b>Pipe Major</b><br/>
							Scott Heney<br/>
							phone: 207.667.4873<br/>
							email: <?php echo "<script type=\"text/javascript\">MailLink('PM')</script>" ?>

						</td>
						<td>
							<b>Drum Major</b><br/>
							Susan Brenner<br/>
							email: <?php echo "<script type=\"text/javascript\">MailLink('DM')</script>" ?>
						</td>
					</tr>
					<tr>
						<td>
							<b>Business Manager</b><br/>
							Jeremy Burkard<br/>
							phone: 207.607.2310<br/>
							email: <?php echo "<script type=\"text/javascript\">MailLink('BM')</script>" ?>
						</td>
						<td>
							<b>Webmaster</b><br/>
							Jeremy Burkard<br/>
							email: <?php echo "<script type=\"text/javascript\">MailLink('WM')</script>" ?>
						</td>
					</tr>
				</table>
			</div>
			<?php include "subpages/footer.html"; ?>
		</div>
	</div>
	
	<?php include "includes/GoogleAnalytics.html"; ?>
</body>
</html>