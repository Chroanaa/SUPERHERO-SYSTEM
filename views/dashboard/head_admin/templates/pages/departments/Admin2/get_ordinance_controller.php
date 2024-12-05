<?php
header('Content-Type: application/json');
function getOrdinanceData($number){
  $filePath = "../../../ordinances/{$number}-filtered-updated.json";
  if(file_exists($filePath)){
    $ordinanceJson = file_get_contents($filePath);
    echo json_encode(json_decode($ordinanceJson));
}else{
    echo json_encode(array("message" => "File not found"));
}
}
if(isset($_GET['number'])){
    getOrdinanceData($_GET['number']);
}
?>