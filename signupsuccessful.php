<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><?php 

$name= $_POST['name'];
$userpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);  
$email = $_POST['email'];

echo $userpassword;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orbital";
		
$location = null;
$error = false;

if (isset($_POST['name'])==false || $_POST['name']==NULL)
	{ $location .= '&named=1';
		$error = true;}

if (isset($_POST['password'])==0 || $_POST['password']==NULL){
$location .= '&pass=1';$error = true;}

if (isset($_POST['email'])==0 || $_POST['email']==NULL){
$location .= '&emailed=1';$error = true;}

if ($error == true) {header('Location: signup.php?'.$location);}
else {


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to insert data
    $sql = "INSERT INTO userid(username, password, email)
    VALUES ('$name','$userpassword','$email')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "You have been registered successfully";

    }

catch(PDOException $e)
    {
   		if ($e -> getcode() == 23000) {
   		echo "The username has already exist.";	
   		}
   		else {
   			print($e->getMessage());
   		}
    
    }
}
$conn = null;


  ?>

</body>
</html>