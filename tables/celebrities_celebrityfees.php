<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrity_fees';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_celebrityfees';

$match = [
	'id' 		=> 'id',
	'celebrity_id'		=> 'celebrity_id',
	'email'	=> 'email',
	'fee'	=> 'fee',
	'currency'	=> 'currency',
	'pp_account'	=> 'pp_account',
	'for'	=> 'what_for',   //for sql关键字
	'admin'	=> 'admin_id',
	'created'	=> 'created',
];

