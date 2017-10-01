<?php
  $dates = scandir("dates/");
  $date =  $_POST["date"];
	$location = $_POST["location"];
	$description = $_POST["description"];
	$targetFile = fopen("dates/date".count($dates),"w");
	fwrite($targetFile,"<h3>".$date." @ ".$location."</h3>");
	fwrite($targetFile,$description."<br/>");
	fclose($targetFile);
	clearstatcache();
	header("Location: pageEditor.php");
?>