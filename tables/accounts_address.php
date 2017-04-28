<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'addresses';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_address';

$match = [
	'id' 		=> 'id',
	'customer_id'		=> 'customer_id',
	'firstname'	=> 'firstname',
	'lastname'	=> 'lastname',
	'address'	=> 'address',
	'city'	=> 'city',
	'zip'	=> 'zip',
	'state'	=> 'state',
	'country'	=> 'country',
	'phone'	=> 'phone',
	'is_default'	=> 'is_default',
];

