<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'spromotions';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'carts_spromotions';

$match = [
	'id' 		=> 'id',
	'product_id'		=> 'product_id',
	'price'	=> 'price',
	'type'	=> 'type',
	'created'	=> 'created',
	'expired'	=> 'expired',
	'admin'	=> 'admin_id',
	'position'	=> 'position',  //sql 关键字
];

