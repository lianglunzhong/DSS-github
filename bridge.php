<?php
/**
 | 桥梁文件
 | @author 2016-09-21 By Peng.lu
 */

echo '<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">';
echo (isset($_COOKIE['theme']) && $_COOKIE['theme']=='light')? '<style>* {font-size:12px !important;font-weight:bold !important;outline:none !important;} a {text-decoration:underline !important;} ::-webkit-scrollbar{display:none;}</style>' : '<style>* {background:#000 !important;color:#fff !important;font-size:12px !important;font-weight:bold !important;outline:none !important;} a {text-decoration:underline !important;} ::-webkit-scrollbar{display:none;}</style>';
$js = <<<JS
<script>
function getCookie(name){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}
function changeTheme()
{
	var darkStyle = '* {background:#000 !important;color:#fff !important;font-size:12px !important;font-weight:bold !important;outline:none !important;} a {text-decoration:underline !important;} ::-webkit-scrollbar{display:none;}';
	var lightStyle = '* {font-size:12px !important;font-weight:bold !important;outline:none !important;} a {text-decoration:underline !important;} ::-webkit-scrollbar{display:none;}';
	document.cookie='theme='+(getCookie('theme')=='light'?'dark':'light');
	document.getElementsByTagName('style')[0].innerHTML = getCookie('theme')=='light'?lightStyle:darkStyle;
}
</script>
JS;
echo $js;
if (version_compare(phpversion(), '5.4.0', '<')===true)
	exit("<div style='margin:200px auto;text-align:left;display:table;'><h1>Sorrt,<br>The php version is low, please upgrade first.</h1></div>");

set_time_limit(0);
ini_set('date.timezone','Asia/Shanghai');
define('DS', DIRECTORY_SEPARATOR); /* /or\ */
define('BP', dirname(__FILE__));

/**
 | includes configuration file
 */

$dsconfig = BP.DS."includes".DS."config.php";

if(is_file($dsconfig))
	include_once $dsconfig;
else
	die("<div style='margin:200px auto;text-align:left;display:table;'><h1>Sorrt,<br>".$dsconfig." is not exist.</h1></div>");

/**
 | includes bootstrap file
 */
$dsbootstrap = BP.DS."libs".DS."bootstrap.php";

if(is_file($dsbootstrap))
	include_once $dsbootstrap;
else
	die("<div style='margin:200px auto;text-align:left;display:table;'><h1>Sorrt,<br>".$dsbootstrap." is not exist.</h1></div>");

if(DEBUG)
	error_reporting(E_ALL | E_STRICT);
else
	error_reporting(0);

$version = Dbsync\Libs\DS::Version()->current();
$lastest_version = Dbsync\Libs\DS::Version()->lastest();
$version_type = VERSION_TYPE;

$header_html = <<<STR
<div class="jumbotron">
	<h1 style='font-size:36px !important;'>Welcome to Old-Driver Database Sync System! <small> ___For CHoies </small></h1>
	<p style='border-bottom:1px solid;padding:1em 2em 1em 0;display:inline-block;'>
STR;
$header_html .= $lastest_version!=$version ? "Current Version: $version,&nbsp;&nbsp; Lastest Version: $lastest_version,&nbsp;&nbsp;[ $version_type ],&nbsp;&nbsp;<span style='color:red;'>Please upgrade first !!!</span>&nbsp;&nbsp;By Peng.Lu&nbsp;&nbsp;&nbsp;&nbsp;" : "Current Version: $version,&nbsp;&nbsp;[ $version_type ],&nbsp;&nbsp;By Peng.Lu&nbsp;&nbsp;&nbsp;&nbsp;";
$header_html .= <<<STR
		<button class="btn btn-default btn-xs" onclick='changeTheme(this)'>change theme</button>
	</p>
	<p>
	<a class="btn btn-default" href="index.php" role="button">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-default" href="install.php" role="button">Install / Upgrade</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-default" href="build.php" role="button">Build Procedures</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-default" href="sync.php" role="button">Sync Or View Sync List</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="btn btn-default" href="log.php" role="button">View Sync Logs</a>
	</p>
</div>
STR;
echo $header_html;
ob_flush();
flush();