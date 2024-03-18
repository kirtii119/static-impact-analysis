<?php

if(count($argv)>1){
    $mappingPath = __DIR__.'/call-mappings/*';
    $rootDir = __DIR__.'/../';
    exec('rm -rf '.$mappingPath);
    exec($rootDir.'phpstan-src/bin/phpstan analyse '. $argv[1]);
}
else{
    echo "Missing filepath to analyse \n";
}

