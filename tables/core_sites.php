<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.2';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'sites';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_sites';

$match = [
	'id' 		=> 'id',
	'robots'		=> 'robots',
	'line_id'	=> 'line_id',
	'domain'	=> 'domain',
	'email'	=> 'email',
	'is_active'	=> 'is_active',
	'meta_title'	=> 'meta_title',
	'meta_keywords'	=> 'meta_keywords',
	'meta_description'	=> 'meta_description',
	'route_type'	=> 'route_type',
	'product'	=> 'product',
	'catalog'	=> 'catalog',
	'promotion'	=> 'promotion',
	'suffix'	=> 'suffix',
	'stat_code'	=> 'stat_code',
	'per_page'	=> 'per_page',
	'forum_moderators'	=> 'forum_moderators',
	'currency'	=> 'currency',
	'ssl'	=> 'ssl',   //sql 关键字
	'cc_payment_id'	=> 'cc_payment_id',
	'cc_secure_code'	=> 'cc_secure_code',
	'cc_payment_url'	=> 'cc_payment_url',
	'pp_payment_id'	=> 'pp_payment_id',
	'pp_tiny_payment_id'	=> 'pp_tiny_payment_id',
	'pp_payment_url'	=> 'pp_payment_url',
	'pp_submit_url'	=> 'pp_submit_url',
	'pp_notify_url'	=> 'pp_notify_url',
	'pp_return_url'	=> 'pp_return_url',
	'pp_cancel_return_url'	=> 'pp_cancel_return_url',
	'pp_logo_url'	=> 'pp_logo_url',
	'pp_api_version'	=> 'pp_api_version',
	'pp_api_user'	=> 'pp_api_user',
	'pp_api_pwd'	=> 'pp_api_pwd',
	'pp_api_signa'	=> 'pp_api_signa',
	'pp_ec_notify_url'	=> 'pp_ec_notify_url',
	'pp_ec_return_url'	=> 'pp_ec_return_url',
	'lang'	=> 'lang',
	'pp_sync_url'	=> 'pp_sync_url',
	'erp_enabled'	=> 'erp_enabled',
	'ticket_center'	=> 'ticket_center',
	'fb_login'	=> 'fb_login',
	'fb_api_id'	=> 'fb_api_id',
	'fb_api_secret'	=> 'fb_api_secret',
	'is_pay_insite'	=> 'is_pay_insite',
	'promotion_coupon'	=> 'promotion_coupon',
	// 'continue'	=> 'continue',    //sql 关键字
	'checkout'	=> 'checkout',
	'ppec'	=> 'ppec',
	'ppjump'	=> 'ppjump',
	'globebill'	=> 'globebill',
	'elastic_host'	=> 'elastic_host',
];

