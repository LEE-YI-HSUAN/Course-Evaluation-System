<?
	//顯示各個課程平均評價、留言及其他案鈕(不管是否登入都可看到)
	session_start();

	//header("Conten-Type: text/html; charset=utf-8");
	include("myaqli_obj_connMyaql.php");
	//判斷哪一個課程
	$Subject = $_GET['class'];
	if(isset($_GET['class'])){
		$Subject = $_GET['class'];
	}
	if(isset($_SESSION['admin'])){
		if($_SESSION['admin'] == 1)
		header("Location:adm_mess.php?class=".$_GET['class']);
	}

	//一頁十筆資料
	$pageRow_records = 10;
	//現在在第幾頁
	$num_pages = 1;
	//如果有選擇頁數，進入並更改目前頁數
	if(isset($_GET['page'])){
		$num_pages = $_GET['page'];
	}
	$startRow_records = ($num_pages -1) * $pageRow_records;
	//照到該科的所有留言，並依cID排序
	$sql_query = "SELECT * FROM message WHERE class='{$Subject}' ORDER BY cID DESC";
    $query_limit_RecBoard = $sql_query." LIMIT {$startRow_records}, {$pageRow_records}";
    $RecMess = $db_link->query($query_limit_RecBoard);
    $all_result = $db_link -> query($sql_query);
    $total_records = $all_result->num_rows;
	$total_pages = ceil($total_records/$pageRow_records);
   
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
		* {
			font-family:"微軟正黑體";
		}
		img.sex {
			width:25px;
		}
		span {
			font-size: 10px;
		}
		img.smIcon {
			border: 0;
			width: 16px;
		}
		.top{
			margin-bottom: 20px;
		}
		.border {
    		border: 1px solid gray!important;
		}
		.select{
			/*color: black;*/
			padding: 6px 10px;
			margin-right: 15px;
			border-radius: .25rem;
		}
		.select option{
			/*color: black;*/
		}
		.fontSize{
			font-size: 20px;
		}
		.fontSize span{
			font-size: 18px;
		}
		.readMores{
			margin-left: 90%;
			margin-bottom: 10px;
		}
		.font-weight-bolder span{
			font-size: 40px;
		}
		.evaluation_title{
			margin-top: 10px;
		}
		.college_img{
			width:50px;
		}
		#star{
			width: 30px;
			margin-top: -5px;
		}
	</style>
</head>
<body>
	<!-- 選擇課程 -->
	<div class="col-sm text-right" style="padding: 12px 13%">
		<form method="GET" onchange="submit()">
		<select name="class" class = "select btn btn-outline-dark"  >
			<option value="選擇課程">選擇課程</option>
			<?	//顯示所有課程
				$sql_course = "SELECT * FROM course";
  				$all_course = $db_link -> query($sql_course);
  				while($row_course = $all_course->fetch_assoc()){ ?>
					<? echo "<option value={$row_course['subject']}>".$row_course['subject']."</option>"; ?>
			<? } ?>
		</select>
		<? //判斷是否有登入，依登入狀態顯示button資訊
			if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]=="")){?>
			<a class="btn btn-outline-danger" href="register.php" role="button">註冊</a>
			<a class="btn btn-outline-danger" href="login.php" role="button">登入</a>
		<? } else{ ?>
			<a class="btn btn-outline-danger" href="signOut.php" role="button">登出</a>
		<? } ?>
		<a class="btn btn-outline-info" href="index1.php">回首頁</a>
	</div>
	<!-- 課程評價 -->
	<div class="container border border-secondary rounded top">
		<div class="col-sm">
			<h1 class="font-weight-bolder text-center evaluation_title">
				<span><?echo $Subject?></span>課程評價</h1>
		</div>
		<div class="text-center fontSize">
			<?	//依課程條件算出各項平均
				if($stmt = $db_link->prepare("SELECT AVG(recommend) FROM evaluation WHERE class = ?")){
					$stmt->bind_param("s",$Subject);
					$stmt->execute();
					$stmt->bind_result($col1);
					while($stmt->fetch()){
						$num = floor($col1*10)/10;
						echo "<p>推薦程度 : <span>".$num."</span>顆星</p>";
						//echo $col1."<br>";
					}
					$stmt->close();
				}
				
				if($stmt = $db_link->prepare("SELECT AVG(astronomical) FROM evaluation WHERE class = ?")){
					$stmt->bind_param("s",$Subject);
					$stmt->execute();
					$stmt->bind_result($col1);
					while($stmt->fetch()){
						$num = floor($col1*10)/10;
						echo "<p>天文指數 : <span>".$num."</span>顆星</p>";
						//echo $col1."<br>";
					}
					$stmt->close();
				}

				if($stmt = $db_link->prepare("SELECT AVG(HWpressure) FROM evaluation WHERE class = ?")){
					$stmt->bind_param("s",$Subject);
					$stmt->execute();
					$stmt->bind_result($col1);
					while($stmt->fetch()){
						$num = floor($col1*10)/10;
						echo "<p>作業壓力 : <span>".$num."</span>顆星</p>";
						//echo $col1."<br>";
					}
					$stmt->close();
				}

				?>
			<!-- <p>推薦程度 : <span>5</span>顆星</p> -->
			<!-- <p>課程甜度 : <span>5</span>顆星</p> -->
			<!-- <p>作業壓力 : <span>5</span>顆星</p> -->
		</div>
		<div class="row">
			<div class="col-sm text-right" style="padding: 12px 15px">
				<a class="btn btn-outline-info" href="eval_post.php?class=<? echo $Subject ?>" role="button">我要評價</a>
				<? echo "<a class='btn btn-outline-success' href='evaluation_more.php?class={$Subject}' role='button'>看詳細評價</a>" ?>
			</div>
		</div>
	</div>
	<? //echo "<a class='btn btn-outline-success readMores' href='evaluation_more.php?class={$Subject}' role='button'>看更多評價</a>" ?>
	<!-- 課程留言 -->
	<div class="container border border-secondary rounded top">

		<div class="row">
			<div class="col-sm">
				<h1 class="font-weight-bolder text-center evaluation_title">留言版</h1>
			</div>
		</div> 
		 
		<div class="row">
			<div class="col-sm text-right" style="padding: 12px 15px">
				<a class="btn btn-outline-info" href="mess_post.php?class=<? echo $Subject ?>" role="button">我要留言</a>
			</div>
		</div>

			<? 
				while($row_result = $RecMess->fetch_assoc()){ 
					//依ID判斷並進入member資料表中得到留言者資訊
					$id = $row_result['ID'];
					if($stmt = $db_link->prepare("SELECT name,sex,grade,college FROM member WHERE ID = ?")){
					 	$stmt->bind_param("i",$id);
					 	$stmt->execute();
					 	$stmt->bind_result($col1,$col2,$col3,$col4);
					 	while($stmt->fetch()){ ?>
							<div class="row">
								<div class="col-sm">
									<div class="card border-primary mb-3">
										<div class="card-header">
											<span class="badge badge-pill badge-success"><? echo $row_result['cID']?></span>
											<? if($col2 == "M") { ?>
												<img class="sex" src="img/M.png">
											<? } else{ ?>
												<img class="sex" src="img/F.png">
											<? } ?>
											<? if($col4 == "葛來分多" ){ ?>
												<img class="college_img" src="img/葛來分多.png">
											<? }else if($col4 == "雷文克勞"){ ?>
												<img class="college_img" src="img/雷文克勞.png">
											<? }else if($col4 == "赫夫帕夫") {?>
												<img class="college_img" src="img/赫夫帕夫.png">
											<? }else{ ?>
												<img class="college_img" src="img/史萊哲林.png">
											<? } ?>
											<span class="badge badge-pill badge-success"><? echo $col1?></span>
											<span class="badge badge-pill badge-danger"><?echo $col3?>年級</span>
										</div>
										<div class="card-body text-secondary">
											<!-- nl2br自動換行 -->
											<p class="card-text">
												<? echo nl2br($row_result["mess"]); ?>
											</p>
										</div>
									</div>
								</div>
							</div>
		            <?  }
		     			$stmt->close();
			}
		} ?>

		<div class="row">
			<div class="col">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item <? if($num_pages==1) echo 'disabled' ?>">
							<a class="page-link" href="message.php?page=<? echo $num_pages-1; ?>&class=<?echo $Subject; ?>">Previous</a>
						</li>
						<?
							for($i = 1;$i <= $total_pages;$i++){
								$str1 = "";
								if($i == $num_pages){
									$str1 = '<li class="page-item disabled">';
								}else{
									$str1 = '<li class="page-item">';
								}
								$str2 = "<a class='page-link' href='message.php?page={$i}&class={$Subject}'>{$i}</a></li>";
								echo $str1.$str2;
							}
						?>
						<li class="page-item <? if($num_pages >= $total_pages) echo 'disabled' ?>">
							<a class="page-link" href="message.php?page=<? echo $num_pages+1 ?>&class=<?echo $Subject; ?>">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</form>
</body>
<?$db_link->close()?>
</html>