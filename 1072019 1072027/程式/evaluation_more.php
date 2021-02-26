	<?
	//看更多評價
		include("myaqli_obj_connMyaql.php");
		$Subject = $_GET['class'];
		$sql_eval_query = "SELECT * FROM evaluation";
		$all_eval_result = $db_link -> query($sql_eval_query);
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
	       /* .item{
	        	border: 1px solid gray;

	        }*/
	        img.sex {
				width:25px;
			}
	        .college_img{
				width:50px;
			}
			.col{
				width: 30%;
				float: left;
			}
			.card{
				width: 30%;
				float: left;
			}

	  </style>
	</head>
	<body>
		<div class="container">
	        <div class="text-center">
	            <h1><? echo $Subject ?>課程評價詳細資料</h1>
	        </div>
	       <? while($row_result = $all_eval_result->fetch_assoc()){ 
	       	//echo $Subject;
				if($row_result['class'] == $Subject){
					$id = $row_result['ID'];
					if($stmt = $db_link->prepare("SELECT name,sex,grade,college FROM member WHERE ID = ?")){
					 	$stmt->bind_param("i",$id);
					 	$stmt->execute();
					 	$stmt->bind_result($col1,$col2,$col3,$col4);
					 	while($stmt->fetch()){
			?>

					<div class="card border-primary mb-3 text-center mr-3">
						<div class="card-header">
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
						<div class="card-body">
											<!-- nl2br自動換行 -->
																		<!-- nl2br自動換行 -->
							<p>推薦程度:<? echo $row_result['recommend']?>顆星</p>
							<p>天文指數:<? echo $row_result['astronomical']?>顆星</p>	
							<p>作業壓力:<? echo $row_result['HWpressure']?>顆星</p>	
							<p>期中測驗方式：<? echo $row_result['midterm']?></p>
							<p>期末測驗方式：<? echo $row_result['finalterm']?></p>
							<?if($row_result['supplement'] != "") { ?>
								<p class="card-text">補充：<? echo nl2br($row_result["supplement"]); ?></p>
							<? }else{ ?>
								<p class="card-text">補充：無</p>
							<? } ?>
							
						</div>
					</div>
			 <?     }
		     		$stmt->close();
				    }
				}
			}
			?>
				
		</div>
	</body>
	</html>