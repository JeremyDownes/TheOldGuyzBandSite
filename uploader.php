<!DOCTYPE html5>
<html>
<head>
</head>
<body>
<?php 
$fileName =  $_FILES['uploadedfile']['name'];
if (strpos(strtolower($fileName),'jpg') || strpos(strtolower($fileName),'gif') || strpos(strtolower($fileName),'png')) {
	$target_dir = "images/";
} else if (strpos(strtolower($fileName),'mp3')) {
	$target_dir = "music/";
} else {
	$invalid = true;
}

if (!$invalid) {
	$target_path = $target_dir . basename($fileName); 
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		header("Location: pageEditor.php");
	} else{
    		echo "There was a problem uploading the file, try renaming the file";
	}
}

?>
</body>

</html>