<?php 
	$getComm = trim($_GET['msg']);
	$getTime = trim($_GET['time']);

	if(!get_magic_quotes_gpc()){
	    $getComm = addslashes($getComm);
	    $getTime = addslashes($getTime);
	}

	try{
	    $dbconnect = new PDO('mysql:host=localhost;dbname=danmaku','sp1','superpower1');
	}catch(PDOException $exception){
	    echo "Connection error message: ".$exception->getMessage();
	}

	$all = "SELECT * FROM danmaku";
	$res = $dbconnect->prepare($all);
	$res->execute();
	$num = $res->rowCount();
	$id = $num+1;

	$sqlquery = "INSERT INTO danmaku(id, sendTime, comment) 
    	VALUES('$id', '$getTime', '$getComm')";
    
	if($dbconnect->exec($sqlquery)) echo "Comment added.";
	else echo "error!";

	// echo $getTime.' '.$getComm;
 ?>