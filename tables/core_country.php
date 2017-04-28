<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'countries';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_country';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'position'	=> 'position',
	'brief'	=> 'brief',
	'is_active'	=> 'is_active',
	'isocode'	=> 'isocode',
	'country_id'	=> 'number',
];

