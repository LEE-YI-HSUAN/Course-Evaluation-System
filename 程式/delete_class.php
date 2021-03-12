<?
//刪除課程
	//echo "delete class";
	include("myaqli_obj_connMyaql.php");
	$Subject = $_GET['class'];
	$sql_delete = "DELETE FROM course WHERE subject=?";
	$stmt= $db_link->prepare($sql_delete);
	$stmt->bind_param("s",$Subject);
	$stmt->execute();
	$stmt->close();
	$db_link->close();
	header("location:adm_index.php");
?>