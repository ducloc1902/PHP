<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm Loại Nhân Viên</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
	<script src="vendor/bootstrap.min.js"></script>
</head>
<body>

<form method="post">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Loại nhân viên</td>
            <td>
                <input type="text" name="TENLOAINV" />
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
    if (isset($_POST['TENLOAINV'])) $TENLOAINV = ($_POST['TENLOAINV']); else $TENLOAINV = "";


    if (isset($_POST['TENLOAINV'])) {
        $sql = "INSERT INTO `loainv` (`MALOAINV`, `TENLOAINV`) VALUES (NULL, '$TENLOAINV');";

        if (mysqli_query($conn, $sql)) {
            echo "ĐÃ THÊM THÀNH CÔNG !!!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

</body>
</html>