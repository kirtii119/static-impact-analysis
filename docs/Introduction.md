# Introduction

Static Impact Analysis is mainly divided into 3 parts:

1. **Analysing files** to create a mapping from functions to function calls, method calls and static method calls using phpstan Collectors. (Refer php-parser ahead to understand the difference between the 3 types of calls)
    - This mapping looks like
        - className::FunctionName ⇒ MethodCallClassName::MethodCall
    
    eg:
    
    **Code:**
    
    ```php
    	class TestClass
        {
        	protected str;
    
            public function echoHi()
            {
        		$this->str = "geet";
        		return  "Hi";
            }
          
            public function getStr()
            {
                $this->echoHi();
                return $this->str;
            }				
        }

    class Tester
    {
        function doSomethingUseful(TestClass $obj)
        {
            $var = $obj->getStr();
            echo $var
        }
    }
    ```
    
    **Mapping:**
    
    TestClass::getStr ⇒ TestClass::echoHi
    
    Tester::doSomethingUseful ⇒ TestClass::getStr
    
2. **Building a call graph :** The mapping created is utilised to build a call graph which basically lists all possible function calls during an execution given an entry point.
    
    eg.
    
    I/p : Tester::doSomethingUseful
    
    O/p: [Tester::doSomethingUseful, TestClass::getStr, TestClass ::echoHi]
    

3. **Running the functionality :** Given a function name, the URLs which can get affected by the corresponding functions are listed. A controller to URL mapping is currently hard coded from which all controllers are utilised as the entry points. This uses the Call Graph Builder and mappings created using phpstan.
