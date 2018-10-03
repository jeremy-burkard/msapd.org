<?php

class jobs{

	public $jobarr = array();
	
	public function GetJobList(){
		$result = Query("select * from jobs");
		
		while ($row = mysql_fetch_assoc($result)) {
			$job = new Job;
			$job->LoadJob(
				$row['JobID'], 
				$row['Name'],
				$row['Description'], 
				$row['Season'],
				$row['StartDate'],
				$row['StartTime'],
				$row['EndDate'],
				$row['EndTime'],
				$row['Location'],
				$row['MapURL'],
				$row['MoreInfo'],
				$row['MoreInfoURL']);
			$this->jobarr[$row['id']] = $job;
			$job = null;
		}

		FreeResult($result);
	}
}
?>