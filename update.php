<!DOCTYPE html> 

<html>

<head></head>
<body>
<?php
if (isset($_POST["about"]))$About =  $_POST["about"];
if (isset($_POST["sets"]))$Sets =  $_POST["sets"];
if (isset($_POST["pics"]))$Pics =  $_POST["pics"];
if (isset($_POST["dates"]))$Dates =  $_POST["dates"];
if (isset($_POST["home"]))$Home = $_POST["home"];

	if ($About) {
		file_put_contents("about.txt",$About);
		header("Location: pageEditor.php");
	}
	if ($Home) {
		unlink($Home);
		header("Location: pageEditor.php");
	}
?>
</body>
</html>