<?
//新增留言
	session_start();
	$ID = $_SESSION["loginMember"];
	$Subject = $_GET['class'];
	include("myaqli_obj_connMyaql.php");

	if(isset($_POST['action'])&&($_POST['action'] == 'add')){
		//留言不能空白
		if($_POST['Mess'] == ''){
			$message = "留言不能空白";
			echo  "<script> alert('$message');</script>";
		}
		else{
			$sql_query = "INSERT INTO message (ID,class,mess) VALUES (?,?,?)";
			$stmt = $db_link->prepare($sql_query);
			$stmt->bind_param("iss",$ID,$Subject,$_POST['Mess']);
			if($stmt->execute()){
				$stmt->close();
				$db_link->close();
				$message = "新增成功";
				echo  "<script> alert('$message'); location.href='message.php?class={$_GET["class"]}';</script>";
			}
			else{
				die('新增失敗');
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
	  <script src="jquery-ui-1.11.3/external/jquery/jquery.js"></script>
	  <style>
	  	body{
	            font-family:"微軟正黑體";
	        }    
	        h1{
	            margin-top: 10px;
	            margin-bottom: 20px;
	        }
	        span{
	        	font-size: 30px;
	        }
	        .inputMess{
				margin-top: -35px;
	        }
	        select{
	        	margin-right: 145px;
	        }
	        .buttons{
	        	float: right;
	        }
	        .TextArea{
	        	margin-left: -60px;
	        }
	        .red{
	        	color:red;
	        }

	    </style>
</head>
<body>
	<div class="container">
	    <div class="text-center">
	        <h1>新增留言(<? echo $Subject?>)</h1>

	    </div>
		
		 <form method="GET"  onchange="submit()">
		 	<div class="text-right">
			 	<select name="class" class = "select btn btn-outline-dark"  >
			<option value="選擇課程">選擇課程</option>
			<?	$sql_course = "SELECT * FROM course";
  				$all_course = $db_link -> query($sql_course);
  				while($row_course = $all_course->fetch_assoc()){ ?>
					<? echo "<option value={$row_course['subject']}>".$row_course['subject']."</option>"; ?>
			<? } ?>
		</select>
			</div>
		 </form>

		 <form  method="POST" class="inputMess">
		 	<div class="text-center" >
			 	<div>
			 		<span id="input">輸入留言</span>
			 		
			 	</div>
			 	<TextArea class="TextArea" Cols="150" Rows="25" name="Mess"></TextArea>
			</div>
			<div class="buttons">
			 	<input type="hidden" name="action" value = "add">
			 	<input class='btn border btn-outline-success' type="submit" name="btnSMT" value = "新增">
			 	<?  echo "<a  class='btn border text-left btn-outline-danger' href='message.php?class={$Subject}'>"."取消"."</a>" ?> 
			 	<!-- <? //echo $_GET['class'];?>
				<a href="message.php?class="<? //echo $_GET['class']; ?>"></a>  -->
		 	</div>
		 </form>
	</div>
</body>
</html>