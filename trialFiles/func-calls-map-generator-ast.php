<?php
// Create a call graph pt3
// Increase spectrum - scan all :)

require_once __DIR__.'/vendor/autoload.php';
use PhpParser\Error;
use PhpParser\NodeDumper;
use PhpParser\NodeVisitor;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use PhpParser\Node;
use PhpParser\NodeFinder;
use PhpParser\NodeVisitor\ParentConnectingVisitor;

// $code  = file_get_contents(__DIR__.'/type-test.php');

$parser = (new ParserFactory())->createForNewestSupportedVersion();
$dumper = new NodeDumper();
$prettyPrinter = new PrettyPrinter\Standard();
$filename = './functionsMap.txt';

$main_dir = '/var/www/magento/vendor/magento';

$globFuncCallsArr = [];


class mapFunctionCallsVisitor extends NodeVisitorAbstract{
    public $funcCallsArr = [];
    public $classContext = "";
    public $funcMethContext = "";
    public $varArr = [];

    // public function handleFuncMeth(){
        
    // }    
    public function enterNode(Node $node){

        // echo "HI";
        // print_r($node);
        // echo $GLOBALS['dumper']->dump($node);

        if($node instanceof Node\Expr\Assign && $node->var instanceof Node\Expr\Variable && $node->expr instanceof Node\Expr\New_){
            $this->varArr[$node->var->name] = $node->expr->class->name;
        }

        //set class context
        else if($node instanceof Node\Stmt\Class_){
            $this->classContext = $node->name->name;
            //does not work for extended classes
         }

         //set funcMethContext and initialise empty empty arr for that method
         else if($node instanceof Node\Stmt\ClassMethod ){
            $this->funcMethContext = $node->name->name;
            $this->funcCallsArr[$this->classContext."::".$this->funcMethContext] = array();
            // print_r($this->funcCallsArr);
         }

         //set funcMethContext and initialise empty empty arr for that func
         else if($node instanceof Node\Stmt\Function_){
            $this->funcMethContext = $node->name->name;
            $this->funcCallsArr[$this->funcMethContext] = array();
            // print_r($this->funcCallsArr);

         }

        //push method calls from inside a method or inside a function
         else if($node instanceof Node\Expr\MethodCall &&  $this->funcMethContext){

            if($node->var instanceof Node\Expr\Variable)
            {
                //method call from inside a method
                if($this->classContext){
                    if($node->var->name == "this"){
                        array_push($this->funcCallsArr[$this->classContext."::".$this->funcMethContext], $this->classContext."::".$node->name->name );
                    }
                    else{
                        if(array_key_exists($node->var->name, $this->varArr)){
                            $methName = $this->varArr[$node->var->name]."::".$node->name->name;
                            }
                            else{
                                $methName = "unknown"."::".$node->name->name; //! check later - workaround
                            }


                        array_push($this->funcCallsArr[$this->classContext."::".$this->funcMethContext], $methName );
            
                    }
                }

                //method call from inside a function
                else{
                    if(array_key_exists($node->var->name, $this->varArr)){
                        $methName = $this->varArr[$node->var->name]."::".$node->name->name;
                        }
                        else{
                            $methName = "unknown"."::".$node->name->name; //! check later - workaround
                        }
                    array_push($this->funcCallsArr[$this->funcMethContext], $methName );
                }
            }
         }

         //push function calls from inside a function or method
         else if($node instanceof Node\Expr\FuncCall && $this->funcMethContext){
            if($this->classContext){



                array_push($this->funcCallsArr[$this->classContext."::".$this->funcMethContext], $node->name->name );
                }
            else{
            array_push($this->funcCallsArr[$this->funcMethContext],$node->name->name );
            }
         }

    }

    public function leaveNode(Node $node){
        if($node instanceof Node\Stmt\Class_ && $node->name->name === $this->classContext){
            $this->classContext = "";
    }

        if(($node instanceof Node\Stmt\Function_ or $node instanceof Node\Stmt\ClassMethod) && $node->name->name === $this->funcMethContext){
            $this ->funcMethContext = "";
    }
}

    public function afterTraverse(array $nodes){
        // $map = implode('', $this->funcCallsArr);
        $map = json_encode($this->funcCallsArr);
        file_put_contents($GLOBALS['filename'], $map . PHP_EOL, FILE_APPEND);
        
        // $GLOBALS['globFuncCallsArr'] = $this->funcCallsArr;
        // print_r($this->funcCallsArr);
    }
}

function generateCallMapping($fullName){
    file_put_contents($GLOBALS['filename'], $fullName . PHP_EOL , FILE_APPEND);
    $code  = file_get_contents($fullName);
    try{
        $ast = $GLOBALS['parser']->parse($code);
    }
    catch(Error $e){
        echo ''.$e->getMessage().'';
    }

    echo $GLOBALS['dumper']->dump($ast);
    // print_r($ast);

    file_put_contents($GLOBALS['filename'], json_encode( $ast) . PHP_EOL , FILE_APPEND);
    //this visitor will map a function to its corresponding function calls
    $traverser = new NodeTraverser();
    $traverser->addVisitor(new mapFunctionCallsVisitor);
    $traverser->traverse($ast);

}


function scanAll($dirFile){
   
    foreach(scandir($dirFile) as $child_dirFile)
    {
        if (in_array($child_dirFile, [".", ".."])) {
            continue; 
          }

    $fullName = $dirFile."/".$child_dirFile;
    if(is_dir($fullName)){
        // echo $fullName;
        scanAll($fullName);
    }
    if(str_ends_with($fullName, ".php")){
      generateCallMapping($fullName);
        echo $fullName."\n";
    }
    

    }

}

// scanAll($GLOBALS['main_dir']);
generateCallMapping('/var/www/magento/vendor/magento/composer/src/InfoCommand.php');

// $code  = file_get_contents('');
// try{
//     $ast = $parser->parse($code);
// }
// catch(Error $e){
//     echo ''.$e->getMessage().'';
// }

// echo $dumper->dump($ast);
// print_r($ast);

// $code = $prettyPrinter->prettyPrint($ast);
// echo $code;








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