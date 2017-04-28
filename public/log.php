<?php
/**
 | 同步数据库日志
 | @author 2016-09-22 By Peng.lu
 */

use Dbsync\Libs\DS;

include_once '../bridge.php';

if(!is_file(BP.DS.'sql'.DS.'lock'))
{
	exit("<h3>Need Install First! <a href='".DS::baseUrl('install.php')."'>Go</a></h3>");
}

/**
 | 清空日志记录
 */
function truncateLog($logs = 'all')
{
	if($logs != 'all') return;
	echo "<h3>Truncate Logs Begin...</h3><br>";
	try {
		echo DS::Db('sync_logs')->truncate()->result()->query ? "[<span style='color:green !important;'> success </span>]<br>" : "[<span style='color:red !important;'> error </span>]<br>";
	} catch (PDOException $e) {
		echo "[<span style='color:red !important;'>error</span>] => ".$e->getMessage()."<br>";
	}
	echo "<h3>Sync End</h3>";
}

$lgs = DS::Db('sync_logs')->load()->order('id', 'DESC')->result()->fetch;

$html_table = <<<TABLE
<table class="table table-striped">
<caption>Db Sync Logs&nbsp;&nbsp;&nbsp;<a style='color:red;' href='?truncate=all#r'>truncate</a></caption>
<thead><tr><th>#</th><th>Sync Date</th><th>Source Table</th><th>Target Table</th><th style='word-wrap:break-word;word-break:break-all;width:50%;'>Table Fields Match</th><th>Info</th><th>Version</th><th>Exec Time</th></tr></thead><tbody>
TABLE;
foreach ($lgs as $lg)
{
	$html_table .= "<tr><td>".$lg['id']."</td><td>".$lg['sync_date']."</td><td>".$lg['source_table']."</td><td>".$lg['target_table']."</td><td style='word-wrap:break-word;word-break:break-all;width:50%;'>".$lg['table_fields_match']."</td><td>".$lg['info']."</td><td>".$lg['version']."</td><td>".$lg['exec_time']."s</td></tr>";
}
$html_table .= <<<TABLE
</tbody></table>
<div id='r'></div>
TABLE;

echo $html_table;

if(isset($_GET['truncate']))
{ 
	truncateLog($_GET['truncate']);
}