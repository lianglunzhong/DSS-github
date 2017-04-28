<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.0';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'orders';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'orders_order';

$match = [
	'id' 	=> 'id',
	'parent_id'	 => 'parent_id',
	'erp_header_id'  => 'erp_header_id',
	'erp_customer_id'  => 'erp_customer_id',
	'erp_fee_line_id'  => 'erp_fee_line_id',
	'erp_otherfee_line_id'  => 'erp_otherfee_line_id',
	'erp_ship_line_id'  => 'erp_ship_line_id',
	'email'  => 'email',
	'customer_id'  => 'customer_id',
	'ordernum'  => 'ordernum',
	'products'  => 'products',
	'amount_products'  => 'amount_products',
	'amount_shipping'  => 'amount_shipping',
	'amount_order'  => 'amount_order',
	'coupon_code'  => 'coupon_code',
	'amount_coupon'  => 'amount_coupon',
	'amount_point'  => 'amount_point',
	'amount_drop_shipping'  => 'amount_drop_shipping',
	'amount'  => 'amount',
	'amount_refund'  => 'amount_refund',
	'currency'  => 'currency',
	'rate'  => 'rate',
	'amount_payment'  => 'amount_payment',
	'currency_payment'  => 'currency_payment',
	'rate_payment'  => 'rate_payment',
	'payment_status'  => 'payment_status',
	'transaction_id'  => 'transaction_id',
	'payment_date'  => 'payment_date',
	'verify_date'  => 'verify_date',
	'shipping_status'  => 'shipping_status',
	'shipping_method'  => 'shipping_method',
	'shipping_weight'  => 'shipping_weight',
	'shipping_code'  => 'shipping_code',
	'shipping_url'  => 'shipping_url',
	'shipping_comment'  => 'shipping_comment',
	'shipping_date'  => 'shipping_date',
	'created'  => 'created',
	'updated'  => 'updated',
	'ip'  => 'ip',
	'flag'  => 'flag',
	'shipping_firstname'  => 'shipping_firstname',
	'shipping_lastname'  => 'shipping_lastname',
	'shipping_country'  => 'shipping_country',
	'shipping_state'  => 'shipping_state',
	'shipping_city'  => 'shipping_city',
	'shipping_address'  => 'shipping_address',
	'shipping_zip'  => 'shipping_zip',
	'shipping_phone'  => 'shipping_phone',
	'shipping_mobile'  => 'shipping_mobile',
	'shipping_cpf'  => 'shipping_cpf',
	'billing_firstname'  => 'billing_firstname',
	'billing_lastname'  => 'billing_lastname',
	'billing_country'  => 'billing_country',
	'billing_state'  => 'billing_state',
	'billing_city'  => 'billing_city',
	'billing_address'  => 'billing_address',
	'billing_zip'  => 'billing_zip',
	'billing_phone'  => 'billing_phone',
	'billing_mobile'  => 'billing_mobile',
	'lang'  => 'lang',
	'refund_status'  => 'refund_status',
	'payment_method'  => 'payment_method',
	'cc_num'  => 'cc_num',
	'cc_type'  => 'cc_type',
	'cc_cvv'  => 'cc_cvv',
	'cc_exp_month'  => 'cc_exp_month',
	'cc_exp_year'  => 'cc_exp_year',
	'cc_issue'  => 'cc_issue',
	'cc_valid_month'  => 'cc_valid_month',
	'cc_valid_year'  => 'cc_valid_year',
	'promotions'  => 'promotions',
	'largesses'  => 'largesses',
	'drop_shipping'  => 'drop_shipping',
	'payment_count'  => 'payment_count',
	'points'  => 'points',
	'affiliate_id'  => 'affiliate_id',
	'is_active'  => 'is_active',
	'is_marked'  => 'is_marked',
	'referrer'  => 'referrer',
	'deliver_time'  => 'deliver_time',
	'is_verified'  => 'is_verified',
	'is_pre_order'  => 'is_pre_order',
	'email_status'  => 'email_status',
	'order_from'  => 'order_from',
	'unprint_mail_flg'  => 'unprint_mail_flg',
	'order_print_time'  => 'order_print_time',
	'order_remark'  => 'order_remark',
	'logistics_days'  => 'logistics_days',
	'order_insurance'  => 'order_insurance',
	'facebook_cpc'  => 'facebook_cpc',
	'source_league'  => 'source_league',
];

