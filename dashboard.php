<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	echo $_SESSION['username']."<br>";
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select files to upload:
    <input type="file" multiple = '' name="fileToUpload[]" id="fileToUpload"><br />
    <input type="submit" value="Upload File" name="submit">
</form>
</body>
</html>