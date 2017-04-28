<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'trans';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_trans';

$match = [
	'id' 		=> 'id',
	'product_id'		=> 'product_id',
	'trans_de'	=> 'trans_de',
	'trans_es'	=> 'trans_es',
	'trans_fr'	=> 'trans_fr',
];

