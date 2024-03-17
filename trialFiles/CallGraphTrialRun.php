<?php
require_once 'src/CallGraphBuilder.php'; 
$resultFile = './src/call-graph-result.json';
$inputFilename ='../func-calls.txt';
$entryPoint ='Magento\Catalog\Model\Product\Website\SaveHandler::execute';
$mode = CallGraphBuilder::GRAPH ;// CallGraphBuilder::LINEAR


$callGraphBuilder = new CallGraphBuilder();
$funCallMap = $callGraphBuilder->createMapFromTxt($inputFilename);
$callGraphBuilder->setup($funCallMap);
$callGraphResult = $callGraphBuilder->run($entryPoint, CallGraphBuilder::GRAPH);
file_put_contents($resultFile, json_encode($callGraphResult));





    // public function createMapFromTxt($txtFile)
    // {
    //     if (is_string($txtFile)) {
    //         // Process single file
    //         $rawMapping = file($txtFile, FILE_SKIP_EMPTY_LINES + FILE_IGNORE_NEW_LINES);
    //         $mainMap = [];
    //         foreach ($rawMapping as $line) {
    //             $explodedArr = explode(" => ", $line);
    //             //  var_dump($explodedArr);
    //             $key = $explodedArr[0];
    //             $value = $explodedArr[1];

    //             if (array_key_exists($key, $mainMap)) {
    //                 $mainMap[$key][] = $value;
    //             } else {
    //                 $mainMap[$key] = [$value];
    //             }
    //         }
    //         return $mainMap;
    //     } else if (is_array($txtFile)) {
    //         // Process multiple files
    //         $mainMap = [];
    //         foreach ($txtFile as $singleFile) {
    //             $mapFromThisFile = self::createMapFromTxt($singleFile); // Recursive call
    //             $mainMap = array_merge_recursive($mainMap, $mapFromThisFile);
    //         }
    //         return $mainMap;
    //     } else {
    //         // Handle invalid input (optional)
    //         throw new Exception("Invalid input: Expected string or array of filenames");
    //     }

    //     /// rest of the original code for processing single file (if applicable)
    // }