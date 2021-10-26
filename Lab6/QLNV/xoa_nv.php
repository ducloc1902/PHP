<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa nhân viên</title>
</head>
<body>
<?php
	include('connect.php');
	session_start();

	$id=$_GET['id'];
	$sql="DELETE FROM `nhanvien` WHERE `nhanvien`.`MANV` = $id";
	mysqli_query($conn,$sql);
	header("location:index_nv.php");
?>
</body>
</html>