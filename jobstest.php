<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php include "subpages/head_common.html";
		include ("classes/job.php");
		include ("classes/jobs.php");
		include ("includes/dbaccess.php"); ?>
	<link rel="stylesheet" type="text/css" href="stylesheets/contact.css" />
	<title>Maine St. Andrew's Pipes and Drums - JobList</title>
</head>

<body>
	<div class="site">
		<?php include "subpages/page_top.html"; ?>
		<div class="content" id="contact">
			<?php
				$job = new job;
				$jobName = $job->GetJobNameByJobID('1');
				print "Job Name: $jobName<br>";
				$job = null;

				$jobs = new jobs;
				$jobs->GetJobList();
				foreach($jobs->jobarr as $id => $job1) {
					$jobName = $job1->getName();
					print "Job Name: $jobName<br>";
				}
				$jobs = null;
			?>
			<?php include "subpages/footer.html"; ?>
		</div>
	</div>
	
	<?php include "includes/GoogleAnalytics.html"; ?>
</body>
</html>