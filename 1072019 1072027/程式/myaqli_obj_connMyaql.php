<?
	/*以物件的方式建立的引入檔*/

	// header("Context-Type: text/html; charset = utf-8");

	$db_host = "localhost";
	$db_username = "finaltopic";
	$db_password = "1234";
	//資料表名稱
	$db_name = "finaltopic";

	$db_link = @new mysqli($db_host,$db_username,$db_password,$db_name);

	if($db_link -> connect_error != "" ){
		echo "資料庫連結失敗!";
	}
	else{
		//query()對連線的編碼做設定
		$db_link -> query("SET NAMES 'utf8'");
		//echo "資料庫連結成功!";
	}
	//物件名稱 -> close()關閉
?>