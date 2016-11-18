<html>
	<?php
	/*
	
	Moderatley Complex PHP Program - Video Game List Program
	11/1/2015
	
	Program Page - video_game_input.php
	
	Program will also include - vgdb.php, video_game_output.php, 
	video_game_delete.php, video_game_view.php, video_game_list.php
	
	Chase Weyer
	
	This program page will prompt the user for game information through an HTML form.
	Error messages will be issued if a field is left blank and if the Console
	Name entered does not match one in the array $AllConsoles. A session array
	will be used to store data so that it may be transported over multiple pages.
	A counter will also be displayed to show how many entries the user entered.
	*/
	
	/* start of session */
	
	session_start();
	
	/* if session storing game data is not set, an array to store data
	   will be created */
	   
	if(!isset($_SESSION["Games"])):
		$_SESSION["Games"] = array();
	endif;
	
	/* if counter, stored within the session, is not set, it will be set to
	   zero */
	   
	if(!isset($_SESSION['counter'])):
		$_SESSION['counter'] = 0;
	endif;
	
	/* if 'button' is pressed, counter will initiate and increment */
	
	if(isset($_POST['button'])):
		++$_SESSION['counter'];
	endif;
	
	/* Function CheckGames */
	
	function CheckGames($fields, $AllConsoles, $ConsoleName)
	{
		/* ErrorMessage will be set to null to allow messages to be 
		   appended to the variable */
		   
		$ErrorMessage = "";
		
		/* Loop will be performed to check on empty values for 
		   form information */
		   
		foreach($fields as $f):
			if(empty($_POST[$f])):
				/* counter will reset to zero on empty
				   value and $ErrorMessage value will
				   be appended depending on which
				   value was empty */
				   
				$_SESSION['counter'] = 0;
				$ErrorMessage .= "$f field is empty!<br>";
			endif;
		endforeach;
		
		/* Input value for $ConsoleName will be checked against $AllConsoles
		   array. If $ConsoleName is not in the $AllConsoles array, an 
		   error message will be added to the $ErrorMessage variable */
		   
		if(!in_array($ConsoleName, $AllConsoles) && !empty($_POST["ConsoleName"])):
			/* counter will reset to zero if $ConsoleName is not
			   in the $AllConsoles array */
			   
			$_SESSION['counter'] = 0;
			$ErrorMessage .= "$ConsoleName is an invalid Console Name<br>";
		endif;
		return $ErrorMessage;
	}
	?>
	<head>
		<title> Video Game Database - Home </title>
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
			<a href="video_game_list.php">VIEW ENTERED GAMES</a></p>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_delete.php">DELETE</a></p>
		</div>
		<div id="content">
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			Please Enter the following Video Game Data:
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
	<?php
	
	/* variables will be set to empty to allow for values to be added */
	
	$EmptyFields = "";
	$ValidConsoles = "";
	
	/* If information is posted back to the page, the rest of the program
	   will run */
	if($_SERVER["REQUEST_METHOD"] == "POST"):
	
		/* variables for posted information */
		
		$ConsoleName = htmlspecialchars($_POST["ConsoleName"]);
		$GameTitle = htmlspecialchars($_POST["GameTitle"]);
		$GameType = htmlspecialchars($_POST["GameType"]);
		
		/* arrays to contain information for error check */
		
		$fields = array("ConsoleName", "GameTitle", "GameType");
		$AllConsoles = array("Atari", "Atari 7800", "Atari 5200", "NES", "SNES",
				     "Nintendo Entertainment System",
				     "Super Nintendo",
				     "Super Nintendo Entertainment System",
				     "Sega Genasis", "Genasis", "Sega Saturn",
				     "Saturn", "Sony Playstation", "Playstation",
				     "Nintendo 64", "N64", "Sega Dreamcast", 
				     "Dreamcast", "Sony Playstation 2", "Playstation 2", 
				     "Microsoft Xbox", "Xbox", "Nintendo Game Cube", 
				     "Game Cube", "Microsoft Xbox 360", "Xbox 360",
				     "Sony Playstation 3", "Playstation 3",
				     "Nintendo Wii", "Wii", "Sony Playstation 4", 
				     "Playstation 4", "Microsoft Xbox One", "Xbox One",
				     "Nintendo Wii U", "Wii U", "Sega Game Gear", 
				     "Game Gear", "Nintendo Game Boy", "Game Boy",
				     "Nintendo Game Boy Advance", "Game Boy Advance",
				     "Nintendo DS", "DS", "Nintendo 3DS", "3DS",
				     "Playstation Portable", "PSP", "Playstation Vita", 
				     "PS Vita", "PC", "Personal Computer", "Computer",
				     "Magnavox Odyssey", "Odyssey", "Commodore 64");
		
		/* Variable will hold information brought back by CheckGames
		   function */
		   
		$EmptyFields = CheckGames($fields, $AllConsoles, $ConsoleName);
		
		/* if fields are initially empty, session variables will be
		   accumulated, then reset for the addition of more */

		if($EmptyFields == ""):
		
			@$x = count($_SESSION["Games"]);
			@$_SESSION["Games"][$x]["ConsoleName"] = $ConsoleName;
			@$_SESSION["Games"][$x]["GameTitle"] = $GameTitle;
			@$_SESSION["Games"][$x]["GameType"] = $GameType;
			
			$ConsoleName = "";
			$GameTitle = "";
			$GameType = "";
		else:
			/* Error Message will print if $EmptyFields has a value */
			
			echo "<strong>ERROR</strong>:<br>";
			echo "<strong>$EmptyFields</strong><br>";
		endif;
	endif;
	?>
			<form method ="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<br><input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>">
			Console Name:
			<br><input type="text" name="ConsoleName"></br>
			Game Title:
			<br><input type="text" name="GameTitle"></br>
			Game Type:
			<br><input type="text" name="GameType"></br>
			<br><input type="submit" name="button" value="Submit">
			</form>
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			You have made the follwing entries: <?php echo $_SESSION['counter']; ?>
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
			<p>Your entries will be <strong>SAVED</strong> in case you would like to <strong>ADD MORE GAMES LATER!</strong></p>
			<p>Unless you <strong>CLOSE YOUR BROWSER WINDOW!</strong> Then they will be <strong>LOST FOREVER!</strong></p>
			<p>You may click <strong>DELETE</strong>, at any time, to clear your entries!</p>
			<p>...or you can click <strong>VIEW ENTERED GAMES</strong> to see the games you've entered</p>
		<?php /* if information is posted, additional message will print to the user */
	if($_SERVER["REQUEST_METHOD"] == "POST"):?>
			<p>...or you may enter another game to process if you wish!</p>
<?php endif;?>
		</div>
	</body>
</html>	
