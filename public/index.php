<?php

use Dbsync\Libs\DS;

include_once '../bridge.php';

$index_html = <<<STR
  <pre style='border:none;padding:5em 0;background-color:#fff;'>
                  _______________________________________________________
                  |                                                      |
             /    |              I'am an old driver                      |
            /---, |                                                      |
       -----# ==| |              get on the bus quickly                  |
       | :) # ==| |                                                      |
  -----'----#   | |______________________________________________________|
  |)___()  '#   |______====____   \___________________________________|
 [_/,-,\"--"------ //,-,  ,-,\\\   |/             //,-,  ,-,  ,-,\\ __#
   ( 0 )|===******||( 0 )( 0 )||-  o              '( 0 )( 0 )( 0 )||
----'-'--------------'-'--'-'-----------------------'-'--'-'--'-'--------------
  </pre>
STR;

echo $index_html;