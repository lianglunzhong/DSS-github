<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrity_contacted';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_celebritycontacted';

$match = [
	'id' 		=> 'id',
	'email'		=> 'email',
	'sites'	=> 'sites',
	'admin'	=> 'admin_id',
	'created'	=> 'created',
];

