<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý thông tin người dùng</title>
</head>
<style>

a:link {
  color: blue;
}



</style>
</head>
<body>
<p style="font-weight: bold;">Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</p>
<?php
// define variables and set to empty values
$name = $diaChi = $sdt = $gioitinh = $quoctich = $monhoc = $ghichu ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $diaChi = test_input($_POST["diaChi"]);
  $sdt = test_input($_POST["sdt"]);
  $gioitinh = test_input($_POST["gioitinh"]);
  $quoctich = test_input($_POST["quoctich"]);
  $monhoc = test_input($_POST["monhoc"]);
  $ghichu = test_input($_POST["ghichu"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php

echo "Họ tên :".$name;
echo "<br>";
echo "Địa chỉ :".$diaChi;
echo "<br>";
echo "Số điện thoại :".$sdt;
echo "<br>";
echo "Giới tính :".$gioitinh;
echo "<br>";
echo "Quốc tịch :".$quoctich;
echo "<br>";
echo "Các môn đã học :".$monhoc;
echo "<br>";
echo "Ghi chú :".$ghichu;



?>

    <p>
       <a href="javascript:window.history.back(-1);"><i>Trở về trang trước</i></a>
        <!-- <a href="nhapThongtin.php">Trở về trang trước</a> -->
    </p>

</body>
</html>
