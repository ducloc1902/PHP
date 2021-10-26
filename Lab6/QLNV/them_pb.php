<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm Phòng Ban</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
	<script src="vendor/bootstrap.min.js"></script>
</head>
<body>

<form method="post">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Tên phòng ban</td>
            <td>
                <input type="text" name="TENPHONG" />
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Thêm" /></td>
        </tr>
    </table>
</form>
     <?php
        include('connect.php');
        include('header.php');
        session_start();
        ?>
    <?php
    if (isset($_POST['TENPHONG'])) $TENPHONG = ($_POST['TENPHONG']); else $TENPHONG = "";


    if (isset($_POST['TENPHONG'])) {
        $sql = "INSERT INTO `phongban` (`MAPHONG`, `TENPHONG`) VALUES (NULL, '$TENPHONG');";

        if (mysqli_query($conn, $sql)) {
            echo "ĐÃ THÊM THÀNH CÔNG !!!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>

</body>
</html>