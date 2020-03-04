<?php
	header("Content-Type: text/plain");

	if(!isset($_GET["op"]) || !preg_match("/^(status|start|pause)$/", $_GET["op"])) {
		die("Error!");
	}
	
	$code = $_GET["op"];
	$response = "Error!";
	
	if($code === "status") {
		$response = file_get_contents("http://localhost:8080/0/detection/status");
	}
	
	if($code === "start") {
		$response = file_get_contents("http://localhost:8080/0/detection/start");
	}
	
	if($code === "pause") {
		$response = file_get_contents("http://localhost:8080/0/detection/pause");
	}
	
	die(trim($response));
