<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrity_backups';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_celebritybackups';

$match = [
	'id' 		=> 'id',
	'email'		=> 'email',
	'sites'	=> 'sites',
	'gender'	=> 'gender',
	'country'	=> 'country',
	'comment'	=> 'comment',
	'created'	=> 'created',
	'is_join'	=> 'is_join',
	'assign'	=> 'assign',
];

