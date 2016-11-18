<html>
	<?php
	/*
	
	Moderatley Complex PHP Program - Video Game List Program
	11/1/2015
	
	Program Page - video_game_output.php
	
	Program will also include - video_game_list.php, video_game_output.php, 
	video_game_delete.php, video_game_view.php, vgdb.php
	
	Chase Weyer
	
	This program page will save session array data to a file. If a file already
	exists, the user will be given a chance to append or overwrite their saved
	file with the session array data.
	*/
	
	/* start of session */
	
	session_start();
	
	/* if session array variables are set, they will be reiterated for
	   access on this page */
	   
	if (isset($_SESSION["Games"])):	
		$x = count($_SESSION["Games"]);
		@$ConsoleName = $_SESSION["Games"][$x]["ConsoleName"];
		@$GameTitle = $_SESSION["Games"][$x]["GameTitle"];
		@$GameType = $_SESSION["Games"][$x]["GameType"];
	endif;
	
	?>
	<head>
		<title>Video Game Database - Save to PC</title>
		<link href="vgdb.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="banner">
			<p>
			<img src="images/cartridge.png" width="30" height="30" alt=""/>
			Video Game Database
			<img src="images/cartridge.png" width="30" height="30" alt=""/></p>
			</div>
		<div id="navigation">
			<p><strong>LINKS YOU HAVE UNLOCKED FOR THIS PAGE:</strong></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="vgdb.php">HOME</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_input.php">ENTER GAMES</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_exit.php">DELETE</a></p>
		</div>
		<div id="content">
	<?php
	
	/* empty variable for storage of session array data */
	
	$AllGames = "";
	
	/* Loop will parse session array information and add it to $AllGames variable */
	
	foreach((array)$_SESSION["Games"] as $GamePost):
	
		$AllGames .= $GamePost["ConsoleName"] . " | " . $GamePost["GameTitle"] . " | " . $GamePost["GameType"] . "\n";
	endforeach;
	
	/* variable for storing file */
	
	$file = "C:\games.txt";
	
	/* variable for storing a greeting message for file writing */
	
	$greeting = "Video Game Database\n\n";
	
	/* if file exists, user will be given a choice to append or overwrite
	   their saved file */
	   
	if(file_exists($file)):?>
		<p><img src="images/sack.png" width="30" height="30" alt=""/>
		We noticed you have saved some games with us before!
		<img src="images/sack.png" width="30" height="30" alt=""/></p>
		<p>Would you like to:</p>
		<p><strong>Add to your exiting file</strong></p>
		<p><i>OR</i></p>
		<p><strong>Create a new file</strong></p>
		<form method ="post" action="">
		<input type="radio" name="radio" value="Append">Append
		<input type="radio" name="radio" value="CreateNew">Create New
		<br><input type="submit" name="submit" value="Choose Wisely!" />
	<?php
		/* if values have been submitted, accumulated data will either 
		   be appended to the saved file or it will be overwritten */
		   
		if(isset($_POST["submit"])):
			/* variable for storing choosen radio value */
			
			@$radio = $_POST["radio"];
			if($radio == "Append"):
			
				$filename = fopen('C:\games.txt', 'a') or die('Unable to Open File!');
				$vgdb = $AllGames;
				fwrite($filename, $vgdb);
				fclose($filename);
				
			elseif($radio == "CreateNew"):
			
				$filename = fopen('C:\games.txt', 'w') or die('Unable to Open File!');
				$vgdb = $greeting . $AllGames;
				fwrite($filename, $vgdb);
				fclose($filename);
				
			endif;
			?>
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			Your games have been saved to <strong><i><?php echo $file?></strong></i>
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
			<p>Go and take a look for yourself! (We promise it's there!)</p>
	   <?php endif;
	endif;
	
	/* if file does not exist, a new file will be created for the user */
	
	if(!file_exists($file)):
		$filename = fopen('C:\games.txt', 'w') or die('Unable to Open File!');
		$vgdb = $greeting . $AllGames;
		fwrite($file, $vgdb);
		fclose($filename);
		?>
		<p><img src="images/sack.png" width="30" height="30" alt=""/>
		Your games have been saved to <strong><i><?php echo $file?></strong></i>
		<img src="images/sack.png" width="30" height="30" alt=""/></p>
		<p>Go and take a look for yourself! (We promise it's there!)</p>
   <?php endif; ?>
		<p>If you want to input more games, you can click <strong>INPUT GAMES</strong></p>
		<p>...or you can <strong>DELETE</strong> your current entries to start over!</p>
		<p>...or you can <strong>EXIT YOUR BROWSER WINDOW</strong> if you would like to leave us!</p>
		<p>(If you do leave, please come back. We get lonely without you being here!)</p>
	  </div> 
	</body>
</html>
