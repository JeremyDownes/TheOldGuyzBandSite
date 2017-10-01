<!DOCTYPE html> 
<!-- To Do:  better image handling, calendar, learn sessions -->


<html>

<head>
	<title>The Old Guyz Band Site</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Universal.css" />
	<link rel="stylesheet" type="text/css" href="calendar.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
	
		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);				
					}
		
		function allowDrop(ev) {
    	ev.preventDefault();
					}

		function drop(ev) {
			ev.preventDefault();

				var data = ev.dataTransfer.getData("text");
				var target = document.getElementById(ev.target.id);
				var targetClass = target.className;
				if(data.indexOf(".txt")==-1) {		// Checks not a set title IS a list item
					if(ev.target.id == "trash") {
						document.getElementById(data).parentNode.removeChild(document.getElementById(data));
					} else {
						var op = document.getElementById(data); 
						op.className = targetClass;		
						target.parentNode.insertBefore(op,target);
					}
				} else {				// returns with ".txt" in the value IS set title
					var delSet = new XMLHttpRequest();
				  delSet.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						location.reload();
					}
				};
				delSet.open("POST", "delSet.php?q="+data, true);
				delSet.send();
			}
		}

		function edit(ev) {
			document.getElementById(ev.target.id).setAttribute("contenteditable", "true");
		}

		function normal(ev) {
			document.getElementById(ev.target.id).setAttribute("contenteditable", "false");
		}

		function newSong(ev) {
			if (ev.key=="Enter") {
				var song = document.createElement("li");
				var title = document.createTextNode(document.getElementById("newSong").value);
				song.appendChild(title); 
				song.setAttribute("class", "list");
				song.setAttribute("draggable", "true");
				song.setAttribute("style", "color:white");
				song.setAttribute("id", document.getElementById("newSong").value);
				song.setAttribute("onblur", "normal(event)");
				song.setAttribute("ondblclick", "edit(event)");
				song.setAttribute("ondrop", "drop(event)");
				song.setAttribute("ondragover", "allowDrop(event)");
				song.setAttribute("ondragstart", "drag(event)");
				document.body.appendChild(song);
				}
			}
			//   Begin jQuery
			$(document).ready(function() {
			  $("#Pics").click(function(){
					$(".toggle").hide();
	 				$("#pics").show();
    		});

		    $("#Set").click(function(){
					$(".toggle").hide();
	 				$("#set").show();
    		});

		    $("#Date").click(function(){
					$(".toggle").hide();
	 				$("#date").show();
    		});

		    $("#About").click(function(){
        	$(".toggle").hide();
					$("#about").show();
    		});

		    $("#Home").click(function(){
		      $(".toggle").hide();
	 				$("#home").show();
    		}); 

    		$("#saveSet").click(function() {
					var setTitles=[];
					var titleGet="";
					var title="";
					var song="";

					$("H3").each(function() {
						titleGet = $(this).text();
						for(var i=0; i<titleGet.length; i++) {
							var xChar = titleGet.charCodeAt(i);
							if (xChar != 9 && xChar !=10) {
								title += titleGet.charAt(i);
							}
						}
					setTitles.push(title);
					title="";	
				});
				setTitles.shift();
 
				for (setTitle in setTitles) {
					var fileName = setTitles[setTitle];
					var x="li."+setTitles[setTitle];

					$(x).each(function() {
						var songGet = $(this).text();
						for(var j=0; j<songGet.length; j++) {
							var yChar = songGet.charCodeAt(j);
							if (yChar != 10 && yChar != 9) {
								song += songGet.charAt(j);
							}					
						}
						song += "*";
					});
  				var toUrl = "createSets.php?name="+fileName+"&value="+song;
					$.get(toUrl,function(data,status){alert(data+": Saved.");});
					song = "";
				}
				location.reload();
  	  });
		});

  </script>
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
			<?php
				$text = file("about.txt");
				$text = $text[0];
				echo '<form enctype="multipart/form-data" action="update.php" method="POST">
					<textarea rows="20" cols="150" name="about"/>',$text,'</textarea><br />
					<input type="submit" value="Save" />
					</form>';
			?>
		</div>

		<div class="toggle" id="set">

			<div class="editor">

				<form action = "newSet.php" method="POST">
					<input type="hidden submit" id="newSet" name="newSet" value="Add New Set">
				</form>

				<input type="text" id="newSong" value="Add New Song" onkeydown="newSong(event)"> 		<!--references dragAround.js to handle all events-->

				<?php
					require("editSets.php");				
				?>
				</br>
				<button id="saveSet">SAVE</button>
				</table>
				<img src="trash.png" id="trash" style="width:50px;height:50px;"  ondrop="drop(event)" ondragover="allowDrop(event)">
			</div>
		</div>

		<div class="toggle" id="home">
			<?php
				require('editSongs.php');
			?>
		</div>

		<div class="toggle" id="pics">
			<?php 
				require('editPics.php');
			?>
		</div>	

		<div class="toggle" id="date">
			<?php 
				require('editCalendar.php');
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
    });
  </script>
</body>
</html>