<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'banners';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'banners_banner';

$match = [
	'id' 		=> 'id',
	'link'		=> 'link',
	'image'	=> 'image',
	'map'	=> 'map',
	'type'	=> 'type',
	'alt'	=> 'alt',
	'title'	=> 'title',
	'visibility'	=> 'visibility',
	'position'	=> 'position',
	'lang'	=> 'lang',
	'linkarray'	=> 'linkarray',
];

