<?php
require_once __DIR__.'/vendor/autoload.php';
use PhpParser\ParserFactory;
use PhpParser\NodeDumper;
$code  = file_get_contents(__DIR__.'/ifCode.php');
$parser = (new ParserFactory())->createForNewestSupportedVersion();
$dumper = new NodeDumper();

$ast = $parser->parse($code);
echo $dumper->dump($ast);
