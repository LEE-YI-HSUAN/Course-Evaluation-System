<?
//按下我要評價，判斷是否有登入
	session_start();
	if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]=="")){
		//未登入
		$message = "尚未登入，請登入後再評價";
		echo "<script>alert('$message'); location.href='login.php';</script>";
	}else{
		//已登入
		echo "<script>location.href='add_eval.php?class={$_GET["class"]}';</script>";
	}
?>