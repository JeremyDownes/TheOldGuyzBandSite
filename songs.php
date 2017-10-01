
		<?php
		$musicSrc = "music/";
		$music = scandir($musicSrc);
		$music = array_slice($music,2);
		foreach($music as $song) {
			echo '<span style="color:yellow;">',basename($song,"mp3"),'<span>
				<br/>
				<audio controls src="',$musicSrc.$song,'" type="audio/mpeg" preload="auto">
				</audio>
				<br/>';
			}
		?>
