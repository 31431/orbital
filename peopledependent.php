<?php
session_start();
include("main_ics_processer.php");
include("groupFunction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>People Dependent Function</title>
	<link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
<h1> Welcome, <?php echo $_SESSION['username'];?>!</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post" name="userChosen">
<?php
	$groupMember=gettingGroupMember($_SESSION['groupID']);
	foreach($groupMember as $key=>$value){
		foreach ($value as $subkey => $userID) {
			$name= gettingUsernameFromID($userID);
			echo "<input type='checkbox' name='userChosen[$name]' value='$userID'> $name</input>";
		}
	}
	echo "<br><br><input type='submit' value='Submit'>";
	echo "</form>";

	if(isset($_POST['userChosen'])){
		//$freeTimeArray=array();
		initialiseWeekArray($freeTimeArray);
		foreach($_POST['userChosen'] as $key=>$userID){
			initialiseWeekArray($userTimeslotArray);
			$filename=gettingFilename($userID);
			//echo "Filename for $subvalue is $filename<br>";
			fillingArray('uploads/'.$filename,$userTimeslotArray);
			comparison($userTimeslotArray, $freeTimeArray);

		}
	} else {
		exit();
	}
	echo "<h1> Common Free Time For Selected Users</h1>";
	printTableArray($freeTimeArray);

	

?>



</body>
</html>