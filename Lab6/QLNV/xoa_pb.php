<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa Phòng Ban </title>
</head>
<body>
<?php
	include('connect.php');
	session_start();

	$id=$_GET['id'];
	$sql="DELETE FROM `phongban` WHERE `phongban`.`MAPHONG` = $id";
	mysqli_query($conn,$sql);
	header("location:index_pb.php");
?>
</body>
</html>