	    <?php

		$musicSrc = "music/";
		$music = scandir($musicSrc);
		$music = array_slice($music,2);
		foreach($music as $song) {
			$file = $musicSrc.$song;
			echo '<span style="color:white;">',basename($song,"mp3"),'</span>
				<br/>
				<audio controls src="',$file,'" type="audio/mpeg" preload="auto">
				</audio>

				<form enctype="multipart/form-data" action="update.php" method="POST" style="display:inline;">		
				<input type="hidden" name="home" value="',$file,'">
				<input type="submit" value="DELETE" />
				</form>				
				<br/>';
		}


		echo		'<form enctype="multipart/form-data" action="uploader.php" method="POST" style="color:white">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
					Choose a song to upload: <input name="uploadedfile" type="file" />
					<input type="submit" value="Upload Song" />
				</form>';
	    ?>