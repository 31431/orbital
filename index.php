<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select files to upload:

    <input type="file" multiple = '' name="fileToUpload[]" id="fileToUpload"><br />
    <input type="submit" value="Upload File" name="submit">
</form>
<?php 
  ?>


</body>
</html>