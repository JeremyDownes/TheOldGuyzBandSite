<?php

if (isset($_GET['name'])) {
        $title="sets/";
	$title = $title.$_GET['name'];
        $string = $_GET['value'];
	$title=$title.".txt";
	$targetFile = fopen($title,"w");
	$songs = explode("*",$string);
	foreach($songs as $song) {
      		$song = $song."\n";
		fwrite($targetFile,$song);
	}
	fclose($targetFile);
	clearstatcache();
}
?>