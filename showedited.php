<!DOCTYPE html>
<html>
<head>
	<title>Your Schedule</title>
</head>
<body>
<?php
require_once("main_ics_processer.php");
	$_POST['userinput'];
	print_r($_POST);
	echo "<br>";
	$icsfile=fopen("uploads/test.ics","a+") or die("Error has occured. Cannot open file!");
	foreach($_POST['userinput'] as $day=>$subkey){
		echo "$day<br>";
		foreach($subkey as $timeslot => $value){
		echo "$timeslot : $value<br>";
		fputs($icsfile, "
BEGIN:VEVENT
SUMMARY:EDITED
DTSTART2:$value
END:VEVENT
END:VCALENDAR");
	}
	}
	fclose($icsfile);
	

?>

</body>
</html>