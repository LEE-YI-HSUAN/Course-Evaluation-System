<?
	//按下我要留言進入判斷是否有登入過
	session_start();
	if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]=="")){
		//未登入
		$message = "尚未登入，請登入後再留言";
		echo "<script>alert('$message'); location.href='login.php';</script>";
	}else{
		//已登入
		echo "<script>location.href='add_mess.php?class={$_GET["class"]}';</script>";
	}
?>