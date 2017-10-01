<!DOCTYPE html> 


<html>

<head>
	<title>The Old Guyz Band Site</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Universal.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>
<body>
		<table class="sets">

			<?php
		
			$picsSrc = "images/";
			$pics = scandir($picsSrc);
			foreach ($pics as $pic) {
					if(strlen($pic)>3){
					 echo '<img src="images/',$pic, '" alt="', $pic, '" /><br/>';
       					}
				}
					
			?>

		</table>
</body>
</html>