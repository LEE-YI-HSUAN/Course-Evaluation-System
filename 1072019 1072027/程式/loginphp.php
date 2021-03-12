<?

	session_start();
	function getSQLValue($value,$type){
		switch ($type) {
			case "int":
				$value=($value!="")?filter_var($value,FILTER_SANITIZE_NUMBER_INT):"";
				break;
		}
		return $value;
	}
	//未登入
	if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]=="")){
		//帳號、密碼皆有輸入
		if(isset($_POST["ID"])&&isset($_POST["password"])){
			require_once('connMysql.php');
			$sql_query="SELECT * FROM member";
			$all_result = $db_link -> query($sql_query);
			while($row_result = $all_result->fetch_assoc()) {
				$id = getSQLValue($_POST['ID'],"int");
				$pw = $row_result["password"];
				if($row_result["ID"] == $id  && (password_verify($_POST["password"], $pw))){
					if($row_result["administrator"] == 1){
						//管理員
						$_SESSION["loginMember"] = $id;
						$_SESSION["admin"] = 1;
						$message="Hello！".$row_result["name"]."管理員";
						$db_link->close();
						echo "<script>alert('$message'); location.href='adm_index.php?admin=1';</script>";
						break;
					}else{
						//echo "成功<br>";
						$_SESSION["loginMember"] = $id;
						$_SESSION["admin"] = 0;
						$message="Hello！".$row_result["name"];
						$db_link->close();
						echo "<script>alert('$message');location.href='index1.php?admin=0';</script>";
					}
					
				}			
			}
			//查詢不到
			if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]=="")){
				$message="登入失敗！！";
				$db_link->close();
			 	echo "<script>alert('$message');history.go(-1)</script>";
			}
		}
	}
?>