<?php

$resultFile = './src/call-graph-result.json';

/**
*  returns associative array like: ["function"=>["functionCall1", "functionCall2"]]
*/
function createMapFromTxt(string $txtFile){
    $rawMapping  = explode("\n",file_get_contents($txtFile));
    $mainMap = [];
    foreach($rawMapping as $line){
    
    $explodedArr = explode(" => ",$line);
    $key = $explodedArr[0];
    $value = $explodedArr[1];

        if(array_key_exists($key, $mainMap)){
            $mainMap[$key][] = $value;
        }
        else{
            $mainMap[$key] = [$value];
        }
}
    return $mainMap;
}


class CallGraphBuilder {

    public const LINEAR = 1;
    public const GRAPH =2;

    private $callgraph = [];
    private $funcCallMap = [];
    

    /**
     * @param funCallMap -> ["function"=>["functionCall1", "functionCall2"]]
     */
    public function __construct(array $funcCallMap ){
        $this->funcCallMap = $funcCallMap;
    }

    /**
     * 
     */
    public function run(string $entryPoint, int $type) : array
    {
        $this->callgraph = [];
        if($type==1){
            $this->buildLinearCallsList($entryPoint);
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
    protected function buildLinearCallsList(string $callerFunction){

        if(in_array($callerFunction, $this->callgraph)){
            return;
        }

        array_push($this->callgraph, $callerFunction);

        if(!isset($this->funcCallMap[$callerFunction])){
            return;
        }

        foreach($this->funcCallMap[$callerFunction] as $funcCall){
            $this->buildLinearCallsList($funcCall);
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

// $funcCallMap  = (array)( json_decode(file_get_contents(__DIR__.'/func-call-mapping.json')));
$funCallMap = createMapFromTxt(__DIR__.'/func-calls-main.txt');
$callGraphBuilder = new CallGraphBuilder($funCallMap);
$callGraphResult = $callGraphBuilder->run("Magento\AdminNotification\Controller\Adminhtml\System\Message\ListAction::execute", CallGraphBuilder::GRAPH);
file_put_contents($resultFile, json_encode($callGraphResult));