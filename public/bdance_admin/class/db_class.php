<?PHP
/**
 *	連線測試
 *	dbConnectRead()
 *	搜尋資料
 *	dbSelect($sql,$arr_input)
 *	新增資料
 *	dbInsert($sql,$arr_input)
 *	修改資料
 *	dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value)
 *	刪除資料
 *	dbDelete($sql,$sql_where_condition,$sql_where_value)
 *	清除資料表資料
 *	dbTruncateTable($sql_table)
 *
 *	$sql > SQL語法
 *	$arr_input > 陣列型式，中間參數。 用法: $arr_input['欄位名稱'] = 欄位值
 *	$sql_where_condition	>	where後面的條件。 用法: $sql_where_condition = 'no = ?';
 *	$sql_where_value		>	陣列形式，where後面的參數。 用法: $sql_where_value = array($no);
 *	※參數使用完請多用unset()清除參數，以免干擾到下一次使用。
**/

class DB
{
	public $db_server_name = DB_SERVER_NAME;
	public $db_set_acc = DB_SET_ACC;
	public $db_set_pw = DB_SET_PW;
	public $db_table_name = DB_TABLE_NAME;
	public $debug = false;
	public $connect_link = 0;
	public $connect;
	
	//建構子 For PHP5
	function __construct()
	{
	}

	//定義解建構子
	function __destruct()
	{
		/*
		if($this->debug === true)
		{
			ini_set("display_errors", "On");
		}
		else
		{
			ini_set("display_errors", "Off");
		}
		*/
	}	

	//偵錯
	public function debug()
	{
		ini_set("display_errors", "On");
		$this->debug = true;
	}
	
	public function dbConnent()
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);
		if ($conn->connect_error)
		{
			die("資料庫連線失敗");
		}
		//宣告資料庫格式
		$conn->set_charset("utf8");
		$this->connect = $conn;
		$this->connect_link = 1;
		return $this->connect;
	}
	
	//連線測試
	public function dbConnectRead()
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);
		//$conn = $this->connect;
		
		if ($conn->connect_error)
		{
			die("Connection failed: ".$conn->connect_error."<BR><BR>");
			exit();
		}
		echo "Connected successfully<BR>";
	}
	
	//關閉連線
	public function connect_close()
	{
		if($this->connect_link == 1)
		{
			mysqli_close($this->connect);
		}
	}
	
	//搜尋資料
	public function dbSelect($sql,$arr_input)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//宣告資料庫格式
		$conn->set_charset("utf8");
		
		//搜尋陣列字串重新轉陣列
		if(isset($arr_input))
		{
			$arr_value[] = true;
			foreach($arr_input as $key => $value)
			{
				$arr_value[] = ($value == '0')? '0':$value;
			}
		}	

		//重新排序 WHERE 的內容 
		$arr_sql_where = explode('?',$sql);
		$sql_new = '';
		for($i = 0;$i < count($arr_sql_where);$i++)
		{
			$sql_new .= $arr_sql_where[$i];
			if($arr_value[($i + 1)] != '')
			{
				if (preg_match("/LIKE/i", $arr_sql_where[$i]))
				{
					$sql_new .= "'%".$arr_value[($i + 1)]."%'";
				}
				else 
				{
					$sql_new .= "'".$arr_value[($i + 1)]."'";
				}
			}
		}

		//執行SQL
		$result = $conn->query($sql_new);
		$result_num = $conn->affected_rows;
		
		if ($result->num_rows > 0)
		{
			$sql_TableName = explode('FROM',$sql);
			$sql_TableName = explode('WHERE',$sql_TableName[1]);
			$sql_TableName = explode('ORDER',$sql_TableName[0]);
			$sql_TableName = explode('LIMIT',$sql_TableName[0]);
			
			//欄位名稱
			/*
			$result_TableName = $conn->query('describe '.$sql_TableName[0].';');
			while($row = $result_TableName->fetch_assoc()) 
			{
				$TableName[] = $row["Field"];
			}
			*/
			
			//內容轉陣列
			while($row = $result->fetch_assoc()) 
			{
				//reset($TableName); //重頭讀取
				unset($NowValue);
				//欄位名稱
				$TableName = array_keys($row);
				for($i = 0;$i < count($row);$i++)
				{
					$NowValue[$TableName[$i]] = stripslashes($row[$TableName[$i]]);
				}
				$response[] = $NowValue;
			}
		}
		else
		{
			//echo "No data";
			$response = array();
		}

		//debug
		if($this->debug == true)
		{
			echo 'SQL : '.$sql.'<br>';
			if($conn->error != '')
			{
				echo 'Error : '.$conn->error.'<BR>';
			}
			echo '<pre>';
			var_dump($arr_value);
			echo '</pre>';
			if($conn->error != '')
			{
				exit();
			}
		}
		
		$conn->close();
		
		return $response;
		
	}
	
	//新增資料
	public function dbInsert($sql,$arr_input)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//宣告資料庫格式
		$conn->set_charset("utf8");
		

		if(count($arr_input) > 0)
		{
			//欄位名稱
			$arr_key = array_keys($arr_input);
			$key_name = '';
			$key_value = '';
			for($i = 0;$i < count($arr_input);$i++)
			{
				if($i > 0)
				{
					$key_name .= ',';
					$key_value .= ',';
				}
				$key_name .= $arr_key[$i];
				$key_value .= "'".addslashes($arr_input[$arr_key[$i]])."'";
			}
			
			//執行SQL
			$new_sql = $sql." (".$key_name.") VALUES (".$key_value.");";
			$execution_sql = $conn->query($new_sql);
			if($execution_sql > 0)
			{
				$sql_TableName = explode('INTO',$sql);
				//PK auto value
				$res = $conn->query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '".trim($sql_TableName[1])."'");
				//$res = $conn->query("SHOW TABLE STATUS FROM ".$this->db_table_name." LIKE '".trim($sql_TableName[1])."'");
				$auto_increment = $res->fetch_assoc();
				//now auto_increment value
				$auto_incriement_value = $auto_increment['auto_increment'] - 1;
			}
			else
			{
				$auto_incriement_value = 0;
			}
			
			if($this->debug == true)
			{
				echo 'SQL : '.$new_sql.'<br>';
				if ($execution_sql === true)
				{
					echo 'New record created successfully<br>';
				}
				else
				{
					if($conn->error != '')
					{
						echo 'Error : '.$conn->error.'<BR>';
					}
					echo '<pre>';
					var_dump($arr_input);
					echo '</pre>';
					if($conn->error != '')
					{
						exit();
					}
				}
			}
		}
		$conn->close();
		return $auto_incriement_value;
	}
	
	//修改資料
	public function dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//宣告資料庫格式
		$conn->set_charset("utf8");
		
		
		if(count($arr_input) > 0)
		{
			//欄位名稱
			$arr_key = array_keys($arr_input);
			//重新排序 SET 的內容
			$sql_set = '';
			for($i = 0;$i < count($arr_input);$i++)
			{
				if($i > 0)
				{
					$sql_set .= ',';
				}
				$sql_set .= $arr_key[$i]." = '".addslashes($arr_input[$arr_key[$i]])."'";
			}
			
			//重新排序 WHERE 的內容 
			$sql_where = "";
			for($i = 0;$i < count($sql_where_condition);$i++)
			{
				$sql_where .= $sql_where_condition[$i] . " = '".$sql_where_value[($i)]."'";
			}
			
			//執行SQL
			$new_sql = $sql." SET ".$sql_set." WHERE ".$sql_where.";";
			$execution_sql = $conn->query($new_sql);
			$result_num = $conn->affected_rows;
			
			if($this->debug == true)
			{
				echo 'SQL : '.$new_sql.'<br>';
				if ($execution_sql === true)
				{
					echo 'Record updated successfully<br>';
				}
				else
				{
					if($conn->error != '')
					{
						echo 'Error : '.$conn->error.'<BR>';
					}
					echo '<pre>';
					var_dump($arr_input);
					echo '</pre>';
					if($conn->error != '')
					{
						exit();
					}
				}
			}
		}
		$conn->close();
		return $result_num;
	}
	
	//刪除資料
	public function dbDelete($sql,$sql_where_condition,$sql_where_value)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//宣告資料庫格式
		$conn->set_charset("utf8");
		
		
		//重新排序 WHERE 的內容 
		$sql_where = "";
		for($i = 0;$i < count($sql_where_condition);$i++)
		{
			$sql_where .= $sql_where_condition[$i] . " = '".$sql_where_value[($i)]."'";
		}
		
		$new_sql = $sql." WHERE ".$sql_where.";";
		$execution_sql = $conn->query($new_sql);
		$result_num = $conn->affected_rows;
		
		if($this->debug == true)
		{
			echo 'SQL : '.$new_sql.'<br>';
			if ($execution_sql === true)
			{
				echo 'Record Delete successfully';
			}
			else
			{
				if($conn->error != '')
				{
					echo 'Error : '.$conn->error.'<BR>';
				}
				if($conn->error != '')
				{
					exit();
				}
			}
		}
		$conn->close();
		return $result_num;
	}
	
	//清除資料表資料
	public function dbTruncateTable($sql_table)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//宣告資料庫格式
		$conn->set_charset("utf8");
		
		
		$new_sql = "TRUNCATE TABLE ".$sql_table.";";
		$execution_sql = $conn->query($new_sql);
		
		if($this->debug == true)
		{
			echo 'SQL : '.$new_sql.'<br>';
			if ($execution_sql === true)
			{
				echo 'TRUNCATE TABLE successfully';
			}
			else
			{
				if($conn->error != '')
				{
					echo 'Error : '.$conn->error.'<BR>';
				}
				if($conn->error != '')
				{
					exit();
				}
			}
		}
		return $execution_sql;
	}
}
?>