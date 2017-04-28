<?php
/**
 | 构建每张表的存储过程并执行
 | @author 2016-09-21 By Peng.lu
 */

use Dbsync\Libs\DS;

include_once '../bridge.php';

if(!is_file(BP.DS.'sql'.DS.'lock'))
{
	exit("<h3>Need Install First! <a href='".DS::baseUrl('install.php')."'>Go</a></h3>");
}

echo "<h3>Build... </h3>";

$fileClass = DS::Help('file');
$table_files = $fileClass->read(BP.DS.'tables');
$build_num = 0;

foreach ($table_files as $table_file)
{
	include_once $table_file;
	if(!isset($version)) 
	{
		continue;
	}
	$keys = join(',', DS::Db()->array_point(array_keys($match)));
	$vals = join(',', DS::Db()->array_point($match));
	$match = json_encode($match);

	$sql = <<<SQL
DROP PROCEDURE IF EXISTS `pr_sync_{$source_table}`;
CREATE PROCEDURE `pr_sync_{$source_table}`()
PR:BEGIN
DECLARE t_max, s_max, r_count INT(11) DEFAULT NULL;
DECLARE vs_keys, vs_values VARCHAR(4096);
DECLARE e_time INt(11);
SET FOREIGN_KEY_CHECKS=0;
SET e_time = UNIX_TIMESTAMP();
SELECT MAX(id) From {$source_database}.{$source_table} INTO s_max;
SELECT MAX(id) From {$target_database}.{$target_table} INTO t_max;
IF s_max IS NULL THEN
SET s_max = 0;
END IF;
IF t_max IS NULL THEN
SET t_max = 0;
END IF;
IF s_max > t_max THEN
INSERT INTO 
{$target_database}.{$target_table} ({$vals}) 
SELECT {$keys}
FROM
{$source_database}.{$source_table}
WHERE id > t_max;
END IF;
IF s_max > t_max THEN
SET r_count = ROW_COUNT();
INSERT INTO 
{$source_database}.sync_logs(id, source_table, target_table, table_fields_match, info, version, exec_time, sync_date ) 
VALUES(NULL, '{$source_database}.{$source_table}', '{$target_database}.{$target_table}', '{$match}', CONCAT("sync data count: ", r_count, ", Lastest ID: ",s_max), '{$version}', UNIX_TIMESTAMP()-e_time, now());
END IF;
SET FOREIGN_KEY_CHECKS=1;
END;
SQL;
	
	try {
		if(!DS::Db()->exec($sql)->result()->query)
		{
			echo "<span style='color:red;'>ERROR</span>: $_key=><br>".DS::Db()->exec($sql)->debug()."<br>";
		}
		else
		{
			$data = [
				'name'		   => 'pr_sync_'.$source_table,
				'source_table' => $source_database.'.'.$source_table,
				'target_table' => $target_database.'.'.$target_table,
				'version'	   => $version,
				'date'		   => date("Y-m-d H:i:s"),
			];
			$pr_table = DS::Db('sync_procedure')->load('pr_sync_'.$source_table, 'name')->result();
			if(!$pr_table->num)
			{
				DS::Db('sync_procedure')->insert($data);
				echo "<span style='color:green;'>Install</span>: ".strtolower($fileClass->name($table_file, '.php'))."&nbsp;&nbsp;version: $version"."<br>";
			}
			elseif(version_compare($version, $pr_table->fetch[0]['version'], '>'))
			{
				DS::Db('sync_procedure')->update($data)->where('name = :name', ['name'=>'pr_sync_'.$source_table])->result('query');
				echo "<span style='color:green;'>Upgrade</span>: ".strtolower($fileClass->name($table_file, '.php'))."&nbsp;&nbsp;version: $version"."<br>";
			}
			$build_num++;
		}
	} catch (PDOException $e) {
		echo "<span style='color:red;'>ERROR</span>: $_key=><br>".$e->getMessage()."<br>";
	}
	ob_flush();
	flush();
}

echo $build_num == count($table_files) ? "<h3 style='color:green'>Done!!!</h3>" : "<h3 style='color:red'>Failed</h3>";