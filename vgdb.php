<html>
	<?php
	/*

	Moderatley Complex PHP Program - Video Game List Program
	11/1/2015
	
	Program Page - vgdb.php
	
	Program will also include - video_game_input.php, video_game_output.php, 
	video_game_delete.php, video_game_view.php, video_game_list.php
	
	Chase Weyer
	
	This program will take standard inputs to create a list of video games and
	print them to an output file. This program will iterate over multiple pages, 
	via links and sessions, to avoid being too cumbersome to the user.
	Inputs will include Console Name, Game Title, and
	Game Type. If the user leaves a field blank, or if an incorrect 
	Console Name is entered, the user will be prompted to re-enter their 
	information. If there is already a saved file, the user will be given 
	a link to a page where they can view the file. They can then go back and 
	re-enter game inforamtion. When the user chooses the link to save their 
	file to the PC, they will be asked if they would like to append the file 
	or overwrite the file. If the file currently exists, a new file will be 
	created for the user. If there are any errors in opening the saved file, 
	the program will terminate. The user can terminate the program at any time
	by closing the broswer window
	*/
	?>
	<head>
		<title> Video Game Database - Get Started! </title>
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
			<a href="video_game_input.php">ENTER GAMES</a></p>
	<?php
	
	/* variable for saved file */
	
	$filename = "C:\games.txt";
	
	/* depending if a saved file exists, different messages 
	   will be printed to the user */
	
	if (file_exists($filename)): ?>
			<p><img src="images/sword2.png" width="50" height="15" alt=""/>
			<a href="video_game_view.php">VIEW SAVED GAMES</a></p>
		</div>
		<div id="content">
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			<strong>HEY! IT LOOKS LIKE YOU'VE USED THIS PROGRAM BEFORE!</strong>
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
			<p><img src="images/sack.png" width="30" height="30" alt=""/>
			<strong>WELCOME BACK!</strong>
			<img src="images/sack.png" width="30" height="30" alt=""/></p>
			<p>(We recognize the file <strong><?php echo $filename; ?></strong> on your computer. Sorry for prying!)</p>
			<p>You can click <strong>VIEW SAVED GAMES</strong> to view your saved games!</p>
			<p>...or you can go ahead and click <strong>ENTER GAMES!</strong></p>
			<p>We can just add the new ones you put in to your old ones!</p>
<?php else: ?>
		</div>
		<div id="content">
			<p><strong><i>WELCOME!</strong></i></p>
			<p>Having problems keeping track of video games?</p>
			<p><strong>WE CAN HELP YOU WITH THAT!</strong></p>
			<p><strong>WE WILL COMPILE A VIDEO GAME LIST FOR YOU TO MAKE YOUR LIFE EASEIR!</strong></p>
		</div>
		
<?php endif;?>
	</body>
</html>	
