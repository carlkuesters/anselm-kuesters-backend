<?php
	function getURLParameter($key, $defaultValue=false) {
		return getArrayValue($_GET, $key, $defaultValue);
	}

	function getArrayValue($array, $key, $defaultValue=false) {
		if (isset($array[$key])) {
			return $array[$key];
		}
		return $defaultValue;
	}
?>
