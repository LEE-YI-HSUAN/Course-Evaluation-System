
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>註冊帳號</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
		let str="";
			let p=document.createElement("p");
			p.classList.add("alert");
			p.classList.add("alert-danger");
			p.style.animation="myAnimation 3s";
			p.style.color='red';
	</script>
	
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
	<h1>註冊</h1>
	<form method="POST" name="formPost" action="registerphp.php">
		<table border=1 class="table">
			<tr>
			<td colspan="2">建立您的帳戶
			</td>
    	    </tr>
    	    <tr>
    	    	<td>姓名</td>
    	    	<td>
    	    	<div name="name">
    	    		<input type="text" name="name" id="name" placeholder="">
    	    	</div>
    	    	</td>
    	    </tr>
			<tr>
				<td>性別</td>
				<td>
					<input type="radio" name="sex" value="M">男<br>
					<input type="radio" name="sex" value="F" checked="true">女<br>
				</td>
			</tr>
			<tr>
				
				<td>年級</td>
				<td><select name="grade">
					<option value="1">一年級</option>
					<option value="2">二年級</option>
					<option value="3">三年級</option>
					<option value="4">四年級</option>
					<option value="5">五年級</option>
					<option value="6">六年級</option>
					<option value="7">七年級</option>
				</select></td>
			</tr>
			<tr>
				<td>學院</td>
				<td><select name="college">
					<option value="葛來分多">葛來分多</option>
					<option value="史萊哲林">史萊哲林</option>
					<option value="雷文克勞">雷文克勞</option>
					<option value="赫夫帕夫">赫夫帕夫</option>
				</select></td>
			</tr>
			<tr>
    	    	<td>學號(帳號)</td>
    	    	<td>
    	    	<div name="ID">
    	    		<input type="text" name="ID" placeholder="請輸入7位數字學號">
    	    	</div>
    	   		</td>
    	    </tr>
    	    <tr>
    	    	<td>密碼</td>
    	    	<td>
    	    	<div name="password">
    	    	<input type="password" name="password" placeholder="請輸入10個字元以內">
    	    	</div>
    	    	</td>
    	    </tr>
    	    <tr>
    	    	<td>確認密碼</td><td><input type="password" name="check_password" placeholder="重新輸入密碼"></td>
    	    </tr>
			<tr>
			<td colspan="2" style="text-align: right">
				<input type="hidden" name="action" value="join">
				<input type="button" name="btnback" value="回上一頁" class="btn btn-secondary" onclick="window.history.back();">
				<input type="reset" name="btnRST" value="重新填寫"class="btn btn-secondary">
				<input type="submit" name="btnSMT" value="註冊" class="btn btn-secondary">
			</td>
		</tr>
			
		</table>
	</form>
</body>
<?php if(isset($_GET["loginStatus"])&&($_GET["loginStatus"]=="1")){ ?>
	<script>
		alert('註冊成功\n請使用帳號密碼登入。');
		window.location.href='login.php';
	</script>
<?php } ?>
<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="1")){ ?>
	<script>
		alert('註冊失敗\n此帳號已被註冊。');
		window.location.href='register.php';
	</script>
<? } ?>
<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="2")){ ?>
	<script>
		alert('註冊失敗\n密碼與確認密碼不相符。');
		window.location.href='register.php';
	</script>
<? } ?>

<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="3")){ ?>
	<script>
			str="請填寫姓名";
			let text =document.createTextNode(str);
			p.appendChild(text);
			document.getElementsByName("name")[0].appendChild(p);
			setTimeout(function(){document.getElementsByName("name")[0].removeChild(p);},3000);
			document.formPost.name.focus();
	</script>
	<? } ?>
	<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="4")){ ?>
	<script>
			str="請填寫帳號(學號)";
			let text =document.createTextNode(str);
			p.appendChild(text);
			document.getElementsByName("ID")[0].appendChild(p);
			setTimeout(function(){document.getElementsByName("ID")[0].removeChild(p);},3000);
			document.formPost.ID.focus();
	</script>
	<? } ?>
	<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="5")){ ?>
	<script>
			str="請填寫密碼";
			let text =document.createTextNode(str);
			p.appendChild(text);
			document.getElementsByName("password")[0].appendChild(p);
			setTimeout(function(){document.getElementsByName("password")[0].removeChild(p);},3000);
			document.formPost.password.focus();
	</script>
	<? } ?>
	<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="6")){ ?>
	<script>
			str="帳號不符規定，請輸入學號";
			let text =document.createTextNode(str);
			p.appendChild(text);
			document.getElementsByName("ID")[0].appendChild(p);
			setTimeout(function(){document.getElementsByName("ID")[0].removeChild(p);},3000);
			document.formPost.ID.focus();
	</script>
	<? } ?>
	<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="7")){ ?>
	<script>
			str="你的名字太長了";
			let text =document.createTextNode(str);
			p.appendChild(text);
			document.getElementsByName("name")[0].appendChild(p);
			setTimeout(function(){document.getElementsByName("name")[0].removeChild(p);},3000);
			document.formPost.name.focus();
	</script>
	<? } ?>
	<?php if(isset($_GET["errMsg"])&&($_GET["errMsg"]=="8")){ ?>
	<script>
			str="你的密碼太長了";
			let text =document.createTextNode(str);
			p.appendChild(text);
			document.getElementsByName("password")[0].appendChild(p);
			setTimeout(function(){document.getElementsByName("password")[0].removeChild(p);},3000);
			document.formPost.password.focus();
	</script>
	<? } ?>
</html>