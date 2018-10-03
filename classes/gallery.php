<?php

class Gallery{
	public $galleryCategory;
	public $galleryName;
	public $galleryID;
	public $galleryOrder;
	private $loaded = false;
	
	public function GetGalleryByGalleryID($GalleryID){
		$this->galleryID = $GalleryID;
		
		$result = Query("select * from galleries where GalleryID = '$this->galleryID'");
		$row = Fetch($result);
		
		$this->galleryCategory = $row['GalleryCategory'];
		$this->galleryName = $row['GalleryName'];
		$this->galleryOrder = $row['galleryOrder'];
		
		$this->loaded = true;
		
		FreeResult($result);
	}

	public function LoadGallery($GalleryCategory, $GalleryName, $GalleryID, $GalleryOrder){
		$this->galleryCategory = $GalleryCategory;
		$this->galleryName = $GalleryName;
		$this->galleryID = $GalleryID;
		$this->galleryOrder = $GalleryOrder;
		$this->loaded = true;
	}
	
	public function UpdateGallery(){
		$conn = DBConnect();
		$result = mysql_query("update galleries set GalleryCategory = '$this->galleryCategory', GalleryName = '$this->galleryName', ".
			"GalleryOrder = '$this->galleryOrder' where GalleryID = '$this->galleryID'")
			or die (mysql_error());
	}	
}

class Galleries{

	public $galleryarr = array();
	public $categoryarr = array();
	
	public function GetGalleryList(){
		$result = Query("select g.* from galleries as g 
			inner join gallerycategories as gc 
			on gc.GalleryCategory = g.GalleryCategory 
			order by gc.CategoryOrder, g.GalleryOrder");
		
		while ($row = mysql_fetch_assoc($result)) {
			$gallery = new Gallery;
			$gallery->LoadGallery(
				$row['GalleryCategory'], 
				$row['GalleryName'],
				$row['GalleryID'], 
				$row['GalleryOrder']);
			$this->galleryarr[$row['GalleryID']] = $gallery;
			$gallery = null;
		}

		FreeResult($result);
	}

}
?>