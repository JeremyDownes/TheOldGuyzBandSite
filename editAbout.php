		<?php
			$text = file("about.txt");
			$text = $text[0];
			echo '<form enctype="multipart/form-data" action="update.php" method="POST">
		
		<textarea rows="20" cols="150" name="about"/>',$text,'</textarea><br />

		<input type="submit" value="Save" />
	</form>';
		?>