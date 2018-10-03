<html>
<head>
  <link rel="stylesheet" type="text/css" href="standard.css" />
  <title>Maine St. Andrews Pipes and Drums - Gallery List</title>
</head>

<body>
	<?php 
		include ("gallery.php");
		include ("../includes/dbaccess.php");

		$galleries = new Galleries;
		$galleries->GetGalleryList();
		foreach($galleries->galleryarr as $galleryID => $gallery1) {
			print "Category Name: $gallery1->galleryCategory<br>";
			print "Gallery Name: $gallery1->galleryName<br>";
			print "Gallery ID: $gallery1->galleryID<br>";
			print "Gallery Order: $gallery1->galleryOrder<br>";
		}
		$galleries = null;
	?>
</body>
</html>