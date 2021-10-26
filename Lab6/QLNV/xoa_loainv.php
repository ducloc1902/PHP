<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa Loại nhân viên</title>
</head>
<body>
<?php
	include('connect.php');
	session_start();

	$id=$_GET['id'];
	$sql="DELETE FROM `loainv` WHERE `loainv`.`MALOAINV` = $id";
	mysqli_query($conn,$sql);
	//var_dump(mysqli_query($conn,$sql));
	header("location:index_loainv.php");
?>
</body>
</html>