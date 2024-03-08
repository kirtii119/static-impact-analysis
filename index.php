<?php

require __DIR__.'/src/CallGraphSearch.php';

// Check if the input parameter is provided
if (!isset($_GET['input'])) {
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Input parameter is missing"));
    exit;
}

// Process the input parameter
$input = $_GET['input'];
// $input="Acme\CartModule\Controller\Cart\Detail::execute";

// Perform operation based on the input
$SearchCallGraphObj = new CallGraphSearch();
$output = $SearchCallGraphObj->execute($input);

if ($output == -1){
    $response = array("output" => "Function not found in any URL/ controller");
}
else{
    $response = $output;
}

// Set the response headers
header("Content-Type: application/json");

// Send the response
echo json_encode($response);