<!DOCTYPE html> 



<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Universal.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>

<body> 
<?php 
	$fileName = $_POST["newSet"];
	$ext = ".txt";
	$fileName = $fileName . $ext;
	$loc = "sets/";
	$loc = $loc . $fileName;
	$newSet = fopen($loc,"w");
	fwrite($newSet,"ANCHOR");
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
</body>
</html>