<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'cpromotions';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'carts_cpromotions';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'conditions'	=> 'conditions',
	'brief'	=> 'brief',
	'actions'	=> 'actions',
	'is_active'	=> 'is_active',
	'from_date'	=> 'from_date',
	'to_date'	=> 'to_date',
	'priority'	=> 'priority',
	'stop_further_rules'	=> 'stop_further_rules',
	'restrictions'	=> 'restrictions',
	'admin'	=> 'admin_id',
	'celebrity_avoid'	=> 'celebrity_avoid',
	'es'	=> 'es',
	'de'	=> 'de',
	'fr'	=> 'fr',
];

