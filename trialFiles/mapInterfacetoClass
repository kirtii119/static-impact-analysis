<?php
require_once '../src/CallGraphBuilder.php';

$mapper = new CallGraphBuilder ();
$map = $mapper->createMapFromTxt(['../InterfaceImpl.txt']);

//var_dump($map);
file_put_contents('../MapinterfaceClass.json',json_encode($map));
