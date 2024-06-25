<?php
	require_once(__DIR__ . "/../core.php");

	$word = getURLParameter("word");
	$textSourceIdsText = getURLParameter("textSourceIds");

  $query = "
      SELECT YEAR(text.date) as year, SUM(text_word_analysis.count) as total_count FROM text_word_analysis
      JOIN word on word.id = text_word_analysis.word_id
      JOIN text on text.id = text_word_analysis.text_id
      WHERE word.word = \"" . $db->escape($word) . "\"
  ";
  if ($textSourceIdsText) {
    $textSourceIds = explode(",", $textSourceIdsText);
      $query .= " AND text.source_id IN (";
      foreach ($textSourceIds as $i=>$textSourceId) {
          if ($i > 0) {
              $query .= ", ";
          }
          $query .= intval($textSourceId);
      }
      $query .= ")";
  }
  $query .= "
      GROUP BY year
      ORDER BY year
  ";
	$rows = $db->sendQuery($query);

	$response = array();
	if ($rows) {
    $firstYear = intval($rows[0]->year);
    $lastYear = intval($rows[count($rows) - 1]->year);

    $nextRowIndex = 0;
    $nextRow = $rows[$nextRowIndex];
    for ($year = $firstYear; $year <= $lastYear; $year++) {
        if ($nextRow->year == $year) {
          $count = intval($nextRow->total_count);
          $nextRowIndex++;
          if ($nextRowIndex < count($rows)) {
              $nextRow = $rows[$nextRowIndex];
          }
        } else {
            $count = 0;
        }

        $yearAnalysis = new stdClass();
        $yearAnalysis->year = $year;
        $yearAnalysis->totalCount = $count;

        $response[] = $yearAnalysis;
      }
	}

	echoJsonResponse($response);
?>

