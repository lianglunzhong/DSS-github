<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'mail_logs';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_mail_logs';

$match = [
	'id' 		=> 'id',
	'type'		=> 'type',
	'table'	=> 'table',    //sql 关键字
	'table_id'	=> 'table_id',
	'email'	=> 'email',
	'status'	=> 'status',
	'send_date'	=> 'send_date',
];

