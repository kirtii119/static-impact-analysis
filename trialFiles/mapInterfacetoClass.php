<?php
require_once '../src/CallGraphBuilder.php';

$mapper = new CallGraphBuilder ();
$map = $mapper->createMapFromTxt(['../InterfaceCollected.txt']);

//var_dump($map);
file_put_contents("../run-results/MapinterfaceClass.json",json_encode($map));
