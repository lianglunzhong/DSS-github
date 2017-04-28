<?php

namespace Dbsync\Libs;

class Version
{

	function __construct()
	{
	}

	/**
	 | 当前version
	 */
	public static function current()
	{
		$lock = json_decode(DS::Help('file')->get(BP.DS.'sql'.DS.'lock'), true);
		return $lock['version'] ? $lock['version'] : 'v0.0.0';
	}

	/**
	 | 最新version
	 */
	public static function lastest()
	{
		$fileClass = DS::Help('file');
		$sql_files = $fileClass->read(BP.DS.'sql');
		$lastest_version = self::current();
		foreach ($sql_files as $sql_file)
		{
			if($fileClass->name($sql_file) != 'lock' && version_compare($fileClass->name($sql_file, '.php'), $lastest_version, '>'))
			{
				$lastest_version = $fileClass->name($sql_file, '.php');
			}
		}
		return $lastest_version;
	}
}