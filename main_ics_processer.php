<?php
include("icstoarray.php");
class user{
	public $name="";
	public $file="";
	public $weekArray;
	public function __construct($file){
		$this->file = $file;
	}

	public function allfunctionsprocessing(){
		$this->checkingInfo();
		$this->setNameUsingFilename();
		$this->gettingWeekArray();
		$this->printingArray();
	}
	public function checkingInfo(){
		echo "Name: $this->name<br>";
		echo "file: $this->file<br>";
	}

	//Function to derive name from the file name;
	public function setNameUsingFilename(){
		$this->name=substr_replace($this->file, "",-4,4);
		echo $this->name."<br>";
		echo "in<br>";
	}

	public function gettingWeekArray(){
		fillingArray($this->file, $this->weekArray);
	}

	public function printingArray(){
		testPrintArray($this->weekArray);
	}
}

function comparison($array1, &$freeTimeArray){
	foreach($array1 as $key1  => $value1){
		foreach ($freeTimeArray as $key2 => $value2) {
			if($key1==$key2){
				foreach ($value1 as $subkey1 => $subvalue1) {
					foreach ($value2 as $subkey2 => $subvalue2) {
						if($subkey1==$subkey2){
							if($subvalue1 == 1 || $subvalue2==1){
								$freeTimeArray[$key1][$subkey1]=1;
							}
						}
					}
				}
			}
		}
	}
}
//Creating $freeTimeArray where 0 means free
function doingComparison($userArray, $freeTimeArray){



//creating 2 objects. 
/*
$user1 = new user("sample.ics");
$user1->allfunctionsprocessing();
$user2 = new user("sample2.ics");
$user2->allfunctionsprocessing();*/


comparison($userArray, $freeTimeArray);
//comparison($user2->weekArray, $freeTimeArray);
echo "<br><br>=======Free Time Array=======<br><br>";
//Function below is from icsToArray.php
/*testPrintArray($freeTimeArray);
for($i=0;$i<5;$i++){
	${'value'.$i}=$i;
}
echo $user2->name;*/



}
?>