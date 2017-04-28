<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrity_images';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_celebrityimages';

$match = [
	'id' 		=> 'id',
	'product_id'	=> 'product_id',
	'image'	=> 'image',
	'position'	=> 'position',
	'admin'	=> 'admin_id',
	'created'	=> 'created',
	'type'	=> 'type',
	'link_sku'	=> 'link_sku',
	'celebrits_id'	=> 'celebrity_id',
	'is_show'	=> 'is_show',
];

