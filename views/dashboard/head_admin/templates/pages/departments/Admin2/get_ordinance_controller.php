<?php
header('Content-Type: application/json');
function getOrdinanceData($number, $limit){
  $filePath = "../../../ordinances/{$number}-filtered-updated.json";
  if(file_exists($filePath)){
    $ordinanceJson = file_get_contents($filePath);

    $items = array_slice(json_decode($ordinanceJson), 0, $limit);
    echo json_encode($items);
}else{
    echo json_encode(array("message" => "File not found"));
}
}
if(isset($_GET['number'])){
    getOrdinanceData($_GET['number'], $_GET['limit'] ?? 6);
}
?>