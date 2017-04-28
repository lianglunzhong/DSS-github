<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'images';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_productimage';

$match = [
	'id' 		=> 'id',
	'suffix'	=> 'suffix',
	'obj_id'	=> 'product_id',
	'image_name'	=> 'image',
	'status'	=> 'status',
	'type'	=> 'type',
];

