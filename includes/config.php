<?php

define('PS', PATH_SEPARATOR);  // : || ;

define('DEBUG', true);

/**
 | database
 */
define('USEDB', true);
if(USEDB)
{
	include_once 'database.php';
}

/**
 | version
 */
//define('VERSION', '0.0.2');
define('VERSION_TYPE', 'alpha');
