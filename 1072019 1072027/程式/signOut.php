<?
	session_start();
	if(isset($_SESSION["loginMember"])&&($_SESSION["loginMember"]!="")){
		unset($_SESSION["loginMember"]);
		unset($_SESSION["admin"]);
		$message="Bye bye！";
		echo "<script>alert('$message'); location.href='index1.php';</script>";
	} 
?>