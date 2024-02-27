<?php

include '/var/www/magento/vendor/magento/composer/src/InfoCommand.php';
use Magento\Composer\InfoCommand;
$filename = 'Exception';
function getFunctionCalls($filename) {
  $calls = [];
  $reflector = new ReflectionClass($filename);
  foreach ($reflector->getMethods() as $method) {
    print_r( $method);
    foreach ($method->getParameters() as $parameter) {
      if ($parameter->getClass() !== null) {
        $calledClass = $parameter->getClass()->getName();
        $calls[$method->getName()][] = $calledClass . "::" . $parameter->getName();
      }
    }
  }
  return $calls;
}

$calls = getFunctionCalls($filename);
print_r($calls);