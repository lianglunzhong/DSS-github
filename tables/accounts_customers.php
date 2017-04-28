<?php

/**
 * 当前数据表版本号
 */
$version = '1.2.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'customers';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'accounts_customers';

$match = [
	'id' 		=> 'id',
	'email'		=> 'email',
	'firstname'	=> 'firstname',
	'lastname'	=> 'lastname',
	'birthday'	=> 'birthday',
	'status'	=> 'status',
	'gender'	=> 'gender',
	'points'	=> 'points',
	'order_total'	=> 'order_total',
	'is_facebook'	=> 'is_facebook',
	'ip'		=> 'ip',
	'vip_level'	=> 'vip_level',
	'last_login_time'	=> 'last_login_time',
	'last_login_ip'	=> 'last_login_ip',
	'lang'		=> 'lang',
	'ppec_status'	=> 'ppec_status',
	'flag' 		=> 'flag',
	'is_vip'	=> 'is_vip',
	'vip_start'	=> 'vip_start',
	'vip_end'	=> 'vip_end',
	'created'	=> 'created',
	'users_update'	=> 'updated',
	'country'	=> 'country',
	'password'	=> 'password',
	'ip_country'	=> 'ip_country',
	'users_admin' => 'users_admin_id',
	'give_points' => 'give_points',
];

