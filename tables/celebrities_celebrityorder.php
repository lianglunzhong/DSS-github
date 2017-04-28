<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrity_products';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_celebrityorder';

$match = [
	'id' 		=> 'id',
	'celebrity_id'		=> 'celebrity_id',
	'ordernum'	=> 'ordernum',
	'order_id'	=> 'order_id',
	'sku'	=> 'sku',
	'url'	=> 'url',
	'show_date'	=> 'show_date',
];

