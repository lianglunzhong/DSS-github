<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.3';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'coupons';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'carts_coupons';

$match = [
	'id' 		=> 'id',
	'code'		=> 'code',
	'value'	=> 'value',
	'item_sku'	=> 'item_sku',
	'type'	=> 'type',
	'used'	=> 'used',
	'target'	=> 'target',
	'limit'	=> 'limit',  //sql关键字
	'product_limit'	=> 'product_limit',
	'catalog_limit'	=> 'catalog_limit',
	'effective_limit'	=> 'effective_limit',
	'condition'	=> 'condition',  //sql关键字
	'created'	=> 'created',
	'expired'	=> 'expired',
	'admin'	=> 'admin_id',
	'on_show'	=> 'on_show',
	'usedfor'	=> 'usedfor',
];

