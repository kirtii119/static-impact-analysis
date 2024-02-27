<?php
// Script to extract variable types using PHPStan API
require_once __DIR__.'/vendor/autoload.php';

use PHPStan\Analyser\Analyser;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Type\MixedType;

$phpstan = new Analyser(
  require 'phpstan.neon' // Assuming you have a phpstan.neon config file
);

$analysis = $phpstan->analyseFile(__DIR__ . '/function-calls-mapping.php');

$variableTypes = [];
foreach ($analysis->getVariables() as $variable) {
  $type = $variable->getType();
  if (!$type instanceof MixedType) {
    $variableTypes[$variable->getName()] = $type->describe();
  }
}

print_r($variableTypes);