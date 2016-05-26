<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require_once("main_ics_processer.php");
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
    $newfilename = date_timestamp_get($date).$_FILES['fileToUpload']['name'][$i];
    $newFilePath = "uploads/" . $newfilename;
    echo $newFilePath."<br>";

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

     $j=$i+1;
     ${'user'.$j}= new user($newFilePath);
     ${'user'.$j}->allfunctionsprocessing();
}

//Creating freeTimeArray
$dayArray = array(
         "0600"=>0,
         "0630"=>0,
         "0700"=>0,
         "0730"=>0,
         "0800"=>0,
         "0830"=>0,
         "0900"=>0,
         "0930"=>0,
         "1000"=>0,
         "1030"=>0,
         "1100"=>0,
         "1130"=>0,
         "1200"=>0,
         "1230"=>0,
         "1300"=>0,
         "1330"=>0,
         "1400"=>0,
         "1430"=>0,
         "1500"=>0,
         "1530"=>0,
         "1600"=>0,
         "1630"=>0,
         "1700"=>0,
         "1730"=>0,
         "1800"=>0,
         "1830"=>0,
         "1900"=>0,
         "1930"=>0,
         "2000"=>0,
         "2030"=>0,
         "2100"=>0,
         "2130"=>0,
         "2200"=>0,
         "2230"=>0,
         "2300"=>0,
         "2330"=>0);
   // Array for the weekArray
$freeTimeArray = array(
         "Monday" => $dayArray,
         "Tuesday" => $dayArray,
         "Wednesday" => $dayArray,
         "Thursday" => $dayArray,
         "Friday" => $dayArray,
         "Saturday" => $dayArray,
         "Sunday" => $dayArray);


comparison($user1->weekArray, $freeTimeArray);
echo "<br><br>=======Free Time Array=======<br><br>";
testPrintArray($freeTimeArray);





?>
</body>
</html>