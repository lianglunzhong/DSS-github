<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'brands';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_brands';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'label'	=> 'label',
	'brief'	=> 'brief',
];

