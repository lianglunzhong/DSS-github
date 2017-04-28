<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.4';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'cartproduct';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'carts_cartitem';

$match = [
	'id' 		=> 'id',
	'customer_id'		=> 'customer_id',
	'qty'	=> 'qty',
	'attribute'	=> 'key',
	'created'	=> 'created',
	'is_cart'	=> 'is_cart',
	// 'item_id'	=> 'variant_id',
	'item_id'	=> 'item_id',
];

