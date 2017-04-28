<?php

namespace Dbsync\Libs;

use \PDO;

class Db
{
	/**
	 | 执行的sql语句
	 */
	public $sql;

	/**
	 | sql语句执行的结果
	 */
	public $query;

	/**
	 | 返回的数据
	 */
	public $fetch = [];

	/**
	 | 数据的数量
	 */
	public $num = 0;

	/**
	 | 表名
	 */
	public $table;

	/**
	 | 数据库连接资源
	 */
	private $dbh = null;

	/**
	 | 预处理资源
	 */
	private $prepare = null;

	/**
	 | 条件的值
	 */
	private $data = [];

	/**
	 | 是否查询（为以后的读写分离预留）
	 * @var boolean
	 */
	private $select = false;

	/**
	 | 是否长连接，默认为否
	 */
	const PERSISTENT = false;

	/**
	 | 初始化
	 | 设置表名等
	 */
	function __construct($table='')
	{
		if(USEDB)
		{
			$this->connect();
		}

		/**
		 | 设置表名
		 */
		$this->table = $table;

		/**
		 | 重置对象 
		 */
		$this->reset();
	}

	/**
	 | 连接数据库
	 */
	private function connect()
	{
		if($this->dbh)
		{
			return $this->dbh;
		}

		$dsn = DB_TYPE.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;

		try {
			if(!self::PERSISTENT)
			{
				/**
				 | 初始化一个PDO对象，就是创建了数据库连接对象$dbh
				 */
				$this->dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
			}
			else
			{
				/**
				 | 默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
				 */
				$this->dbh = new PDO($dsn, DB_USER, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => true));
			}
		//	$this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); //不显示错误
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//产生致命错误，PDOException
		//	$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);//显示警告错误，并继续执行
			
			$this->dbh->exec('set names '.DB_CODE);  

		} catch (PDOException $e) {
    		throw new \Exception("Error!: " . $e->getMessage(), 1);
		}
	}

	private function reset()
	{
		$this->sql = "";
		$this->query = "";
		$this->fetch = [];
		$this->num = 0;
		$this->last_id = '';
		$this->prepare = null;
		$this->data = [];
		$this->select = false;
	}
	
	/**
	 | 查询动作
	 | $name  需要查询的字段， string
	 | $table 表名
	 | @return $this
	 */
	public function select($name='*',$table=null)
	{
		$this->reset();
		$table = $table ? $table : $this->table;
		$this->sql .= $name != '*' ? ' SELECT '.$name.' FROM `'.$table.'` ' : ' SELECT * FROM `'.$table.'` ';
		$this->select = true;
		return $this;
	}

	/**
	 | 执行条件
	 | $where [条件查询语句，如果使用占位符则需要传入$data]
	 | $data [传入条件查询的值] array or ''
	 | @return $this
	 */
	public function where($where, $data='')
	{
		$this->sql .= ' WHERE '.$where;
		if(is_array($data) && !empty($data))
		{
			foreach ($data as $key => $value)
			{
				$this->data[':'.$key] = $value;
			}
		}
		return $this;
	}

	/**
	 | 排序条件
	 | $order 需要排序的字段名
	 | $ace 顺序，ACE or DESC
	 | @return $this
	 */
	public function order($order,$ace="ACE")
	{
		$this->sql .= ' ORDER BY '.$order.' '.$ace;
		return $this;
	}

	/**
	 | 分组条件
	 | $group 需要分组的字段名
	 | @return $this
	 */
	public function group($group)
	{
		$this->sql .= ' GROUP BY '.$group;
		return $this;
	}

	/**
	 | 限制条件
	 | $start 开始位置
	 | $limit 数量
	 | @return $this
	 */
	public function limit($start, $limit)
	{
		$this->sql .= ' LIMIT '.$start.', '.$limit;
		return $this;
	}

	/**
	 | 左连接条件
	 | $name 表名
	 | $where 连接条件，如果使用占位符则需要传入$data
	 | @return $this
	 */
	public function left($name, $where, $data='')
	{
		$this->sql .= ' LEFT JOIN '.$name.' ON '. $where;
		if(is_array($data) && !empty($data))
		{
			foreach ($data as $key => $value)
			{
				$this->data[':'.$key] = $value;
			}
		}
		return $this;
	}

	/**
	 | 右连接条件
	 | $name 表名
	 | $where 连接条件，如果使用占位符则需要传入$data
	 | @return $this
	 */
	public function right($name, $where, $data='')
	{
		$this->sql .= ' RIGHT JOIN '.$name.' ON '. $where;
		if(is_array($data) && !empty($data))
		{
			foreach ($data as $key => $value)
			{
				$this->data[':'.$key] = $value;
			}
		}
		return $this;
	}

	/**
	 | 内连接条件
	 | $name 表名
	 | $where 连接条件，如果使用占位符则需要传入$data
	 | @return $this
	 */
	public function inner($name, $where, $data='')
	{
		$this->sql .= ' INNER JOIN '.$name.' ON '. $where;
		if(is_array($data) && !empty($data))
		{
			foreach ($data as $key => $value)
			{
				$this->data[':'.$key] = $value;
			}
		}
		return $this;
	}

	/**
	 | 插入动作
	 | $array 插入的数据，字段名=>值
	 | $table 表名
	 | @return $this
	 */
	public function insert($array, $table=null)
	{
		$this->reset();
		$table = $table ? $table : $this->table;
		$keys = implode(',',$this->array_point(array_keys($array)));
		$_keys = implode(',',$this->array_point(array_keys($array),':','left'));
		$this->sql .= ' INSERT INTO `'.$table.'` ('.$keys.') VALUES ('.$_keys.')';
		foreach ($array as $key => $value)
		{
			$this->data[':'.$key] = $value;
		}
		$this->result();
		$this->last_id();
		return $this;
	}

	/**
	 | 更新动作
	 | $array 更新的数据，字段名=>值
	 | $table 表名
	 | @return $this
	 */
	public function update($array, $table=null)
	{
		$this->reset();
		$table = $table ? $table : $this->table;
		$update = array();
		foreach($array as $key => $value)
		{
			$update[$key] = "`".$key."`=:".$key;
			$this->data[':'.$key] = $value;
		}
		$update = implode(",",$update);
		$this->sql .= ' UPDATE '.'`'.$table.'` SET '.$update;
		return $this;
	}

	/**
	 | 删除动作
	 | $table 表名
	 | 可以连接where进行操作
	 | @return $this
	 */
	public function delete($table=null)
	{
		$this->reset();
		$table = $table ? $table : $this->table;
		$this->sql .= ' DELETE FROM `'.$table.'` ';
		return $this;
	}

	/**
	 | 清空表
	 | $table 表名
	 | 慎用
	 | @return $this
	 */
	public function truncate($table=null)
	{
		$this->reset();
		$table = $table ? $table : $this->table;
		$this->sql .= ' TRUNCATE TABLE `'.$table.'` ';
		return $this;
	}

	/**
	 | 执行sql
	 | @return $this
	 */
	private function query()
	{
		$this->query = $this->data ? $this->prepare->execute($this->data) : $this->prepare->execute();
		return $this;
	}

	/**
	 | 获取最新ID
	 | $id_key id字段名称
	 | $table 表名
	 | @return $this
	 */
	public function last_id($id_key='', $table='')
	{
		$id_key = $id_key ? $id_key : $this->table."_id";
		$table = $table ? $table : $this->table;
		$id = $this->dbh->lastinsertid();
		if(!$id){
		// TODO
		//	$id = mysql_fetch_array(mysql_query("SELECT `{$id_key}` FROM {$table} ORDER BY `{$id_key}` DESC LIMIT 1"));
		}
		$this->last_id = $id;
		return $this->last_id;
	}

	/**
	 | 直接执行自定义sql
	 | @return $this
	 */
	public function exec($sql)
	{
		$this->reset();
		$this->sql = $sql;
		return $this;
	}

	/**
	 | 取得查询结果
	 | $type 返回数据类型 [assoc, row, array, object]
	 | @return $this
	 */
	private function fetch($type="assoc")
	{
		if(!$this->select)
		{
			return $this;
		}
		switch($type)
		{
			case "row":
				$this->fetch = $this->prepare->fetchAll(PDO::FETCH_NUM);
				break;
			case "assoc":
				$this->fetch = $this->prepare->fetchAll(PDO::FETCH_ASSOC);
				break;
			case "array":
				$this->fetch = $this->prepare->fetchAll(PDO::FETCH_BOTH);
				break;
			case "object":
				$this->fetch = $this->prepare->fetchAll(PDO::FETCH_OBJ);
				break;
			default:
				$this->fetch = $this->prepare->fetchAll(PDO::FETCH_ASSOC);
				break;
		}
		return $this;
	}

	/**
	 | 获取num
	 | @return $this
	 */
	private function num()
	{
		if($this->fetch)
		{
			$this->num = count($this->fetch);
		}
		else
		{
			$this->num = $this->prepare->rowCount();
		}
		return $this;
	}

	/**
	 | 对数组进行加符号，默认为`
	 | $location 符号位置
	 | @return 操作后的数据
	 */
	public function array_point($array, $type = "`", $location = 'both')
	{
		$arr = array();
		foreach($array as $key=>$val)
		{
			switch ($location)
			{
				case 'both':
					$arr[$key] = $type.$val.$type;
					break;
				case 'left':
					$arr[$key] = $type.$val;
					break;
				case 'right':
					$arr[$key] = $val.$type;
					break;
				default:
					$arr[$key] = $type.$val.$type;
					break;
			}
		}
		return $arr;
	}

	/**
	 | 返回结果
	 */
	public function result($type="all",$fetch = 'assoc')
	{
		$result = "";
		if(!$this->prepare)
		{
		//	die($this->sql);
			$this->prepare = $this->dbh->prepare($this->sql);
			
			$this->query();
       		$this->fetch($fetch);
		}
		switch($type)
		{
			case "fetch":
				$result = $this->fetch;
				break;
			case "sql":
				$result = $this->sql;
				break;
			case "query":
				$result = $this->query;
				break;
			case "num":
       			$this->num();
				$result = $this->num;
				break;
			case "all":
       			$this->num();
				$result = (object)[
					'fetch'=>$this->fetch,
					'sql'  =>$this->sql,
					'query'=>$this->query,
					'num'  =>$this->num,
					];
				break;
			default:
				$this->num();
				$result = (object)[
					'fetch'=>$this->fetch,
					'sql'  =>$this->sql,
					'query'=>$this->query,
					'num'  =>$this->num,
					];
				break;
		}
		return $result;
	}

	/**
	 | 根据数据直接获取记录
	 | @return $this
	 */
    public function load($value=null, $key = null, $table = null)
    {
        $this->reset();
        $this->select = true;

        $this->table = $table ? $table : $this->table;
        if($value)
        {
       	 	$key = $key == null ? $this->table.'_id' : $key;
        	$this->sql = 'SELECT * FROM `'.$this->table.'` WHERE `'.$key.'` = :'.$key;
        	$this->data[':'.$key] = $value;        	
        }
        else
        {
        	$this->sql = 'SELECT * FROM `'.$this->table.'` ';
        }
        return $this;
    }

    /**
	 | 获取表中的记录数量
	 */
    public function count($table=null)
    {
    	$this->reset();
    	$this->select = true;
    	$this->table = $table ? $table : $this->table;
    	$this->sql = 'SELECT count(*) as "num" FROM `'.$this->table.'` ';
    	return $this->result()->fetch[0]['num'];
    }

    public function unique($key, $value, $table=null)
	{
		$num = $this->select($key,$table)->where('`'.$key.'`=:'.$key,[$key=>$value])->result('num');
		return $num == '0';
	}

	/**
	 | debug工具，查询编译前的sql语句
	 */
	public function debug()
    {
        $keys = array();
        $values = array();
        
        # build a regular expression for each parameter
        foreach ($this->data as $key=>$value)
        {
            if (is_string($key))
            {
                $keys[] = '/'.$key.'/';
            }
            else
            {
                $keys[] = '/[?]/';
            }
            
            if(is_numeric($value))
            {
                $values[] = intval($value);
            }
            else
            {
                $values[] = '"'.$value .'"';
            }
        }
        $sql = preg_replace($keys, $values, $this->sql);
        return $sql;
    }

}