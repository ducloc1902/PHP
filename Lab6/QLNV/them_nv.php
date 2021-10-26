<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm Nhân Viên</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
	<script src="vendor/bootstrap.min.js"></script>
</head>
<body>

<?php
include('connect.php');
include('header.php');
session_start();
?>

<form method="post"  enctype="multipart/form-data">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Họ tên</td>
            <td>
                <input type="text" name="HOTEN" />
            </td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td>
                <input type="text" name="NGAYSINH" />
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                Nam <input type="radio" name="GIOITINH" value="0" />
                Nữ <input type="radio" name="GIOITINH" value="1" />
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="DIACHI" />
            </td>
        </tr>
        <tr>
            <td>Ảnh</td>
            <td>
                <input type="file" name="ANH"  accept="image/*" />
              
            </td>
        </tr>
        <tr>
            <td>loại nhân viên</td>
            <td>
                <select name="MALOAINHANVIEN">
                    <?php
                        $row_sql = "SELECT * FROM loainv";
                        $row_thuchien=mysqli_query($conn,$row_sql);
                        while($dulieu =mysqli_fetch_array($row_thuchien)){
                            $value = $dulieu['MALOAINV'];
                            $name = $dulieu['TENLOAINV'];
                    ?>
                    <?php
                        echo  "<option value='$value'>$name</option>"; }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Mã Phòng</td>
            <td>
                <select name="MAPHONG">
                    <?php
                    $row_sql = "SELECT * FROM phongban";
                    $row_thuchien=mysqli_query($conn,$row_sql);
                    while($dulieu =mysqli_fetch_array($row_thuchien)){
                        $value = $dulieu['MAPHONG'];
                        $name = $dulieu['TENPHONG'];
                        ?>
                        <?php
                        echo  "<option value='$value'>$name</option>"; }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Thêm" /></td>
        </tr>
    </table>
</form>


    <?php

    if (isset($_POST['HOTEN'])) $HOTEN = ($_POST['HOTEN']); else $HOTEN = "";
    if (isset($_POST['NGAYSINH'])) $NGAYSINH = $_POST['NGAYSINH']; else $NGAYSINH = "";
    if (isset($_POST['GIOITINH'])) $GIOITINH = $_POST['GIOITINH']; else $GIOITINH = "";
    if (isset($_POST['DIACHI'])) $DIACHI = strval($_POST['DIACHI']); else $DIACHI = "";

    if (isset($_POST['HOTEN']))
    {
        $target_dir = "icon/";
        $target_file = $target_dir . basename($_FILES["ANH"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

         // Kiểm tra ảnh
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["ANH"]["tmp_name"]);
            if ($check !== false) {
                 echo "Tệp là hình ảnh - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "Đây không phải hình ảnh.";
                $uploadOk = 0;
            }
        }
        // // Kiểm tra kích thước ảnh
        if ($_FILES["ANH"]["size"] > 500000) {
            echo "Cần thử lại. Kích Thước ảnh quá lớn.";
            $uploadOk = 0;
        }

        //Định dạng ảnh
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
             && $imageFileType != "gif") {
           echo "Hãy thử lại định dạng tệp.";
             $uploadOk = 0;
         }
    }
     if (isset($_FILES["ANH"])) {
         echo "<br>Định dạng ảnh là  $imageFileType<br>";
         echo "<br>Dung lượng ảnh là :";
        echo $_FILES["ANH"]["size"]."<br>";
         $ANH = basename($_FILES["ANH"]["name"]);
     } else $ANH = "";

    if (isset($_POST['MALOAINV'])) $MALOAINV = $_POST['MALOAINV']; else $MALOAINV = "2";
    if (isset($_POST['MAPHONG'])) $MAPHONG = $_POST['MAPHONG']; else $MAPHONG = "2";

    if (isset($_POST['HOTEN'])) {
        $sql = "INSERT INTO `nhanvien` (`MANV`, `HOTEN`, `NGAYSINH`, `GIOITINH`, `DIACHI`, `ANH`, `MALOAINV`, `MAPHONG`) VALUES (NULL,'$HOTEN','$NGAYSINH','$GIOITINH', '$DIACHI','$ANH','$MALOAINV','$MAPHONG')";

        if (mysqli_query($conn, $sql)) {
            echo "ĐÃ THÊM THÀNH CÔNG !!!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

</body>
</html>