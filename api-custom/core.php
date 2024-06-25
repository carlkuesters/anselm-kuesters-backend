<?php
	$db = new MySQLDatabase("localhost", "root", $_ENV["DB_ROOT_PASSWORD"], "textscraping");

	function getURLParameter($key, $defaultValue=false) {
		return getArrayValue($_GET, $key, $defaultValue);
	}

	function getArrayValue($array, $key, $defaultValue=false) {
		if (isset($array[$key])) {
			return $array[$key];
		}
		return $defaultValue;
	}

	function echoJsonResponse($response) {
	  header('Access-Control-Allow-Origin: *');
  	header('Content-Type: application/json; charset=utf-8');
  	echo json_encode($response);
	}
?>
