<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.3';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'products';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_product';

$match = [
	'id' 		=> 'id',
	'erp_item_id'	 => 'erp_item_id',
	'name'  => 'name',
	'sku'  => 'sku',
	'link'  => 'link',
	'price'  => 'price',
	'market_price'  => 'market_price',
	'cost'  => 'cost',
	'total_cost'  => 'total_cost',
	'weight'  => 'weight',
	// 'size'  => 'size',
	'stock'  => 'stock',
	'brief'  => 'brief',
	'description'  => 'description',
	'created'  => 'created',
	'updated'  => 'updated',
	'display_date'  => 'display_date',
	'meta_title'  => 'meta_title',
	'meta_keywords'  => 'meta_keywords',
	'meta_description'  => 'meta_description',
	'set_id'  => 'set_id',
	'type'  => 'type',
	'visibility'  => 'visibility',
	'status'  => 'status',
	// 'items'  => 'items',
	'configs'  => 'configs',
	'keywords'  => 'keywords',
	'factory'  => 'factory',
	'attributes'  => 'attributes',
	'offline_factory'  => 'offline_factory',
	'offline_sku'  => 'offline_sku',
	'taobao_url'  => 'taobao_url',
	'presell'  => 'presell',
	'presell_message'  => 'presell_message',
	'filter_attributes'  => 'filter_attributes',
	'hits'  => 'hits',
	'admin'  => 'admin_id',
	'position'  => 'position',
	'source'  => 'source',
	'offline_picker'  => 'offline_picker_id',
	'extra_fee'  => 'extra_fee',
	'cn_name'  => 'cn_name',
	'store'  => 'store',
	'brand_id'  => 'brand_id',
	'has_pick'  => 'has_pick',
	'add_times'  => 'add_times',
	'default_catalog'  => 'default_catalog',
];

