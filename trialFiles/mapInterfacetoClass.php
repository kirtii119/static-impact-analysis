<?php
require_once '../src/CallGraphBuilder.php';

$mapper = new CallGraphBuilder ();
$map = $mapper->createMapFromTxt([__DIR__.'/../run-results/InterfaceCollected.txt']);

//var_dump($map);
file_put_contents(__DIR__."/../run-results/MapinterfaceClass.json",json_encode($map));
