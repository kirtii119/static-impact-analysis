<?php

require_once '/var/www/magento/vendor/magento/framework/App/AreaList.php';

$funcCallMap  = (array)( json_decode(file_get_contents(__DIR__.'/func-call-mapping.json')));
$resultFile = './call-graph-result.json';


class CallGraphBuilder {

    public const LINEAR = 1;
    public const GRAPH =2;

    private $callgraph = [];
    private $funcCallMap = [];
    

    public function __construct(array $funcCallMap ){
        $this->funcCallMap = $funcCallMap;
    }

    /**
     * 
     */
    public function run(string $entryPoint, int $type){
        $this->callgraph = [];
        if($type==1){
            $this->linearCallsList($entryPoint);
            return $this->callgraph;
        }
        
        $arrReference = &$this->callgraph;
        $this->buildCallGraph($entryPoint, $arrReference);
        return $this->callgraph;
    }

    /**
     * 
     * 
     */
    protected function linearCallsList(string $callerFunction){

        if(in_array($callerFunction, $this->callgraph)){
            return;
        }

        array_push($this->callgraph, $callerFunction);

        if(!isset($this->funcCallMap[$callerFunction])){
            return;
        }

        foreach($this->funcCallMap[$callerFunction] as $funcCall){
            $this->linearCallsList($funcCall);
        }
    }

    /**
     * 
     * 
     */
    protected function buildCallGraph(string $callerFunction, array &$arrReference){

        $arrReference[$callerFunction] = [];

        if(!isset($this->funcCallMap[$callerFunction])){
            return;
        }

        foreach($this->funcCallMap[$callerFunction] as $funcCall){
            $callerFuncArrRefernce = &$arrReference[$callerFunction];
            $this->buildCallGraph($funcCall, $callerFuncArrRefernce );
        }
    }
}

$callGraphBuilder = new CallGraphBuilder($funcCallMap);
$callGraphResult = $callGraphBuilder->run("Magento\Framework\Code\Test\Unit\Generator\ClassGeneratorTest::testAddMethods", CallGraphBuilder::GRAPH);
file_put_contents($resultFile, json_encode($callGraphResult));