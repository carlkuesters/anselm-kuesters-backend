<?php
	require_once(__DIR__ . "/core/core.php");

	$db = new MySQLDatabase("db", 3306, "root", $_ENV["DB_ROOT_PASSWORD"], "textscraping");

	function echoJsonResponse($response) {
	  header('Access-Control-Allow-Origin: *');
  	header('Content-Type: application/json; charset=utf-8');
  	echo json_encode($response);
	}
?>
