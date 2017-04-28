<?php
/**
 | 同步数据库
 | @author 2016-09-22 By Peng.lu
 | 新增调用同步存储过程函数sync
 | @author 2016-09-26 By Peng.lu
 */

use Dbsync\Libs\DS;

include_once '../bridge.php';

if(!is_file(BP.DS.'sql'.DS.'lock'))
{
	exit("<h3>Need Install First! <a href='".DS::baseUrl('install.php')."'>Go</a></h3>");
}

/**
 | 调用同步存储过程
 | $pr 存储过程名(若为all则同步所有)
 */
function sync($pr = 'all')
{
	$start = time();
	echo "<h3>Sync Begin...</h3><br>";
	$prs = $pr=='all' ? DS::Db('sync_procedure')->load()->order('id', 'DESC')->result()->fetch : [['name'=>$pr]];
	foreach ($prs as $pr)
	{
		echo $pr['name'].":&nbsp;&nbsp;......&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		ob_flush();
		flush();
		try {
			echo DS::Db()->exec("call {$pr['name']}")->result()->query ? "[<span style='color:green !important;'> success </span>]<br>" : "[<span style='color:red !important;'> error </span>]<br>";
		} catch (PDOException $e) {
			echo "[<span style='color:red !important;'>error</span>] => ".$e->getMessage()."<br>";
		}
		ob_flush();
		flush();
	}
	echo "<br><h3>Sync End, It takes ".(time()-$start)." seconds.</h3>";
}

/**
 | 卸载存储过程 
 */
function uninstall($pr = '')
{
	if(!$pr) return;
	echo "<h3>Uninstall Sync $pr ...</h3><br>";
	try {
		$target_table = DS::Db('sync_procedure')->load($pr, 'name')->result('fetch');
		if(empty($target_table))
		{ 
			echo "<h3>No Sync $pr</h3><br>";
		}
		else
		{
			$target_table = $target_table[0]['target_table'];
			echo "delete $pr:&nbsp;&nbsp;......&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo DS::Db('sync_procedure')->delete()->where('name = :name',['name'=>$pr])->result('query') ? "[<span style='color:green !important;'> success </span>]<br>" : "[<span style='color:red !important;'> error </span>]<br>";
			echo "truncate table $target_table:&nbsp;&nbsp;......&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			ob_flush();
			flush();
			$db = DS::Db();
			$db->exec("SET FOREIGN_KEY_CHECKS=0")->result();
			echo $db->exec("truncate $target_table")->result()->query ? "[<span style='color:green !important;'> success </span>]<br>" : "[<span style='color:red !important;'> error </span>]<br>";
			$db->exec("SET FOREIGN_KEY_CHECKS=1")->result();
		}
	} catch (PDOException $e) {
		echo "[<span style='color:red !important;'>error</span>] => ".$e->getMessage()."<br>";
	}
	echo "<br><h3>Uninstall Sync End</h3>";
}

$prs = DS::Db('sync_procedure')->load()->order('id', 'DESC')->result()->fetch;

$html_table = <<<TABLE
<table class="table table-striped">
<caption>Db Sync Procedures List&nbsp;&nbsp;&nbsp;<a href='?sync=all#r'>Sync All</a></caption>
<thead><tr><th>#</th><th>Name</th><th>Source Table</th><th>Target Table</th><th>Version</th><th>Date</th><th>Action</th></tr></thead><tbody>
TABLE;
foreach ($prs as $pr)
{
	$html_table .= "<tr><td>".$pr['id']."</td><td>".$pr['name']."</td><td>".$pr['source_table']."</td><td>".$pr['target_table']."</td><td>".$pr['version']."</td><td>".$pr['date']."</td><td><a href='?sync=".$pr['name']."#r'>sync</a> | <a style='color:red;' href='?uninstall=".$pr['name']."#r'>uninstall</a></td></tr>";
}
$html_table .= <<<TABLE
</tbody></table>
<div id='r'></div>
TABLE;

echo $html_table;
ob_flush();
flush();

//var_dump($prs);

if(isset($_GET['sync']))
{ 
	sync($_GET['sync']);
}
elseif(isset($_GET['uninstall']))
{
	uninstall($_GET['uninstall']);
}
