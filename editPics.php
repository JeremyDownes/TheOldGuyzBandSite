
		<?php		
			$picsSrc = "images/";
			$pics = scandir($picsSrc);
			foreach ($pics as $pic) {
					if(strlen($pic)>3){
					 echo '<img src="images/',$pic, '" alt="', $pic, '" />
				<form enctype="multipart/form-data" action="update.php" method="POST" style="display:inline;">		
				<input type="hidden" name="home" value="images/',$pic,'">
				<input type="submit" value="DELETE" />
				</form>	';
       					}
			}
			echo '<form enctype="multipart/form-data" action="uploader.php" method="POST" style="color:white">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
					Choose a picture to upload: <input name="uploadedfile" type="file" />
					<input type="submit" value="Upload Picture" />
				</form>';
		?>

