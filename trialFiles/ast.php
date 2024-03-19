<?php

//use this file to create and view ASTs

require_once 'vendor/autoload.php';
use PhpParser\ParserFactory;
use PhpParser\NodeDumper;

// $code2 = <<< 'CODE2'
// <?php
// function test($foo)
// {
//     var_dump($foo);
// }
// CODE2;

$code  = file_get_contents('/var/www/magento/vendor/magento/framework/Data/Form/Element/AbstractElement.php');
$parser = (new ParserFactory())->createForNewestSupportedVersion();
$dumper = new NodeDumper();

$ast = $parser->parse($code);
echo $dumper->dump($ast); 
