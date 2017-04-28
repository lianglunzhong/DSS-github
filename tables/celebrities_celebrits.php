<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'celebrits';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_celebrits';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'email'	=> 'email',
	'customer_id'	=> 'customer_id',
	'country'	=> 'country',
	'sex'	=> 'sex',
	'birthday'	=> 'birthday',
	'level'	=> 'level',
	'admin'	=> 'admin_id',
	'created'	=> 'created',
	'updated'	=> 'updated',
	'is_able'	=> 'is_able',
	'remark'	=> 'remark',
	'show_name'	=> 'show_name',
	'height'	=> 'height',
	'weight'	=> 'weight',
	'bust'	=> 'bust',
	'waist'	=> 'waist',
	'hips'	=> 'hips',
];

