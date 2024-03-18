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



