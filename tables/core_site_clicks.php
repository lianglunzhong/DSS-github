<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'site_clicks';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_site_clicks';

$match = [
	'id' 		=> 'id',
	'day'		=> 'day',
	'add_to_cart'	=> 'add_to_cart',
	'cart_view'	=> 'cart_view',
	'continue'	=> 'continues',  //sql 关键字
	'checkout'	=> 'checkout',
	'ppec'	=> 'ppec',
	'cart_login'	=> 'cart_login',
	'cart_checkout'	=> 'cart_checkout',
	'proceed'	=> 'proceed',
	'globebill'	=> 'globebill',
	'ppjump'	=> 'ppjump',
	'card_pay'	=> 'card_pay',
	'log'	=> 'log',
	'cart_to_cookie'	=> 'cart_to_cookie',
	'cookie_to_cart'	=> 'cookie_to_cart',
	'card_return'	=> 'card_return',
];

