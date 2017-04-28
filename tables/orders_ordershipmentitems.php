<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'order_shipmentitems';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'orders_ordershipmentitems';

$match = [
	'id' 		=> 'id',
	'order_id'		=> 'order_id',
	'shipment_id'	=> 'shipment_id',
	'item_id'	=> 'item_id',
	'quantity'	=> 'quantity',
];

