<?php
/**
 | 安装数据库同步系统
 | @author 2016-09-21 By Peng.lu
 */

use Dbsync\Libs\DS;

include_once '../bridge.php';

echo is_file(BP.DS.'sql'.DS.'lock') ? "<h3>Upgrading... </h3>" : "<h3>Installing... </h3>";

$sql = [];
$fileClass = DS::Help('file');
$sql_files = $fileClass->read(BP.DS.'sql');
sort($sql_files);
// $db = DS::Db('customers')->count();
$lock = json_decode($fileClass->get(BP.DS.'sql'.DS.'lock'), true);
$lastest_version = $lock['version'] ? $lock['version'] : 'v0.0.0';
echo "<h3>Current version: $lastest_version&nbsp;&nbsp;";
foreach ($sql_files as $sql_file)
{
	if($fileClass->name($sql_file) != 'lock' && version_compare($fileClass->name($sql_file, '.php'), $lastest_version, '>'))
	{
		$lastest_version = $fileClass->name($sql_file, '.php');
		include_once $sql_file;
	}
}
echo "Lastest version: $lastest_version</h3>";
$install_num = 0;
foreach ($sql as $_key => $_sql)
{
	
	try {
		if(!DS::Db()->exec($_sql)->result()->query)
		{
			echo "<span style='color:red !important;'>Error</span>: $_key=><br>".$_sql."<br>";
		}
		else
		{
			echo "<span style='color:green !important;'>Success</span>: ".$_key."<br>";
			$install_num++;
		}
	} catch (PDOException $e) {
		echo "<span style='color:red !important;'>Error</span>: $_key=><br>".$e->getMessage()."<br>";
	}
	ob_flush();
	flush();
	sleep(1);
}

$lock = json_encode([
	'version' => $lastest_version,
	'date'    => date('Y-m-d H:i:s'),
]);
$fileClass->create(BP.DS.'sql'.DS.'lock', $lock);

echo $install_num == 0 ? "<h3>Is the latest version</h3>" : ($install_num == count($sql) ? "<h3 style='color:green !important;'>Successed!!!</h3>" : "<h3 style='color: !important;'>Failed</h3>");