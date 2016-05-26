<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$target_dir = "uploads/";
// Count # of uploaded files in array
$total = count($_FILES['fileToUpload']['name']);

// Loop through each file
for($i=0; $i<$total; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $temp = explode(".", $_FILES["fileToUpload"]["name"][$i]);
    $date = date_create();
    $newfilename = date_timestamp_get($date).$_FILES['fileToUpload']['name'][$i] . '.' . end($temp);
    $newFilePath = "uploads/" . $newfilename;

  }
}
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]["index"]);
$uploadOk = 1;
$FileType = pathinfo($newFilePath,PATHINFO_EXTENSION);
// Check if the file is .ics
if(isset($_POST["submit"])) {
    if($FileType == "ics") {
        $uploadOk = 1;
    } else {
        echo "File is not a calendar file (.ics).";
        $uploadOk = 0;
    }
}
 // Check file size
 // repeat for all files
for($i=0; $i<$total; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];
  if ($tmpFilePath != ""){
    //Setup our new file path
        $temp = explode(".", $_FILES["fileToUpload"]["name"][$i]);
    $date = date_create();
    $newfilename = date_timestamp_get($date).$_FILES['fileToUpload']['name'][$i] . '.' . end($temp);
    $newFilePath = "uploads/" . $newfilename;
  }

if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
// repeat or all the files
for($i=0; $i<$total; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];

  if ($tmpFilePath != ""){
    //Setup our new file path
        $temp = explode(".", $_FILES["fileToUpload"]["name"][$i]);
    $date = date_create();
    $newfilename = date_timestamp_get($date).$_FILES['fileToUpload']['name'][$i];
    $newFilePath = "uploads/" . $newfilename;

  }

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (
        move_uploaded_file($tmpFilePath, $newFilePath)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }}
}

include("icstoarray.php");
print_r($newFilePath);
?>
</body>
</html>