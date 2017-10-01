
<?php 
	$fileName = $_REQUEST['q'];
	$set = "sets/".$fileName;
	unlink($set);
?>
