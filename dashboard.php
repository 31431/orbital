<?php
session_start();
include("databaseconnection.php");
$user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	echo "<h1>Welcome, ".$_SESSION['username']."!</h1>";
	$sql="SELECT filename FROM userid WHERE id='$user'";
	$stmt=$database->prepare($sql);
	$stmt->execute();
	$filename=$stmt->fetchColumn();
	if($filename=NULL){
		echo "<h2>Please upload your .ics file</h2>";
	} else {
		header("location: group.php");
	}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select files to upload:
    <input type="file" multiple = '' name="fileToUpload[]" id="fileToUpload"><br />
    <input type="submit" value="Upload File" name="submit">
</form>
</body>
</html>