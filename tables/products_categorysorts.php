<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'catalog_sorts';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_categorysorts';

$match = [
	'id' 		=> 'id',
	'catalog_id'		=> 'category_id',
	'sort'	=> 'sort',
	'attributes'	=> 'attributes',
];


