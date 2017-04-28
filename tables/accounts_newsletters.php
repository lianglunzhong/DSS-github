<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'newsletters';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_newsletters';

$match = [
	'id' 		=> 'id',
	'email'		=> 'email',
	'created'	=> 'created',
	'active'	=> 'active',
	'firstname'	=> 'firstname',
	'lastname'	=> 'lastname',
	'gender'	=> 'gender',
	'zip'	=> 'zip',
	'occupation'	=> 'occupation',
	'birthday'	=> 'birthday',
	'country'	=> 'country',
];

