<html>
	<?php
	/*
	
	Moderatley Complex PHP Program - Video Game List Program
	11/1/2015
	
	Program Page - video_game_view.php
	
	Program will also include - video_game_output.php, video_game_output.php, 
	video_game_delete.php, video_game_list.php, vgdb.php
	
	Chase Weyer
	
	This program page will allow the user to view saved data information.
	
	*/
	?>
	<head>
		<title> Video Game Database - Current Game List </title>
		<link href="vgdb.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="banner">
			<p><img src="images/cartridge.png" width="30" height="30" alt=""/>
			Video Game Database
			<img src="images/cartridge.png" width="30" height="30" alt=""/></p>
		</div>
		<div id="navigation">
			<p><strong>LINKS YOU HAVE UNLOCKED FOR THIS PAGE:</strong></p>
			</p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="vgdb.php">HOME</a></p>
			</p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_input.php">ENTER GAMES</a></p>
		</div>
		<div id="content">
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			<strong>Here are your previously entered games:</strong>
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
	<?php
	
	/* file variable */
	
	$filename = "C:\games.txt";
	
	/* file will be opened if it exists. then, the file will be read back to
	   the user from beginning to end */
	
	$filename = fopen("C:\games.txt", "r") or die("Unable to Open File!");
	while(!feof($filename)):
	
		echo fgets($filename) . "<br>";
		
	endwhile;
	fclose($filename); ?>
			<p>Click <strong>ENTER GAMES</strong> when you are ready to enter some games!</p>
		</div>
	</body>
</html>
