<?php
require_once '../../../../../../../vendor/autoload.php'; // Include Composer autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../../../../../');
$dotenv->load();

function getTransacPerDept($dept_name) {
    if($dept_name == "BADAC"){
        $url = $_ENV['BADAC_API_URL'];
        return fetchData($url, 'BADAC');
    }else if ($dept_name == "BPSO"){
        $url = $_ENV['BPSO_API_URL'];
        return fetchData($url, 'BPSO');
    }else if ($dept_name == "BCPC"){
        $url = $_ENV['BCPC_API_URL'];
        return fetchData($url, 'BCPC');
    }else if ($dept_name == "VAWC"){
        $url = $_ENV['VAWC_API_URL'];
        return fetchData($url, 'VAWC');
    }else if ($dept_name == "ALL"){
        $urls = [
            'BADAC' => $_ENV['BADAC_API_URL'],
            'BPSO' => $_ENV['BPSO_API_URL'],
            'BCPC' => $_ENV['BCPC_API_URL'],
            'VAWC' => $_ENV['VAWC_API_URL']
        ];
        
        $allData = [];
        foreach($urls as $dept => $url) {
            $response = @file_get_contents($url);
            if($response !== false) {
                $decodedResponse = json_decode($response, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $allData[$dept] = $decodedResponse;
                } else {
                    $allData[$dept] = ['error' => "Invalid JSON from $dept"];
                }
            } else {
                $allData[$dept] = ['error' => "Failed to fetch data from $dept"];
            }
        }
        return json_encode($allData);
    }
    return json_encode(['error' => 'Invalid department']);
}

function fetchData($url, $dept) {
    $response = @file_get_contents($url);
    if($response === false) {
        return json_encode(['error' => "Failed to fetch $dept data"]);
    }
    $decodedResponse = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return json_encode(['error' => "Invalid JSON from $dept"]);
    }
    return json_encode($decodedResponse);
}

if (isset($_GET['dept_name'])) {
    header('Content-Type: application/json');
    echo getTransacPerDept($_GET['dept_name']);
}
?>