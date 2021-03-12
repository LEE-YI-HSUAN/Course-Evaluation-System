<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

		<style>
		body {
			/*background: skyblue;*/
		}
		* {		/*星星表示所有物件*/
			font-family:"微軟正黑體";
		}
	</style>
</head>
<body>
	<h1>登入</h1>
	<form method="POST" name="formPost" action="loginphp.php">
		<table border=1 class="table">
			<tr>
			<td colspan="2">登入您的帳戶
			</td>
    	    </tr>
			<tr>
    	    	<td>帳號</td><td><input type="text" name="ID" placeholder="請輸入帳號"></td>
    	    </tr>
    	    <tr>
    	    	<td>密碼</td><td><input type="password" name="password" placeholder="請輸入密碼"></td>
    	    </tr>
			<tr>
			<td colspan="2" style="text-align: right">
				<input type="hidden" name="action" value="add">
				<a href="register.php">還沒有帳號嗎~點擊前往註冊</a>
				<input type="submit" name="btnSMT" value="登入" class="btn btn-secondary">
				<input type="button" name="btnback" value="回上一頁" class="btn btn-secondary" onclick="window.history.back();">
				<input type="reset" name="btnRST" value="重新填寫"class="btn btn-secondary">
				
			</td>
		</tr>
			
		</table>
</body>
</html>