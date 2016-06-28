<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "orbital";
		
	$location = null;
	$error = false;
try {
    $database = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
   		if ($e -> getcode() == 23000) {
   		echo "The username has already exist.";	
   		}
   		else {
   			print($e->getMessage());
   		}
    
    }
    if(isset($_POST['submit'])){
    	$errMessage='';
    	$username=trim($_POST['username']);
    	$password=trim($_POST['password']);
    	if($username==''){
    		$errMessage.='Name is not filled! ';
    	}
    	if($password==''){
    		$errMessage.='Password is not filled! ';
    	}
    	if($errMessage==''){
    		$records= $database->prepare('SELECT id, username, password, email FROM userid WHERE username=:username');
    		$records->bindParam(':username', $username);
    		$records->execute();
    		$results=$records->fetch(PDO::FETCH_ASSOC);
    		if(count($results)>0 && password_verify($password, $results['password'])){
    			$_SESSION['username']=$results['username'];
    			echo "<script> alert('Login successful!'); window.location.href='dashboard.php';</script>";
    			echo $_SESSION['username'];
    		} else {
    			$errMessage.="Username and Password are not found!<br>";
    		}
    		}
    	}
    	

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
	<title> COEO</title>
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
				<p id="modalCoeo">CLEEQUE</p>				
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
			<p >Home</p>
			<p>About</p>
			<p>Contact Us</p>
			<p id="login">Sign In</p>
		</div>
		

	</div>
	<div class="main">
		<div class="slider">
			<div class="sliderController">
				<p id="slideBack" style="font-size: 100px; color: white; float: left; 	left: 2%;cursor:pointer"><</p>
				<p id="slideNext" style="font-size: 100px; color: white; float: right; right: 2%;cursor:pointer">></p>
			</div>
			<div class="navdot">
				<ul>
					<li id="dot1" class="active"></li>
					<li id="dot2"></li>
				</ul>
			</div>
			<div class="slide" id="first">	
				<p><span style="font-size: 150px" >CLEEQUE</span></p>
				<p id="tagline" style="text-align: center; margin-top:-30px; font-size:30px;">Arranging a meeting has never been this easy</p>
			</div>
			<div class="slide" style="background-color:grey;">
				<p style="font-color: white">Connecting The Dots</p>
			</div> 
			<div class="slide" id="first">	
				<p><span style="font-size: 150px" >CLEEQUE</span></p>
				<p span id="tagline" style="text-align: center; margin-top:-30px; font-size:30px;">Arranging a meeting has never been this easy</p>
			</div>

		</div>
	</div>
	<div class="footer">
		<p style="text-align: left;"> &copy Cleeque 2016</p>
	</div>

</body>
</html>