<?php 
	header("Content-Type:application/json;charset=UTF-8");

	try{
	    $dbconnect = new PDO('mysql:host=localhost;dbname=danmaku','sp1','superpower1');
	}catch(PDOException $exception){
	    echo "Connection error message: ".$exception->getMessage();
	}

	$arr = array();

	$sqlquery = "SELECT * FROM danmaku";
	if(!$sqlquery){
		echo "Fail to load comments!";
		}
	else {
		$result = $dbconnect->query($sqlquery);
		foreach ($result as $row) {
			// echo $row['id'] . "\t" . $row['sendTime'] . "\t" .$row['comment'];
			array_push($arr,$row);
		}
		echo json_encode($arr);
		// echo $result;
	}
	
 ?>