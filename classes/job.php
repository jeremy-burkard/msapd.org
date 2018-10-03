<?php

class Job{
	public $jobID;
	private $name;
	public $description;
	public $season;
	public $startDate;
	public $startTime;
	public $endDate;
	public $endTime;
	public $location;
	public $mapURL;
	public $moreInfo;
	public $moreInfoURL;
	private $loaded = false;

	public function GetJobNameByJobID($JobID) {
		$this->jobID = $JobID;
		
		$result = Query("select * from jobs");
		$row = Fetch($result);
		
		$this->name = $row['Name'];
		$this->loaded = true;
		
		FreeResult($result);
		return $this->name;
	}
	
	public function LoadJob($JobID, $Name, $Description, $Season, $StartDate, $StartTime, $EndDate, $EndTime, $Location, $MapURL, $MoreInfo, $MoreInfoURL){
		$this->jobID = $JobID;
		$this->name = $Name;
		$this->description = $Description;
		$this->season = $Season;
		$this->startDate = $StartDate;
		$this->startTime = $StartTime;
		$this->endDate = $EndDate;
		$this->endTime = $EndTime;
		$this->location = $Location;
		$this->mapURL = $MapURL;
		$this->moreInfo = $MoreInfo;
		$this->moreInfoURL = $MoreInfoURL;
		$this->loaded = true;
	}
	
	public function getName() {
		return $this->name;
	}
}
?>