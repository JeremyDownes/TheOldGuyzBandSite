<!DOCTYPE html> 

<html>

<head></head>
<body>
<?php
$User =  $_POST["userName"];
$Password = $_POST["password"];
if ($User === "Joseph Downes" && $Password === "Janet Leeman") {
	header("Location: pageEditor.php");
	}
else {
	header("Location: index.php");
	}
?>
</body>
</html>