<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.3';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'vip_types';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_vip_types';

$match = [
	'id' 		=> 'id',
	'level'		=> 'level',
	'condition'	=> 'condition',    //sql 关键字
	'limit'	=> 'limit',   //sql 关键字
	'unit'	=> 'unit',
	'discount'	=> 'discount',
	'return'	=> 'returns',   //sql 关键字
	'brief'	=> 'brief',
];

