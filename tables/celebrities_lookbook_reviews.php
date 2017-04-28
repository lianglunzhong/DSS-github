<?php

/**
 * 当前数据表版本号
 */
$version = '1.0.9';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'lookbook_reviews';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'celebrities_lookbook_reviews';

$match = [
	'id' 		=> 'id',
	'lookbook_id'		=> 'lookbook_id',
	'user_id'	=> 'customer_id',
	'content'	=> 'content',
	'star'	=> 'star',
	'type'	=> 'types',
	'created'	=> 'created',
];

