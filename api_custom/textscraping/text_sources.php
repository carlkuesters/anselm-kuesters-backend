<?php
	require_once(__DIR__ . "/../core.php");

	$textSources = $db->getRows("text_source");

	$returnedTextSources = array();
	foreach ($textSources as $textSource) {
		$returnedTextSource = new stdClass();
		$returnedTextSource->id = $textSource->id;
		$returnedTextSource->title = $textSource->title;

		$returnedTextSources[] = $returnedTextSource;
	}

	echoJsonResponse($returnedTextSources);
?>
