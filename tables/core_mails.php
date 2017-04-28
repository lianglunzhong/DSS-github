<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'mails';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_mails';

$match = [
	'id' 		=> 'id',
	'type_id'		=> 'type_id',
	'title'	=> 'title',
	'template'	=> 'template',
	'is_active'	=> 'is_active',
	'created_at'	=> 'created',
	'updated_at'	=> 'updated',
	'type'	=> 'type',
	'lang'	=> 'lang',
];

