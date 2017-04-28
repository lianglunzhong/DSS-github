<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'order_payments';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'orders_orderpayments';

$match = [
	'id' 		=> 'id',
	'order_id'		=> 'order_id',
	'customer_id'	=> 'customer_id',
	'payment_method'	=> 'payment_method',
	'trans_id'	=> 'trans_id',
	'amount'	=> 'amount',
	'currency'	=> 'currency',
	'comment'	=> 'comment',
	// 'cache'	=> 'cache',
	'payment_status'	=> 'payment_status',
	'ip'	=> 'ip',
	'created'	=> 'created',
	'first_name'	=> 'first_name',
	'last_name'	=> 'last_name',
	'email'	=> 'email',
	'address'	=> 'address',
	'city'	=> 'city',
	'state'	=> 'state',
	'country'	=> 'country',
	'zip'	=> 'zip',
	'phone'	=> 'phone',
	'vip_status'	=> 'vip_status',
];

