<?php

header('Content-Type: application/json');

function searchOrdinanceByLink($searchText, $ordinanceNumber) {
    $filePath = "../../../ordinances/{$ordinanceNumber}-filtered-updated.json";
    
    if (!file_exists($filePath)) {
        return array(
            "status" => "error",
            "message" => "File not found"
        );
    }

    try {
        $ordinanceJson = file_get_contents($filePath);
        $items = json_decode($ordinanceJson, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON data");
        }

        $results = array_values(array_filter($items, function($item) use ($searchText) {
            return stripos($item['link'], $searchText) !== false;
        }));

        return array(
            "status" => "success",
            "data" => $results,
            "count" => count($results)
        );

    } catch (Exception $e) {
        return array(
            "status" => "error",
            "message" => $e->getMessage()
        );
    }
}

// Usage
if (isset($_GET['query']) && isset($_GET['ordinanceNumberModal'])) {
    $result = searchOrdinanceByLink($_GET['query'], $_GET['ordinanceNumberModal']);
    echo json_encode($result);
}
?>