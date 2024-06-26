# Static Impact Analysis for Magento:

Impact analysis aims to identify and prioritize URLs for testing within a given pull request. This project focuses on finding URLs/ pages that are affected due to modifications in functions in the magento framework.

This can be done in two ways:

1. Spx Profile Analysis - Covers url routes already visited and profiled
2. Static Code Analysis - Aims at covering all possible cases

Check out Spx Profile Analysis [here](https://github.com/kirtii119/impact--analysis-spx/tree/main_api)


# Quick Start

Run the project using the following steps:
(Refer to [Introduction](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Introduction.md) and [Functionality section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Functionality.md) to understand more about the working)

- **Clone the repositories:**
    - Clone this repository (referred as ‘main_dir’ ahead)
    - Clone the [phpstan-src](https://github.com/phpstan/phpstan-src.git.) repository into main_dir.
    - Make sure you have [composer](https://getcomposer.org/) setup.
    - Run these commands in main_dir to get php parser and to make sure our ‘App’ namespace (used for Rules and collectors) is autoloaded.
    
    ```bash
    composer require nikic/php-parser
    composer dump-autoload
    ```
    
- **Generating function calls mapping:**
    - Run the following command in main_dir with the filepath you wish to analyse and generate function calls mappings.
        
        ```bash
        php src/generate-new-mappings.php <filepath>
        ```
        Alternatively, you can also run: 
        ```bash
        phpstan-src/bin/phpstan analyse <filepath>
        ```
        Results are generated in `src/call-mappings`. Three (or less) files are generated as a result: func-calls.txt, meth-calls.txt and static-calls.txt.
        
        **Note:** 
        
        1. When you run the command from phpstan directly, new results are appended to the old ones in the `src/call-mappings` files. Make sure to clear these files before any new execution. Also, in this case, previous cache is not cleared, so collectors will not always yeild the results you expect. Check 'Notes for phpstan' in the [Functionality Section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Functionality.md)
        2. You can try this on our demo module: `tests/testModule/Acme`
    
    Don’t forget to check phpstan.neon if this didn’t work as expected. More details about this are mentioned in the  [Functionality section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Functionality.md) .
    
- **Running the call graph builder:**
    - Update the `src/controller-url-map.txt` with the <controller> ⇒ <URL> mapping your project has. The controllers mentioned here will act as possible entry points. It currently contains the mappings corresponsing to the demo module.
    - Run this command in the main_dir with the exact function-name in the format “className::functionName”. It will output all the URLs affected by the corresponding function.
    
    ```bash
    php index.php '<function-name>'
    ```
    
    **Note:** 
    
    - Always use qualified class names.
    - This command has an optional second parameter to specify a method calls input file for which the call graph will be generated.
    - By default it uses mappings at `src/call-mappings`. Currently this is setup for method calls & static method calls. You can add function calls if needed.
    
    This command creates call-graphs as intermediary which can be found at `src/call-graphs`. Refer to [Functionality section](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Functionality.md) to learn more about this.

# Documentation
1. [Introduction](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Introduction.md)
2. [Functionality](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Functionality.md)
3. [Problems](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/Problems.md)
4. [Demo Module](https://github.com/kirtii119/static-impact-analysis/blob/master/docs/DemoModule.md)

# References

- https://github.com/nikic/PHP-Parser
- https://github.com/phpstan/phpstan-src.git
- https://phpstan.org/user-guide/getting-started
- https://docs.phpunit.de/en/11.0/installation.html

You can also view this documentation [here](https://ambiguous-captain-ea3.notion.site/Impact-Analysis-Documentation-e61f56aaa0a34b32b70ebf11ce96ea66?pvs=4)
