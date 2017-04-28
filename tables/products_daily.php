<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'product_daily';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_daily';

$match = [
	'id' 		=> 'id',
	'day'		=> 'day',
	'product_id'	=> 'product_id',
	'clicks'	=> 'clicks',
	'quick_clicks'	=> 'quick_clicks',
	'add_times'	=> 'add_times',
	'hits'	=> 'hits',
];

