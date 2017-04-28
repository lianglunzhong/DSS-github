<?php

namespace Dbsync\Libs;

class Bootstrap
{

	public static function load($class)
	{
		$class = strtolower($class);
		$classArray = explode('\\',$class);
	//	var_dump($classArray);
		if(count($classArray) < 3)
		{
			return;
		}
		if($classArray[0] == 'dbsync' && in_array($classArray[1], ['help','libs']) && $classArray[2] != '')
		{
			$dbsyncClass = BP.DS.$classArray[1].DS.($classArray[1]=='help'?$classArray[2].'.help':$classArray[2]).'.php';
			if(is_file($dbsyncClass))
			{
				return include_once $dbsyncClass;
			}
			else
			{
				exit('<span style="font-size:14px;font-weight:bold;">File Miss</span><br>'.$dbsyncClass.' or class <span style="color:red;">'.$class.'</span> is not exist.');
			}
		}
	}
}

spl_autoload_register(array(__NAMESPACE__.'\Bootstrap','load'));