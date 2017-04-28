<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'point_payments';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_point_payments';

$match = [
	'id' 		=> 'id',
	'customer_id'		=> 'customer_id',
	'order_id'	=> 'order_id',
	'order_date'	=> 'order_date',
	'order_num'	=> 'order_num',
	'note'	=> 'note',
	'created'	=> 'created',
	'amount'	=> 'amount',
];

