<?php


require_once '/var/www/magento/vendor/magento/framework/App/AreaList.php';

$globFuncCallsArr  = (array)( json_decode(file_get_contents(__DIR__.'/func-call-mapping.json')));
$resultFile = './call-graph-result.json';
print_r($globFuncCallsArr);

$mainCallGraph = [];


function goIntoFunc($funcName, &$children){
    
     if(array_key_exists($funcName,$GLOBALS['globFuncCallsArr']))
     {
        //push functioncall in children array
        if($GLOBALS['globFuncCallsArr'][$funcName]) //if value of that array-key is not empty
        {
            array_push($children, ["value"=>$funcName, "children"=>[]]);
            //check func calls mapping and iterate over each call
            foreach($GLOBALS['globFuncCallsArr'][$funcName] as $funcCall)
            {       
                //access the last element of children array
                $cnt = count($children);
                $maybePointer =  & $children[$cnt-1]['children'];
                //pass latest funcCall children array
                goIntoFunc($funcCall, $maybePointer);                 
            }
        }
        else{
            array_push($children, ["value"=>$funcName]);
        }
    }
    else{
    //! check - this is for function defns not present in the file or funcs which don't have calls
    array_push($children, ["value"=>$funcName]);
    }
 }


 function goIntoFunc2($funcName, &$children){
    
    if(array_key_exists($funcName,$GLOBALS['globFuncCallsArr']))
    {
       //push functioncall in children array
       if($GLOBALS['globFuncCallsArr'][$funcName]) //if value of that array-key is not empty
       {
            $children += [$funcName=>[]];
           //check func calls mapping and iterate over each call
           foreach($GLOBALS['globFuncCallsArr'][$funcName] as $funcCall)
           {       
               //access the last element of children array
               $cnt = count($children);
               $maybePointer =  & $children[$funcName];
               //pass latest funcCall children array
               goIntoFunc2($funcCall, $maybePointer);                 
           }
       }
       else{
        $children += [$funcName=>[]];
       }
   }
   else{
   //! check - this is for function defns not present in the file or funcs which don't have calls
   $children += [$funcName=>[]];
   }
}
function givenEntryPoint($entryFunction){
    // $callGraph = ["value" => $entryFunction, "children" => []];
    // $maybePointer = &$callGraph["children"];
    $callGraph = [];    
    $maybePointer = &$callGraph;
    goIntoFunc2($entryFunction, $maybePointer);
    // print_r($callGraph);
    file_put_contents($GLOBALS['resultFile'], json_encode($callGraph));
    
}


givenEntryPoint("Magento\Framework\Code\Test\Unit\Generator\ClassGeneratorTest::testAddMethods");





/*
Methodology:
1. Start AST traversal
2. Generate functions to function calls mapping
3. Traverse ast again
4. This time don't traverse children of class and functions nodes
5. Find function/ method calls
6. Traverse that function and append call graph using the mapping generated earlier
7. Find variable data types using a visitor simultaneously (useful for method calls) 

Drawbacks:
1. Ignoring if else conditions - will consider all func/ method calls
2. Will get stuck in recursive calls
3. Constructors are not taken into consideration
4. Only work if all functions/ methods are in same file / ast created.
5. assume syntax is logically correct - variables calling the functions are objects of corresponding class
6. Expr method call considers a variable is used -- check
7. static method calls not considered
8. same variable names of local and global variables can give inaccurate results
9. inherited classes not considered
*/