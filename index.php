<?php

require __DIR__.'/src/CallGraphSearch.php';

if(count($argv)>1){
    $arg2 = count($argv)>2 ? $argv[2] : '';
    $output = run($argv[1], $arg2);
    print_r($output);
}
else{
    echo "Missing function name \n";
}

function run(string $input, string $methCallsFilename){
    // Perform operation based on the input
    $SearchCallGraphObj = new CallGraphSearch();
    $output = ($methCallsFilename)
                ?$SearchCallGraphObj->execute($input, $methCallsFilename)
                :$SearchCallGraphObj->execute($input);
    
    if (!$output){
        return array("output" => "Function not found in any URL/ controller");
    }
    else{
        return $output;
    }
    }

// //WEB API

// // Check if the input parameter is provided
// if (!isset($_GET['input'])) {
//     http_response_code(400); // Bad Request
//     echo json_encode(array("error" => "Input parameter is missing"));
//     exit;
// }

// // Process the input parameter
// $input = $_GET['input'];
// // $input="Acme\CartModule\Controller\Cart\Detail::execute";

// $response = run($input);

// // Set the response headers and send the response
// header("Content-Type: application/json");
// echo json_encode($response);

