<?php

require __DIR__.'/src/CallGraphSearch.php';

if($argv){
    $output = run($argv[1]);
    print_r($output);
    die;
}

// Check if the input parameter is provided
if (!isset($_GET['input'])) {
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Input parameter is missing"));
    exit;
}

// Process the input parameter
$input = $_GET['input'];
// $input="Acme\CartModule\Controller\Cart\Detail::execute";

$response = run($input);

// Set the response headers and send the response
header("Content-Type: application/json");
echo json_encode($response);

function run(string $input){
    // Perform operation based on the input
    $SearchCallGraphObj = new CallGraphSearch();
    $output = $SearchCallGraphObj->execute($input);
    
    if ($output == -1){
        return array("output" => "Function not found in any URL/ controller");
    }
    else{
        return $output;
    }
    }