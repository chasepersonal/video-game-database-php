<html>
	<?php
	/*
	
	Moderatley Complex PHP Program - Video Game List Program
	11/1/2015
	
	Program Page - video_game_list.php
	
	Program will also include - video_game_input.php, video_game_output.php, 
	video_game_delete.php, video_game_view.php, vgdb.php
	
	Chase Weyer
	
	This program page will print out a list of information, accumulated in 
	the session array, to the user. An error message will also print if the
	session variables brought over are empty.
	*/
	
	/* start of session */
	
	session_start();
	
	/* if session array variables are set, they will be reiterated for
	   access on this page */
	   
	if(isset($_SESSION["Games"]))
	{
		$x = count($_SESSION["Games"]);
		@$ConsoleName = $_SESSION["Games"][$x]["ConsoleName"];
		@$GameTitle = $_SESSION["Games"][$x]["GameTitle"];
		@$GameType = $_SESSION["Games"][$x]["GameType"];
	}
	?>
	<head>
		<title>Video Game Database - Game List</title>
		<link href="vgdb.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="banner">
			<p><img src="images/cartridge.png" width="30" height="30" alt=""/>
			Video Game Database
			<img src="images/cartridge.png" width="30" height="30" alt=""/></p>
		</div>
	<?php
	
	/* if the session array variables hold a vaule, appropriate links and 
	   messages will be printed */
	   
	if(!empty($_SESSION["Games"])): ?>
		<div id="page">
		  <div id="navigation">
			<p><strong>LINKS YOU HAVE UNLOCKED FOR THIS PAGE:</strong></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="vglp.php">HOME</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_output.php">SAVE RESULTS TO PC</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_input.php">ENTER GAMES</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_delete.php">DELETE</a></p>
		  </div>
		</div>
		<div id="content">
			<p>If you are done entering games, click <strong>SAVE RESULTS TO PC</strong> so you can access it at your leisure!</p>
			<p>...or you can go back and <strong>ENTER GAMES</strong> if you want to add more!</p>
			<p>...or you can <strong>DELETE</strong> your entries if you made a mistake and would like to start over!</p>
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			The following are the Games you have inputted:
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
	<?php	
		/* List will be printed for each value from the session array data */
		
		foreach((array)$_SESSION["Games"] as $GamePost):?>
			<p><?php echo $GamePost["ConsoleName"];?>&nbsp;|&nbsp;
			<?php echo $GamePost["GameTitle"];?>&nbsp;|&nbsp;
			<?php echo $GamePost["GameType"];?></p>
	<?php endforeach; ?>
		</div>
<?php endif;
	/* if session array values are empty, appropriate messages and links
	   will be printed to the user */
	   
	if(empty($_SESSION["Games"])):?>
		<div id="navigation">
			<p><strong>LINKS YOU HAVE UNLOCKED FOR THIS PAGE:</strong></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="vglp.php">HOME</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_input.php">ENTER GAMES</a></p>
		</div>
		<div id="content">
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			<strong>Huh!?</strong><i>Well, this is awkward</i>
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
			<p><strong>It looks like you didn't input any games, so we have nothing to show you!</strong></p>
			<p>You should go back and <strong>ENTER GAMES</strong> so we can be of use to you!</p>
	
<?php endif; ?>
		</div>
	</body>
</html>
