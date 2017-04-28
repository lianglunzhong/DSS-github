<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'tokens';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_token';

$match = [
	'id' 		=> 'id',
	'customer_id'		=> 'customer_id',
	'created' => 'created',
	'token'  =>  'token',
	'site_id' => 'site_id',
];

