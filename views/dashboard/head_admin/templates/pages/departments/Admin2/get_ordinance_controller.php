<?php
header('Content-Type: application/json');
function getOrdinanceData($number, $limit){
  $filePath = "../../../ordinances/{$number}-filtered-updated.json";
  if(file_exists($filePath)){
    $ordinanceJson = file_get_contents($filePath);

    $items = array_slice(json_decode($ordinanceJson), 0, $limit);
    echo json_encode($items);
  } else {
    echo json_encode(array("message" => "File not found"));
  }
}

function getNextOrdinanceData($number, $limit, $offset){
  $filePath = "../../../ordinances/{$number}-filtered-updated.json";
  if(file_exists($filePath)){
    $ordinanceJson = file_get_contents($filePath);

    $items = array_slice(json_decode($ordinanceJson), $offset, $limit);
    echo json_encode($items);
}else{
    echo json_encode(array("message" => "File not found"));
}
}
if(isset($_GET['number']) && isset($_GET['limit']) && isset($_GET['offset'])){
  getNextOrdinanceData($_GET['number'], $_GET['limit'], $_GET['offset']);
}else if(isset($_GET['number']) && isset($_GET['limit'])){
    getOrdinanceData($_GET['number'], $_GET['limit']);
}

?>