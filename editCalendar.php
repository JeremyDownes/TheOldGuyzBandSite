<?php		
  echo '<form enctype="multipart/form-data" action="calendarPost.php" method="POST">		
		Date: <input name="date" type="text" /><br />
		Location: <input name="location" type="text" /><br />
		Description: <input name="description" type="text" /><br />
		<input type="submit" value="Add Date" />
	</form>';
  $dates = scandir("dates/");
  echo "<ul style = 'color: yellow; border:0px;'>";
  foreach ($dates as $date) {
    if(strlen($date)>3){
      echo "<li>";
      require("dates/".$date);
      echo '<form enctype="multipart/form-data" action="update.php" method="POST" style="display:inline;">		
				<input type="hidden" name="home" value="dates/',$date,'">
				<input type="submit" value="DELETE" />
				</form>';	
      echo "</li><br/>";
    }
  }
  echo "</ul>";

?>