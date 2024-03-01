<?php
require_once '../vendor/autoload.php';
use PhpParser\ParserFactory;
use PhpParser\NodeDumper;
$code  = file_get_contents('/var/www/magento/vendor/magento/framework/View/Test/Unit/Helper/JsTest.php');
$parser = (new ParserFactory())->createForNewestSupportedVersion();
$dumper = new NodeDumper();

$ast = $parser->parse($code);
echo $dumper->dump($ast);
