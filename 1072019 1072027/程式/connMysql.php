<? 
	// header("Conten-Type: text/html; charset=utf-8");

	$db_host="localhost";
	$db_ID="finaltopic";
	$db_PW="1234";
	$db_link=@mysqli_connect($db_host,$db_ID,$db_PW,$db_ID);//@可以把錯誤訊息擋住
	if($db_link ->connect_error!=""){//if(!dblink)//用這個方法的話上面少最後項
		echo "failed(1)";
		die("資料連結失敗");//die()可以終止運行
		echo "failed(2)";
	}else{
		echo "資料連結成功";
	}
	mysqli_query($db_link,"SET NAMES utf8");
?>