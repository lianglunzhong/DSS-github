<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrity_blogs';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_celebrityblogs';

$match = [
	'id' 		=> 'id',
	'celebrity_id'		=> 'celebrity_id',
	'celebrity_email'	=> 'celebrity_email',
	'type'	=> 'type',
	'url'	=> 'url',
	'profile'	=> 'profile',
	'flow'	=> 'flow',
];

