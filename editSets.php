<?php
	$setsSrc = "sets/";
	$sets = scandir($setsSrc);
	$sets = array_slice($sets,2);
	echo '<table class="edit">
		<tr class="edit">';
	foreach($sets as $set) {
			$setName = basename($set,".txt");
			echo '<td>
				<h3 onblur="normal(event)" draggable="true"  ondragstart="drag(event)" ondblclick="edit(event)" id="',$set,'">'
				,$setName,'
				</h3>
				<ul>';

			$songs = file($setsSrc.$set);
			
			foreach($songs as $song) {
				echo '<li class="',$setName,'" id="',$song,'" style="list-style-type:none;"
					draggable="true" onblur="normal(event)" ondblclick="edit(event)" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)">'
					,$song,'
					</li>';							
			}
				echo '</ul>
				</td>';
	}	
	echo '</tr>';					
?>