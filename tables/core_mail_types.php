<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'mail_types';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_mail_types';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'created_at'	=> 'created',
	'updated_at'	=> 'updated',
];

