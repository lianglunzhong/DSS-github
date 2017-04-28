<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'order_shipments';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'orders_ordershipments';

$match = [
	'id' 		=> 'id',
	'admin_id'		=> 'admin_id',
	'order_id'	=> 'order_id',
	'ordernum'	=> 'ordernum',
	'carrier'	=> 'carrier',
	'tracking_code'	=> 'tracking_code',
	'tracking_link'	=> 'tracking_link',
	'ship_price'	=> 'ship_price',
	'ship_date'	=> 'ship_date',
	'created'	=> 'created',
	'actual_weight'	=> 'actual_weight',
	'is_error'	=> 'is_error',
	// 'search_time'	=> 'search_time',
	'package_id'	=> 'package_id',
];

