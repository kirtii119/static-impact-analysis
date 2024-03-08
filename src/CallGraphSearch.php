<?php

require_once("src/CallGraphBuilder.php");


class CallGraphSearch{

  public $extractedFilesDir = __DIR__.'/call-graphs';
  public $output_urls = array();
  public $logfile = "./error.log";
function search($functionName) {


    // Iterate through files in the extracted files directory 
    foreach (scandir($this->extractedFilesDir) as $filename) {

      // Skip filenames "." and ".."
      if (in_array($filename, [".", ".."])) {
        continue; 
      }

      //append full filePath
      $filePath = $this->extractedFilesDir."/$filename";

      //array of all lines in the file
      $lines  = file_get_contents($filePath);
      $lines = explode("\n",$lines);
      // var_dump($lines);
      // $lines = file($filePath, FILE_SKIP_EMPTY_LINES + FILE_IGNORE_NEW_LINES);
      
      $url = $filename;
      //url doesn't already exist, only then search
      if (!in_array($url,$this->output_urls)){
      $key = array_search("$functionName", $lines); //returns false if url not found 
      if ($key !== false) {        
          array_push($this->output_urls, $url);
        }
        
      }
    }
  }


function execute(string $functionName){

  try {

//1. generate callGraphs for all entry points in urls.txt
  $lines = file(__DIR__.'/urls.txt', FILE_SKIP_EMPTY_LINES + FILE_IGNORE_NEW_LINES);
  // var_dump($lines);
  $callGraphBuilder = new CallGraphBuilder();
  $funcCallMap = $callGraphBuilder->createMapFromTxt(__DIR__.'/../func-calls.txt');
  $callGraphBuilder->setup($funcCallMap);
   
  foreach ($lines as $entryPoint){
    $callGraphResult = $callGraphBuilder->run($entryPoint, CallGraphBuilder::LINEAR);
    file_put_contents(__DIR__.'/call-graphs/'.$entryPoint.'.txt', "");
    foreach($callGraphResult as $line){
      file_put_contents(__DIR__.'/call-graphs/'.$entryPoint.'.txt', $line. PHP_EOL, FILE_APPEND );
    }
  }
        

//2. search input function's name in all extracted files and o/p url if the function is present

    $this->search($functionName);
    if($this->output_urls){
      // var_dump($this->output_urls);
      return $this->output_urls;
    }
    return -1;
  } catch (Exception $e) {
    error_log("Error: " . $e->getMessage() . PHP_EOL, 3, $this->logfile);
  }
     
  }
}

  //extract_script.sh should have permissions to access /tmp/spx