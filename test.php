<?php
session_start();
	include("groupFunction.php");
	include("main_ics_processer.php");
	include("databaseconnection.php");
	$username=$_SESSION['username'];
	echo $username;
	$sql= "SELECT filename FROM userid WHERE username='$username' ";
	$stmt = $database->prepare($sql);
	$stmt->execute();
	$result= $stmt->fetchColumn();
	$result = unserialize($result);
	print_r($result);
	printTableArray($result);

/*
	$serializedArray=gettingFilenameWithUsername($_SESSION['username']);
	echo "$serializedArray";
	$array=unserialize($serializedArray);
	print_r($array);
*/
?>