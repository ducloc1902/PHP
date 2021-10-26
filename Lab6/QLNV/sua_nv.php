<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Nhân Viên</title>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
    <script src="vendor/bootstrap.min.js"></script>
</head>
<body>
    <?php
    include('connect.php');
    include('header.php');
    session_start();
    ?>

<form method="post" enctype="multipart/form-data">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Họ tên</td>
            <td>
                <input type="text" name="HOTEN" value="<?php echo $row_dulieu['HOTEN']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td>
                <input type="text" name="NGAYSINH" value="<?php echo $row_dulieu['NGAYSINH']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                Nam <input type="radio" name="GIOITINH" value="0"
                    <?php
                    if ($row_dulieu['GIOITINH'] == 0) echo "checked";
                    ?>
                />
                Nữ <input type="radio" name="GIOITINH" value="1"
                    <?php
                    if ($row_dulieu['GIOITINH'] == 1) echo "checked";
                    ?>
                />
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="DIACHI" value="<?php echo $row_dulieu['DIACHI']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Ảnh
                <input type="file" name="ANH"  accept="image/*" value="<?php if(isset($_POST['ANH'])) echo $_POST['ANH'];?>" />
            </td>

            <td><img src="<?php echo 'uploads/'.$row_dulieu['ANH']; ?>" alt="Avatar" class="avatar"></td>
        </tr>   
        <tr>
            <td>Mã loại nhân viên</td>
            <td>
                <select name="MALOAINHANVIEN">
                    <?php
                    $row_sql = "SELECT * FROM loainv";
                    $row_thuchien = mysqli_query($conn, $row_sql);
                    while ($dulieu = mysqli_fetch_array($row_thuchien)) {
                        $value = $dulieu['MALOAINV'];
                        $name = $dulieu['TENLOAINV'];
                        ?>
                        <?php
                        if ($row_dulieu['MALOAINV'] == $dulieu['MALOAINV'])
                            echo "<option value='$value' selected>$name</option>";
                        else
                            echo "<option value='$value'>$name</option>";
                    }
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
                    $row_thuchien = mysqli_query($conn, $row_sql);
                    while ($dulieu = mysqli_fetch_array($row_thuchien)) {
                        $value = $dulieu['MAPHONG'];
                        $name = $dulieu['TENPHONG'];
                        ?>
                        <?php
                        if ($row_dulieu['MAPHONG'] == $dulieu['MAPHONG'])
                            echo "<option value='$value' selected>$name</option>";
                        else
                            echo "<option value='$value'>$name</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Cập nhật"/></td>
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
                echo "Đây không phải hình ảnh ";
                $uploadOk = 0;
            }
        }
         // Kiểm tra kích thước ảnh
        if ($_FILES["ANH"]["size"] > 500000) {
            echo "Cần thử lại. Kích Thước ảnh quá lớn. ";
            $uploadOk = 0;
        }
         // Định dạng đuôi ảnh
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
             && $imageFileType != "gif") {
           echo "Hãy thử lại tệp.";
             $uploadOk = 0;
         }
    }

         if (isset($_FILES["ANH"])) {
             $ANH = basename($_FILES["ANH"]["name"]);
         } else $ANH = "";

    if (isset($_POST['MALOAINV'])) $MALOAINV = $_POST['MALOAINV']; else $MALOAINV = "2";
    if (isset($_POST['MAPHONG'])) $MAPHONG = $_POST['MAPHONG']; else $MAPHONG = "2";

    $id = $_GET['id'];
    $row_sql = "SELECT * FROM `nhanvien` WHERE `nhanvien`.`MANV` = $id";
    $row_thucthi = mysqli_query($conn, $row_sql);
    $row_dulieu = mysqli_fetch_array($row_thucthi);


    if (isset($_POST['HOTEN'])) {

        $sql = "UPDATE `nhanvien` SET `HOTEN` = '$HOTEN', `NGAYSINH` ='$NGAYSINH', `GIOITINH` = '$GIOITINH', `DIACHI` = '$DIACHI',
         `ANH` = '$ANH', `MALOAINV` = '$MALOAINV', `MAPHONG` = '$MAPHONG' WHERE `nhanvien`.`MANV` = '$id';";

        if (mysqli_query($conn, $sql)) {
            echo "Đã cập nhật thành công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

</body>
</html>