<?php

namespace Dbsync\Libs;

final class DS
{
	/**
	 | 实例化类池
	 */
	private static $new = [];

	function __construct()
	{
	}

	/**
	 | 框架执行入口
	 */
	public static function run()
	{
		self::$theme = ds\Libs\Http::isBackend() ? 'admin' : ds_THEME;
		ds\Libs\Http::route();
		self::_run();
	}

	/**
	 | 入口
	 */
	private static function _run()
	{

		/* model code */
		$dsMod = ds\Libs\Http::$dsMod;
		/* controllers code */
		$dsCon = ds\Libs\Http::$dsCon;
		/* function code */
		$dsFun = ds\Libs\Http::$dsFun;

		if(is_file(APP . DS . "code" . DS . $dsMod . DS . "controllers" . DS . $dsCon . ".lib.php"))
		{
			$dsConClass = "ds\\App\\".ucfirst(strtolower($dsMod))."\\Controllers\\".ucfirst(strtolower($dsCon))."Lib";
			if($obj = new $dsConClass)
			{
				if(method_exists($obj,$dsFun))
				{
					$obj->$dsFun();
					return;
				}
			}
		}
		exit('404');
	}

	/**
	 | 实例化help类
	 | $help help类名
	 | $args 类的参数 如果不为空则不会被缓存
	 */
	public static function Help($help, $args='')
	{
		$helpfile = BP . DS . 'help' . DS . strtolower($help) . ".help.php";
		if(is_file($helpfile))
		{
			$help = "Dbsync\\Help\\".ucfirst($help);
			if(!isset(self::$new[$help]) || $args)
			{
				self::$new[$help] =  new $help($args);
			}
			return self::$new[$help];
		}
		return false;
	}

	/**
	 | 获取完整URL
	 */
	public static function getFullUrl()
	{
		$requestUri = self::getRequestUrI();
		$scheme = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = strstr(strtolower($_SERVER["SERVER_PROTOCOL"]), "/",true) . $scheme;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		$_fullUrl = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $requestUri.'/';
		return $_fullUrl;
	}

	/**
	 | 获取请求URL（不包含基础URL，包含文件夹路径）
	 */
	public static function getRequestUrI()
	{
		$requestUri = '';
		if (isset($_SERVER['REQUEST_URI'])) {
			$requestUri = $_SERVER['REQUEST_URI']; //$_SERVER["REQUEST_URI"] apache
		} else {
			if (isset($_SERVER['argv'])) {
				$requestUri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
			} elseif (isset($_SERVER['QUERY_STRING'])) {
				$requestUri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
			}
		}
		return $requestUri;
	}

	/**
	 | 获取真实请求URL（不包含文件夹路径）
	 */
	public static function getRealRequestUrI()
	{
		$realRequestUri = self::getRequestUrI();
		$currentPath = $_SERVER['PHP_SELF'];
		$pathInfo = pathinfo($currentPath);
		$realRequestUri = substr($realRequestUri, strlen($pathInfo['dirname']));
		//$realRequestUri = ltrim($realRequestUri, $pathInfo['dirname']);
		//$realRequestUri = substr(0,1,$realRequestUri)=='/'
		return $realRequestUri;
	}

	/**
	 | 获取基础URL
	 */
	public static function baseUrl($uri='')
	{
		$currentPath = $_SERVER['PHP_SELF'];
		$pathInfo = pathinfo($currentPath);
		$hostName = $_SERVER['HTTP_HOST'];
		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://' ? 'https://' : 'http://';
		$url = $protocol.$hostName.($pathInfo['dirname'] != "\\"?$pathInfo['dirname']:"");
		return $uri ? $url."/".$uri : $url;
	}

	/**
	 | 获取session
	 | $key session键名
	 | $type session类别['common','front','backend','other']
	 */
	public static function session($key, $type = 'common')
	{
		return self::help('session')->get($key, $type);
	}

	private static function sessionStart()
	{
		/* session star */
		$session = self::help('session');
		$sessiondir = BP.DS.'var'.DS.'session'.DS;
		$session->init($sessiondir);
		$session->dir(SESSIONDIR);
		$session->start(SESSION_TIME);

		if(ds\Libs\Http::isBackend() && !$session->getBackend('backend'))
		{
			$session->set(['backend'=>true],'backend');
		}
	}

	/**
	 | 记录日志
	 | $content 	日志内容
	 | $filename    日志名
	 | $type    	日志类型 {NOTICE INFO ERROR WARING OTHER}
	 */
	public static function log($content, $filename='', $type='INFO')
	{
		$file = self::help('file');
		$dir = BP.DS.'var'.DS.'logs'.DS.date('Y-m-d').DS;
		if(!is_dir($dir))
		{
			$file->makeDir($dir);
		}
		$filename = $filename ? $filename : 'main.log';
		$content = '===  '.strftime("%Y-%m-%d %H:%M:%S").'  ['.strtoupper($type).']  ===   '.$content."\n\r";
		$file->create($dir.$filename, $content, 'a');
		return True;
	}

	/**
	 | 实例化Libs中的类
	 | $mod 模块名
	 */
	public static function Lib($lib, $param='')
	{
		if($lib && is_file(BP . DS . "libs" . DS . strtolower($lib) .".php"))
		{
			$model = "Dbsync\\Libs\\".$lib;
			if(class_exists($model))
			{
				if(!isset(self::$new[$model]) || $param)
				{

					self::$new[$model] = new $model($param);
				}
				return self::$new[$model];
			}
		}
		return false;
	}

	public static function __callStatic($name, $arguments) 
    {
        return (isset($arguments) && $arguments) ? self::Lib($name, $arguments[0]) : self::Lib($name, $arguments);
    }
}