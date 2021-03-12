<?
	//新增課程(只有會管理員進入)
	include("myaqli_obj_connMyaql.php");
	if(isset($_POST['action'])&&($_POST['action'] == 'add')){
		if($_POST['class'] == ''){
			$db_link->close();
			$message = "不能空白";
			echo  "<script> alert('$message');location.href='add_class.php';</script>";
		}
		else{
			if($query_class="SELECT * FROM course WHERE subject='{$_POST["class"]}'");
			$all_class=$db_link->query($query_class);
			$num = $all_class-> num_rows;
			if($num == 0){
				$sql_query = "INSERT INTO course (subject) VALUES (?)";
				$stmt = $db_link->prepare($sql_query);
				$stmt->bind_param("s",$_POST['class']);
				if($stmt->execute()){
					$stmt->close();
					$db_link->close();
					$message = "新增成功";
					echo  "<script> alert('$message'); location.href='adm_index.php';</script>";
				}
				else{
					die('新增失敗');
				}
			}
			else{
				$message = "已有相同課程";
				echo  "<script> alert('$message'); </script>";
			}
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
        	width:56%;
        	margin-left: 23%;
        	margin-top: 30px;
        }
    </style>
</head>
<body>
	<form method="POST">
		<div class="container">
	        <div class="text-center">
	            <h1>新增課程</h1>
	        </div>
	        <div class="border">
				<span>輸入要新增的課程</span>
		        <input type="text" name="class">
				<input type="hidden" name="action" value="add">
				<input type="submit" name="btnSMT" value="新增">
				<a href="adm_index.php"><input type="button" name="" value="取消"></a>
			</div>
	    </div>
	</form>
</body>
</html>