<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'promotions';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'carts_promotions';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'brief'	=> 'brief',
	'filter'	=> 'filter',
	'actions'	=> 'actions',
	'args'	=> 'args',
	'is_active'	=> 'is_active',
	'is_view'	=> 'is_view',
	'from_date'	=> 'from_date',
	'to_date'	=> 'to_date',
	'order'	=> 'order',  //sql关键字
	'created'	=> 'created',
	'admin'	=> 'admin_id',
];

