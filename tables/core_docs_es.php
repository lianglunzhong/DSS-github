<?php

/**
 * 当前数据表版本号
 */
$version = '1.1.1';

/**
 * 来源数据库，数据表
 */
$source_database = DB_NAME;
$source_table = 'docs_es';

/**
 * 目标数据库，数据表
 */
$target_database = TARGET_DB_NAME;
$target_table = 'core_docs_es';

$match = [
	'id' 		=> 'id',
	'name'		=> 'name',
	'link'	=> 'link',
	'order'	=> 'order',  //sql 关键字
	'is_active'	=> 'is_active',
	'content'	=> 'content',
	'meta_title'	=> 'meta_title',
	'meta_keywords'	=> 'meta_keywords',
	'meta_description'	=> 'meta_description',
];

