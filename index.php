<!DOCTYPE html> 
<!-- To Do:  Get Rid Of Marquee !, better image handling, calendar, learn sessions -->


<html>

<head>
	<title>The Old Guyz Band Site</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Universal.css" />
	<link rel="stylesheet" type="text/css" href="calendar.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="toggleContent.js"></script>
</head>

<body ng-app="OldGuyzApp" ng-controller="myCtrl"> 

    <div id="header">
	<h1 class="header">The Old Guyz</h1>
	<h3>Variety of Entertainment</h3>
    </div>

    <div>
	<?php
		require("navigation.php");
	?>
    </div>

    <div class="content">

	<div class="toggle" id="about">
		<p>
			<?php
				require("about.txt");
			?>
		  <br/>
	          <a href ="" id="ChangeSet">Thanks for visiting!</a>
		</p>
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com/theoldguyz&amp;layout=button_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp" style="overflow:hidden;width:100%;height:80px;" scrolling="no" frameborder="0" allowTransparency="true"><a id="plugin-fb" href="http://www.addlikebutton.net"" class="facebook-get-code">addlikebutton.net</a></iframe> 
	</div>

	<div class="toggle" id="set">
		<p style="color:white;">	
			<?php
				require("setsText.txt");
			?>
		</p>

		</br>
<div>
		<marquee behavior="scroll" direction="up" >
			<?php
				require('sets.php');
			?>

	    </marquee>
</div>
	</div>

	<div class="toggle" id="home">
		<?php
			require('songs.php');
		?>
	</div>

	<div class="toggle" id="pics">
	<marquee behavior="scroll" direction="up" >

		<?php 
			require('pics.php');
		?>
	</marquee>	

	</div>	

	<div class="toggle" id="date">
		<?php 
		  require('calendar.php');
		?>
	</div>

<div class="toggle" id="Login" style="display:none">

	<form enctype="multipart/form-data" action="login.php" method="POST">
		
		User name: <input name="userName" type="text" /><br />
		password: <input name="password" type="text" /><br />
		<input type="submit" value="Log In" />
	</form>

</div>
</div>
<div class="footer">
<p class="footer">
Contact us at : <a href ="mailto:TheOldGuyz@Gmail.com?subject=Web%20Site%20Inquiry%20">TheOldGuyz@Gmail.com</a>
<br/>
All content on this site is the intellectual property of
<br/>
The Old Guyz &#169; copyright 2017 All rights reserved.
</p>
</div>






<script>
var app = angular.module('OldGuyzApp', []);
app.controller('myCtrl', function($scope) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
});
</script>
</body>



</html>