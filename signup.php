<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action= "signupsuccessful.php" method="post">
Sign Up: <br>
Name: <input type="text" name="name" value= "<?php if (isset($_GET['name'])){ echo $_GET['name'];} ?>" >
<?php 
	if (isset($_GET['named'])) {echo "Please input your name";}
	else if (isset($_GET['exist'])) {echo "This username has already existed.";}?><br>
Password: <input type="password" name="password"><?php if (isset($_GET['pass'])) {echo "Please input your password";}?><br>
E-mail: <input type="text" name="email" value= "<?php if (isset($_GET['email'])){ echo $_GET['email'];} ?>" ><?php if (isset($_GET['emailed'])) {echo "Please input your email";}?><br>
<input type="submit">
</form>



</body>
</html>