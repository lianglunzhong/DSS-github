<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'order_items';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'orders_orderitem';

$match = [
	'id' 		=> 'id',
	'erp_line_id'		=> 'erp_line_id',
	'order_id'	=> 'order_id',
	'item_id'	=> 'item_id',
	'item_id'	=> 'product_id',
	'name'	=> 'name',
	'sku'	=> 'sku',
	'link'	=> 'link',
	'price'	=> 'price',
	'original_price'	=> 'original_price',
	'cost'	=> 'cost',
	'created'	=> 'created',
	'weight'	=> 'weight',
	'quantity'	=> 'quantity',
	'key'	=> 'key',   #sql关键字
	'is_gift'	=> 'is_gift',
	'customize_type'	=> 'customize_type',
	'customize'	=> 'customize',
	'status'	=> 'status',
	'attributes'	=> 'attributes',
	'tracking_number'	=> 'tracking_number',
	'tracking_link'	=> 'tracking_link',
	'erp_line_status'	=> 'erp_line_status',
	'custom_made'	=> 'custom_made',
];

