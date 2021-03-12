<?
	header("Content-Type:text/html;charset=utf-8");
	function getSQLValue($value,$type){
		switch ($type) {
			case "string":
				$value=($value!="")?filter_var($value,FILTER_SANITIZE_ADD_SLASHES):"";
				break;
			case "int":
				$value=($value!="")?filter_var($value,FILTER_SANITIZE_NUMBER_INT):"";
				break;
		}
		return $value;
	}
	if(isset($_POST['action'])&&$_POST['action']=='join'){
		$name=$_POST['name'];
		$id=$_POST['ID'];
		$Password=$_POST['password'];
		echo $name."<br>".$id."<br>".$Password."<br>";
		require_once("connMysql.php");
		//判斷是否可以註冊成功
		$query_RecFindUser="SELECT ID FROM member WHERE ID='{$_POST["ID"]}'";
		$RecFindUser=$db_link->query($query_RecFindUser);
		if($name==null){header("Location:register.php?errMsg=3");}
		else if(strlen($name)>30){header("Location:register.php?errMsg=7");}
		else if($id==null){header("Location:register.php?errMsg=4");}
		else if($id<1000000||$id>=10000000){header("Location:register.php?errMsg=6");}//學號範圍
		else if($Password==null){header("Location:register.php?errMsg=5");}
		else if(strlen($Password)>10){header("Location:register.php?errMsg=8");}
		else if($RecFindUser->num_rows>0){
			header("Location:register.php?errMsg=1");//&username={$_POST["ID"]}
			//echo "<script> alert('註冊失敗\n此帳號已被註冊');location.href='register.php';</script>";
		}
		else if($Password!=$_POST['check_password'])
		{
			header("Location:register.php?errMsg=2");
			//echo "<script> alert('註冊失敗\n密碼與確認密碼不相符');location.href='register.php';</script>";
		}
		//如果上面的條件都通過的話
		else{
			include('connMysql.php');
			$sql_query="INSERT INTO member (ID,name,sex,college,grade,password,administrator) VALUES (?,?,?,?,?,?,?)";
			$f=false;
			$stmt=$db_link->prepare($sql_query);
			echo password_hash($Password, PASSWORD_DEFAULT);
			$stmt->bind_param("isssssi",
				getSQLValue($id,"int"),
				getSQLValue($name,"string"),
				getSQLValue($_POST['sex'],"string"),
				getSQLValue($_POST['college'],"string"),
				getSQLValue($_POST['grade'],"string"),
				password_hash($Password, PASSWORD_DEFAULT),
				$f
				);
			// bind_param('issssss',$_POST['ID'],$_POST['name'],$_POST['sex'],$_POST['college'],$_POST['grade'],$_POST['password'],$f);
				$stmt->execute();
				$stmt->close();
				$db_link->close();
				
				//echo "<script> alert('註冊成功');location.href='register.php';</script>";
			 }
			 header("Location:register.php?loginStatus=1");
		}
	
?>