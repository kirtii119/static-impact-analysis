<?php
require_once 'src/CallGraphBuilder.php'; 
$resultFile = __DIR__.'/../run-results/call-graph-result.json';
$inputFilename =__DIR__.'/../call-mappings/meth-calls.txt';
$entryPoint ='Magento\Catalog\Model\Product\Website\SaveHandler::execute';
$mode = CallGraphBuilder::GRAPH ;// CallGraphBuilder::LINEAR


$callGraphBuilder = new CallGraphBuilder();
$funCallMap = $callGraphBuilder->createMapFromTxt([$inputFilename]);
$callGraphBuilder->setup($funCallMap);
$callGraphResult = $callGraphBuilder->run($entryPoint, $mode);
file_put_contents($resultFile, json_encode($callGraphResult));



