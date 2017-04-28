<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.3';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'catalog_products';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_categoryproduct';

$match = [
	'id' 		=> 'id',
	'catalog_id'	=> 'category_id',
	'product_id'	=> 'product_id',
	'position'	=> 'position',
	'positiontwo'	=> 'positiontwo',
];

