<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'marks';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_marks';

$match = [
	'id' 		=> 'id',
	'catalog_id'		=> 'category_id',
	'product_id'	=> 'product_id',
	'mark_id'	=> 'mark_id',
	'mark_name'	=> 'mark_name',
	'created'	=> 'created',
	'sku'	=> 'sku',
];

