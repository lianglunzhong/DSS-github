<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'point_records';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_point_records';

$match = [
	'id'  => 'id',
	'customer_id'	 => 'customer_id',
	'type'  => 'type',
	'amount'  => 'amount',
	'status'  => 'status',
	'created'  => 'created',
	'order_id'  => 'order_id',
	'user_id'  => 'admin_id',
];
