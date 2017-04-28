<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'wishlists';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_wishlists';

$match = [
	'id' 	=> 'id',
	'product_id'	  => 'product_id',
	'name'  => 'name',
	'created'  => 'created',
	'permalink'  => 'permalink',
	'thumbmail'  => 'thumbmail',
	'customer_id'  => 'customer_id',
	'product_sku'  => 'product_sku',
	'is_mailed'  => 'is_mailed',
];

