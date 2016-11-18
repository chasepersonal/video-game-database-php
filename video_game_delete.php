<html>
	<?php
	/*

	Moderatley Complex PHP Program - Video Game List Program
	11/1/2015
	
	Program Page - video_game_delete.php
	
	Program will also include - video_game_input.php, video_game_output.php, 
	vgdb.php, video_game_view.php, video_game_list.php
	
	Chase Weyer
	
	This program page will allow the user to delete information that has been
	saved into the session array. The session will be unset, then destroyed
	to ensure deletion of information. The user will also be given links to
	fo back to previous plays.
	*/
	
	/* session will be started to bring information over from other pages,
	   then unset and destroyed to fully delete session information */
	
	session_start();
	session_unset();
	session_destroy();
	?>
	<head>
		<title>Video Game Database - Delete Entires</title>
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
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="vgdb.php">HOME</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_input.php">ENTER GAMES</a></p>
		</div>
		<div id="content">
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			Your saved Games have been deleted from this program session!
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
			<p>You can go back and <strong>ENTER GAMES!</strong></p>
			<p>...or you can go back to the <strong>HOME</strong> page</p>
			<p>...or <strong>you can close your browser window</strong> if you are done using the program!</p>
		</div>
	</body>
</html>