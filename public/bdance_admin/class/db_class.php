<?PHP
/**
 *	�s�u����
 *	dbConnectRead()
 *	�j�M���
 *	dbSelect($sql,$arr_input)
 *	�s�W���
 *	dbInsert($sql,$arr_input)
 *	�ק���
 *	dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value)
 *	�R�����
 *	dbDelete($sql,$sql_where_condition,$sql_where_value)
 *	�M����ƪ���
 *	dbTruncateTable($sql_table)
 *
 *	$sql > SQL�y�k
 *	$arr_input > �}�C�����A�����ѼơC �Ϊk: $arr_input['���W��'] = ����
 *	$sql_where_condition	>	where�᭱������C �Ϊk: $sql_where_condition = 'no = ?';
 *	$sql_where_value		>	�}�C�Φ��Awhere�᭱���ѼơC �Ϊk: $sql_where_value = array($no);
 *	���ѼƨϥΧ��Цh��unset()�M���ѼơA�H�K�z�Z��U�@���ϥΡC
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
	
	//�غc�l For PHP5
	function __construct()
	{
	}

	//�w�q�ѫغc�l
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

	//����
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
			die("��Ʈw�s�u����");
		}
		//�ŧi��Ʈw�榡
		$conn->set_charset("utf8");
		$this->connect = $conn;
		$this->connect_link = 1;
		return $this->connect;
	}
	
	//�s�u����
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
	
	//�����s�u
	public function connect_close()
	{
		if($this->connect_link == 1)
		{
			mysqli_close($this->connect);
		}
	}
	
	//�j�M���
	public function dbSelect($sql,$arr_input)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//�ŧi��Ʈw�榡
		$conn->set_charset("utf8");
		
		//�j�M�}�C�r�꭫�s��}�C
		if(isset($arr_input))
		{
			$arr_value[] = true;
			foreach($arr_input as $key => $value)
			{
				$arr_value[] = ($value == '0')? '0':$value;
			}
		}	

		//���s�Ƨ� WHERE �����e 
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

		//����SQL
		$result = $conn->query($sql_new);
		$result_num = $conn->affected_rows;
		
		if ($result->num_rows > 0)
		{
			$sql_TableName = explode('FROM',$sql);
			$sql_TableName = explode('WHERE',$sql_TableName[1]);
			$sql_TableName = explode('ORDER',$sql_TableName[0]);
			$sql_TableName = explode('LIMIT',$sql_TableName[0]);
			
			//���W��
			/*
			$result_TableName = $conn->query('describe '.$sql_TableName[0].';');
			while($row = $result_TableName->fetch_assoc()) 
			{
				$TableName[] = $row["Field"];
			}
			*/
			
			//���e��}�C
			while($row = $result->fetch_assoc()) 
			{
				//reset($TableName); //���YŪ��
				unset($NowValue);
				//���W��
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
	
	//�s�W���
	public function dbInsert($sql,$arr_input)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//�ŧi��Ʈw�榡
		$conn->set_charset("utf8");
		

		if(count($arr_input) > 0)
		{
			//���W��
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
			
			//����SQL
			$new_sql = $sql." (".$key_name.") VALUES (".$key_value.");";
			$execution_sql = $conn->query($new_sql);
			if($execution_sql > 0)
			{
				$sql_TableName = explode('INTO',$sql);
				//PK auto value
				// $res = $conn->query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '".trim($sql_TableName[1])."'");
				$res = $conn->query("SHOW TABLE STATUS FROM ".$this->db_table_name." LIKE '".trim($sql_TableName[1])."'");
				$auto_increment = $res->fetch_assoc();
				//now auto_increment value
				$auto_incriement_value = $auto_increment['Rows'];
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
	
	//�ק���
	public function dbUpdate($sql,$arr_input,$sql_where_condition,$sql_where_value)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//�ŧi��Ʈw�榡
		$conn->set_charset("utf8");
		
		
		if(count($arr_input) > 0)
		{
			//���W��
			$arr_key = array_keys($arr_input);
			//���s�Ƨ� SET �����e
			$sql_set = '';
			for($i = 0;$i < count($arr_input);$i++)
			{
				if($i > 0)
				{
					$sql_set .= ',';
				}
				$sql_set .= $arr_key[$i]." = '".addslashes($arr_input[$arr_key[$i]])."'";
			}
			
			//���s�Ƨ� WHERE �����e 
			$sql_where = "";
			for($i = 0;$i < count($sql_where_condition);$i++)
			{
				$sql_where .= $sql_where_condition[$i] . " = '".$sql_where_value[($i)]."'";
			}
			
			//����SQL
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
	
	//�R�����
	public function dbDelete($sql,$sql_where_condition,$sql_where_value)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//�ŧi��Ʈw�榡
		$conn->set_charset("utf8");
		
		
		//���s�Ƨ� WHERE �����e 
		$arr_sql_where = explode('?',$sql_where_condition);
		$sql_where = $arr_sql_where[0];
		for($i = 0;$i < count($sql_where_value);$i++)
		{
			$sql_where .= "'".$sql_where_value[($i)]."'";
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
	
	//�M����ƪ���
	public function dbTruncateTable($sql_table)
	{
		$conn = new mysqli($this->db_server_name, $this->db_set_acc, $this->db_set_pw, $this->db_table_name);

		//�ŧi��Ʈw�榡
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