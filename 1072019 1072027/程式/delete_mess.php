<?
	//刪除留言
	include("myaqli_obj_connMyaql.php");
	//echo "delete_mess";
	if(isset($_POST['action'])&&($_POST['action'] == 'delete')){
		//$sql_delete = "SELECT * FROM message WHERE cID=?";
		$stmt= $db_link->prepare("SELECT * FROM message WHERE cID=?");
		$stmt->bind_param("i",$_POST['cID']);
		$stmt->execute();
		$result = $stmt->get_result();
		$num = $result -> num_rows;

		if($num == 0){
			$stmt->close();
			$db_link->close();
			$message = "沒有這則留言";
			echo  "<script> alert('$message'); history.go(-2);</script>";
		}
		else{
			$sql_delete = "DELETE FROM message WHERE cID=?";
			$stmt_delete= $db_link->prepare($sql_delete);
			$stmt_delete->bind_param("i",$_POST['cID']);
			$stmt_delete->execute();
			$stmt_delete->close();
			$db_link->close();
			$message = "刪除成功";
			echo  "<script> alert('$message'); history.go(-2);</script>";
		}

		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
        body{
            font-family:"微軟正黑體";
        }    
        h1{
            margin-top: 10px;
        }
        input{
        	margin-left: 20px;
        	margin-top: 15px;
        }
        span{
        	margin-left: 15px;
        }
        .border{
        	font-size: 20px;
        	padding-bottom: 15px;
        	width:55%;
        	margin-left: 20%;
        	margin-top: 30px;
        }
    </style>
</head>
<body>
	<form method="POST">
		<div class="container">
	        <div class="text-center">
	            <h1>刪除留言</h1>
	        </div>
	        <div class="border">
				<span>輸入要刪除的留言編號(cID)</span>
		        <input type="text" name="cID">
				<input type="hidden" name="action" value="delete">
				<input type="submit" name="btnSMT" value="刪除">
			</div>
	    </div>
	</form>
</body>
</html>