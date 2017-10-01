<?php		
  $dates = scandir("dates/");
  echo "<br/><ul>";
  foreach ($dates as $date) {
    if(strlen($date)>3){
      echo "<li>";
      require("dates/".$date);	
      echo "</li><br/>";
    }
  }
  echo "</ul>";

?>