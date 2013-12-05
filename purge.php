<?php
	header('Content-Type: text/html; charset=utf-8');

	$GLOBALS['files'] = 0;		// Number of pastes
	$GLOBALS['expired'] = 0;	// Number of expired pastes
	$GLOBALS['unlimited'] = 0;	// Number of "unlimited" (no expiration) pastes

	echo "<p>Pastes found in data dir :</p>\n<ul>\n";
	
	parsePastes();
	
	echo "</ul>\n<p>Number of pastes found : <strong>".$GLOBALS['files']."</strong> (unlimited : ".$GLOBALS['unlimited'].", expired : ".$GLOBALS['expired'].")</p>";
		
	// Function that parse recursively all the pastes in the data directory
	function parsePastes($path = './data'){
		// Directories or files to ignore
		$ignore = array('.', '..', 'salt.php', 'trafic_limiter.php', '.htaccess');

		// Open the directory
		$dh = @opendir($path);
		
		while(($file = readdir($dh)) !== false) {
			// Check if this file or directory is not to be ignored
			if(!in_array($file, $ignore)){
				
				// If it's a directory, then parse it
				if(is_dir("$path/$file" )){
					parsePastes("$path/$file");
				} else {
					// Check if the file's name is valid
					if (preg_match('/\A[a-f\d]{16}\z/', $file)) {
						echo "<li>$path/$file : ";

						// Check if the content is JSON
						if (($content = json_decode(file_get_contents($path.'/'.$file))) != null) {	
							// If contains the expire_date property
							if (isset($content->meta->expire_date)) {
								// If the expiration time is left
								if ($content->meta->expire_date < time()) {
									echo "<strong>Paste expired ";
									deletePaste($path.'/'.$file);	// Delete the paste
									echo "</strong>";
									$GLOBALS['expired']++;
								} else {
									echo "Paste not already expired !";
								}
							} else {
								echo "<u>No expiration</u> !";
								$GLOBALS['unlimited']++;
							}
						}
						
						echo "</li>\n";
						$GLOBALS['files']++;
					}
				}
			}
		}
		
		closedir( $dh );
	}

	// Delete a paste and its discussion.
	// Input: $paste : the complete paste path.
	function deletePaste($paste) {
		// Delete the paste itself
		unlink($paste);

		// Delete discussion if it exists.
		$discdir = $paste.'.discussion/';
		
		if (is_dir($discdir)) {
			// Delete all files in discussion directory
			$dhandle = opendir($discdir);
			
			while (false !== ($filename = readdir($dhandle))) {
				if (is_file($discdir.$filename)) {
					unlink($discdir.$filename);
				}
			}
			
			closedir($dhandle);

			// Delete the discussion directory.
			rmdir($discdir);
		}
		
		echo "and deleted !";
	}
?>