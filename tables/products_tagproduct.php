<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'tag_product';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_tagproduct';

$match = [
	'id' 		=> 'id',
	'tag_id'		=> 'tag_id',
	'product_id'	=> 'product_id',
	'position'	=> 'position',
];

