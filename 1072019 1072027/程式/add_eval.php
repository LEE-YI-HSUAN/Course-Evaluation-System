<?
//新增或修改評價
	session_start();
	$ID = $_SESSION["loginMember"];
	$Subject = $_GET['class'];
	include("myaqli_obj_connMyaql.php");

	//判斷目前登入帳號是否有填寫過該科評價
	if($sql_check_id =$db_link-> prepare("SELECT ID,class,recommend,astronomical,HWpressure, midterm,finalterm,supplement FROM evaluation WHERE class = ? AND ID = ?")){
		$sql_check_id -> bind_param('si',$Subject,$ID);
		$sql_check_id -> execute();
		$result = $sql_check_id->get_result();
		$num = $result -> num_rows;
		//echo $num;
		$recommend;
		$astronomical;
		$HWpressure;
		$midterm;
		$finalterm;
		$supplement;

		while($r = $result->fetch_assoc()){
			$recommend = $r['recommend'];
			$astronomical = $r['astronomical'];
			$HWpressure = $r['HWpressure'];
			$midterm = $r['midterm'];
			$finalterm= $r['finalterm'];
			$supplement = $r['supplement'];
		}
		$sql_check_id->close();
	}
		
	$err = 0;
	if(isset($_POST['action'])&&($_POST['action'] == 'add')){
		//判斷表單是否有填寫錯誤
		if(!(isset($_POST['recommend'])) || $_POST['recommend'] == ''){
			$err = 1;
		}
		else if(!(isset($_POST['astronomical'])) || $_POST['astronomical']=='')
		{
			$err = 2;
		}
		else if(!(isset($_POST['HWpressure'])) || $_POST['HWpressure']=='')
		{
			$err = 3;
		}
		else if(!($_POST['recommend']<= 5 && $_POST['recommend'] >= 1)){
			$err=4;
		}
		else if(!($_POST['astronomical']<= 5 && $_POST['astronomical'] >= 1)){
			$err=5;
		}
		else if(!($_POST['HWpressure']<= 5 && $_POST['HWpressure'] >= 1)){
			$err=6;
		}
		//都填寫正確並沒填寫過->新增
		else if($num == 0){
			if($_POST['supplement'] = ' '){
				$_POST['supplement']=NULL;
			}
			$sql_query = "INSERT INTO evaluation (ID,class,recommend,astronomical,HWpressure,midterm,finalterm,supplement) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $db_link->prepare($sql_query);
			$stmt->bind_param("isiiisss",$ID,$Subject,
				$_POST['recommend'],$_POST['astronomical'],
				$_POST['HWpressure'],$_POST['midterm'],
				$_POST['finalterm'],$_POST['supplement']);
			if($stmt->execute()){
				$stmt->close();
				$db_link->close();
				$message = "新增成功";
				echo  "<script> alert('$message'); location.href='message.php?class={$_GET["class"]}';</script>";
			}
			else{
				die("新增失敗");
			}
		}
		////都填寫正確並填寫過->修改
		else{
			if($_POST['supplement'] = ' '){
				$_POST['supplement']=NULL;
			}
			$sql_change = "UPDATE evaluation SET recommend=?, astronomical=?, HWpressure=?, midterm=?, finalterm=?, supplement=? WHERE class=? AND ID=?";
			$stmt = $db_link->prepare($sql_change);
			$stmt->bind_param("iiissssi",$_POST['recommend'],$_POST['astronomical'],
									$_POST['HWpressure'],$_POST['midterm'],$_POST['finalterm'],
									$_POST['supplement'],$Subject,$ID);
			$stmt-> execute();
			$stmt-> close();
			$db_link-> close();

			$message = "修改成功";
			echo  "<script> alert('$message'); location.href='message.php?class={$_GET["class"]}';</script>";
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
		        margin-bottom: 20px;
		     }
		    .col-form-label{
		    	font-size: 25px;
		    	margin-top: -10px;
		    	width: 100px;
		    }
		    .form-group{
		    	margin-top: 20px;
		    	margin-left: 15%;
		    }
		    .border{
		    	margin-top: 20px;
		    	padding:5px;
		    	width: 50%;
		    	margin-left: 24%;
		    }
		    .form-control{
		    	margin-left: 60px;
		    }
		    span{
		    	color: red;
		    	margin-top: 4px;
		    	font-size: 20px;
		    	margin-left: -5px;
		    }
		    .button{
		        float: right;
		        width: 100px;
		        margin-left: 10px;
		    }
		    .err{
				color: red;
				margin-left: 55px;
				margin-top: 5px;
				margin-bottom: -15px;
		    }
	   </style>
</head>
<body>
	<div class="container">
	    <div class="text-center">
	        <h1>新增評價(<? echo $Subject?>)</h1>
	    </div>
		
		 <form method="GET"  onchange="submit()">

		 	<div class="text-center" >
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
		<form method="POST" class="border text-center">
			<p style="color: red;">有*的為必填項目</p>
			<div class="form-group row">
				<span>*</span>
				<label for="eval_recommend" class="col-form-label">推薦指數</label>
				<div class="col-sm-5">
					<input type="text" id="recom" class="form-control" name="recommend" id = "recommend" placeholder="最低1分，最高5分" value="<? if($num != 0){echo $recommend;}?>">
					
				</div>
			</div>
			<div class="form-group row">
				<span>*</span>
				<label for="eval_astronomical" class="col-form-label">天文指數</label>
				<div class="col-sm-5">
					<input type="text" id="astr" class="form-control" name="astronomical" id = "astronomical" placeholder="最低1分，最高5分" value="<? if($num != 0){echo 
						$astronomical;}?>">
				</div>
			</div>
			<div class="form-group row">
				<span>*</span>
				<label for="eval_HWpressure" class="col-form-label">作業壓力</label>
				<div class="col-sm-5">
					<input type="text" id="HWpress" class="form-control" name="HWpressure" id = "HWpressure" placeholder="最低1分，最高5分" value="<? if($num != 0){echo $HWpressure;}?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="eval_HWpressure" class="col-form-label">期中評分</label>
				<div class="col-sm-5">
					<select name="midterm"class="btn form-control btn-outline-secondary">
						<? if($num!=0){ ?>
							<option value="考試" <? if($midterm == '考試'){ ?>
								selected <? } ?> >考試</option>
							<option value="個人專題" <? if($midterm == '個人專題'){ ?>
								selected <? } ?>>個人專題</option>
							<option value="團體專題" <? if($midterm == '團體專題'){ ?>
								selected <? } ?>>團體專題</option>
							<option value="個人報告" <? if($midterm == '個人報告'){ ?>
								selected <? } ?>>個人報告</option>
							<option value="團體報告" <? if($midterm == '團體報告'){ ?>
								selected <? } ?>>團體報告</option>
							<option value="其他" <? if($midterm == '其他'){ ?>
								selected <? } ?>>其他</option>
						<? } else { ?>
							<option value="考試">考試</option>
							<option value="個人專題">個人專題</option>
							<option value="團體專題">團體專題</option>
							<option value="個人報告">個人報告</option>
							<option value="團體報告">團體報告</option>
							<option value="其他">其他</option>
						<? } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="eval_HWpressure" class="col-form-label">期末評分</label>
				<div class="col-sm-5">
					<select name="finalterm"class="btn form-control btn-outline-secondary">
							<? if($num!=0){ ?>
							<option value="考試" <? if($finalterm == '考試'){ ?>
								selected <? } ?> >考試</option>
							<option value="個人專題" <? if($finalterm == '個人專題'){ ?>
								selected <? } ?>>個人專題</option>
							<option value="團體專題" <? if($finalterm == '團體專題'){ ?>
								selected <? } ?>>團體專題</option>
							<option value="個人報告" <? if($finalterm == '個人報告'){ ?>
								selected <? } ?>>個人報告</option>
							<option value="團體報告" <? if($finalterm == '團體報告'){ ?>
								selected <? } ?>>團體報告</option>
							<option value="其他" <? if($finalterm == '其他'){ ?>
								selected <? } ?>>其他</option>
						<? } else { ?>
							<option value="考試">考試</option>
							<option value="個人專題">個人專題</option>
							<option value="團體專題">團體專題</option>
							<option value="個人報告">個人報告</option>
							<option value="團體報告">團體報告</option>
							<option value="其他">其他</option>
						<? } ?>
					</select>
				</div>
			</div>
				
			<div class="form-group row">
				<label for="eval_HWpressure" class="col-form-label">補充</label>
				<div class="col-sm-5">
					<TextArea class="TextArea" Cols="30" Rows="5" name="supplement">
						<? if($num!=0){ 
							 echo nl2br($supplement); 
							} ?>
					</TextArea>
				</div>
			</div>
			<div class="form-group row" style="margin-left: 300px;"> 
					<input type="hidden" name="action" value = "add">
				 	<input class='btn border btn-outline-success button' type="submit" name="btnSMT" value = "<? if($num!=0){echo '修改評價'; }else{echo '新增評價';} ?>">
				 	<?  if($num!=0){
				 			echo "<a  class='btn border text-left btn-outline-danger text-center button' href='message.php?class={$Subject}'>"."放棄修改"."</a>";
				 		} else{
				 			echo "<a  class='btn border text-left btn-outline-danger text-center button' href='message.php?class={$Subject}'>"."放棄評價"."</a>";
				 		} ?>
			</div> 
		</form>
		
	</div>
</body>
<? if($err == 1){ ?>
	 <script>
		$('#recom').after('<p class="err">*此為必填項目</p>');
	</script> 
<? }else if($err == 2){ ?>
	<script>
		$('#astr').after('<p class="err">*此為必填項目</p>');
	</script> 
<? }else if($err == 3){ ?>
	<script>
		$('#HWpress').after('<p class="err">*此為必填項目</p>');
	</script> 
<?}else if($err == 4){ ?>
	<script>
		$('#recom').after('<p class="err">*只能填1-5</p>');
	</script> 
<?}else if($err == 5){ ?>
	<script>
		$('#astr').after('<p class="err">*只能填1-5</p>');
	</script> 
<?}else if($err == 6){ ?>
	<script>
		$('#HWpress').after('<p class="err">*只能填1-5</p>');
	</script> 
<?}?>
</html>