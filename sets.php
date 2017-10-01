
		<table class="sets">

			<?php
				$setsSrc = "sets/";
				$sets = scandir($setsSrc);
				$sets = array_slice($sets,2);
				echo '<tr class="sets">';

				foreach($sets as $set) {
						echo '<td>';
						echo '<h3>',basename($set,".txt"),'</h3>';
						$songs = file($setsSrc.$set);
						echo '<ul>';
						foreach($songs as $song) {
							echo '<li class="list">',$song,'</li>';

						}
						echo '</ul>';
						echo '</td>';

				}
				echo "</tr>";
			?>

		</table>
