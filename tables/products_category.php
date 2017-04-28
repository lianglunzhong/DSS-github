<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.6';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'catalogs';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'products_category';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'link'	=> 'link',
	'parent_id'	 => 'parent_id',
	'description'	=> 'description',
	'meta_title' => 'meta_title',
	'meta_keywords'	=> 'meta_keywords',
	'meta_description'	=> 'meta_description',
	'brief'	=> 'brief',
	'image_src'	=> 'image_src',
	'pimage_src'	=> 'pimage_src',
	'image_link'	=> 'image_link',
	'image_alt'	=> 'image_alt',
	'on_menu'	=> 'on_menu',
	'visibility'	=> 'visibility',
	'stereotyped'	=> 'stereotyped',
	'template'	=> 'template',
	'is_filter'	=> 'is_filter',
	'orderby'	=> 'orderby',
	'desc'	=> 'desc',        //sql关键字
	'price_ranges'	=> 'price_ranges',
	'recommended_products'	=> 'recommended_products',
	'is_brand'	=> 'is_brand',
	'hot_catalog'	=> 'hot_catalog',
	'position'	=> 'position',
];

