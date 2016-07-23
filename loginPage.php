<?php
	session_start();
	$username=$_SESSION['username'];
	include("groupFunction.php");
	include("main_ics_processer.php");
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
	<title> CLEEQUE</title>
	<link type="text/css" rel="stylesheet" href="style.css"></link>
	<!---Fonts-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="modal">
		<div class="modal-content">
			<div class="modalHeader">
				<span class="close"> X </span>
				<p id="modalCleeque">CLEEQUE</p>				
			</div>
			<div class="modalBody">
				<form  method="post">
					<input type="text" id="username" placeholder="Username"><br><br>
					<input type="password" id="password" placeholder="Password"><br>
					<p id="errorMessage" style="color:red"></p>
					<input type="submit" name="submit" value="Sign In" id="loginButton">
				</form>
				
				<br id="account"> Don't have an account? <a href="signup.php" id="modalSignup">Sign up!</a>
			</div>
		</div>
	</div>
	<div class="navbar">
		<img id="logo" src="http://i.imgur.com/NXXGa4e.png" height="45" width="45" style="float: left;"><p id= "cleeque" style="margin-top:0px;" >  CLEEQUE</p> 
		<div class="menu" style="float:right;">
			<div class="mainMenu">
				<p >Home</p>
				<p>About</p>
				<p>Contact Us</p>
			</div>
			<p id="usernameNav"><?php echo $_SESSION['username'] ?></p>
			<p id="responsiveNavButton"> &#9776; Menu</p>
		</div>
		

	</div>
	<div class="main">
		<div class="mainHeader">
			<h1 id="welcomeHeader"><?php echo $_SESSION['username'];?></h1>
			<h6 id="welcomeHeaderFullName"><?php echo $_SESSION['fullName'];?></h3>
		</div>
		<div class="uploadFile">
			<p id="uploadFileHeader">Upload your timetable in iCalendar file or '.ics' below!</p>
			<form id="uploadForm" method="post" action="upload2.php" enctype="multipart/form-data">
					<input type="file" class="uploadBox" id="uploadBox" name="fileToUpload" style="display:none" />
					<label for='uploadBox' id="chooseFileButton"><strong>Choose a file to upload</strong></label>
					<button id="uploadButton" type="submit" style="display:none">Upload</button>
				</div>
			</form>
		<div class="uploadButton">
		</div>
		<div class="timetable">
			<p>Your Timetable</p>
			<?php 
				$serializedArray=gettingFilenameWithUsername($_SESSION['username']);
				echo "<p> $serializedArray </p>";
				$array=unserialize($serializedArray);
				print_r($array);

				printTableArray($array);
			?>
		</div>
	</div>
	<div class="footer">
		<p style="text-align: left;"> &copy Cleeque 2016</p>
	</div>

</body>
</html>