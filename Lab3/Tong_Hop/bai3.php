<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3 - 60135998</title>


<style>
    a {
        color: #800080;
    }
    h2{
        color: #8A2BE2;
    }
    body {
        text-align: center;
    }

    label {
        font-size: 20;
        font-weight: bold;
        color: blue;
       
    }

    #pheptinh {
        font-size: 20;
        font-weight: bold;
        color: red;
        
    }
</style>

</head>
<body> 
<?php
isset($_GET["so2"]) ? $so2 = $_GET["so2"] : $so2 = "";
isset($_GET['so1']) ? $so1 = $_GET['so1'] : $so1 = "";
isset($_GET['pheptinh']) ? $pheptinh = $_GET['pheptinh'] : $pheptinh = "";


if (is_numeric($so1) && is_numeric($so2)) {
    switch ($pheptinh) {
        case "+":
            $pheptinh = "Cộng";
            $ketqua =  $so1 + $so2;
            break;
        case "-":
            $pheptinh = "Trừ";
            $ketqua =  $so1 - $so2;
            break;
        case "*":
            $pheptinh = "Nhân";
            $ketqua =  $so1 * $so2;
            break;
        case "/":
            $pheptinh = "Chia";
            $ketqua =  $so1 / $so2;
            break;
        default:
            $pheptinh ="";
            $ketqua =  "Phép Toán Không hợp lệ!!!";
    }
}
?>

<form action="Bai3.php" method="get" enctype="multipart/form">

    <h2>PHÉP TÍNH TRÊN HAI SỐ </h2>

    <label>Chọn phép tính: </label>
    <label id="pheptinh">Cộng </label>
    <input type="radio" name="pheptinh" value="+" label="Cộng"><label  id="pheptinh">Trừ </label>
    <input type="radio" name="pheptinh" value="-" label="Trừ"><label id="pheptinh">Nhân </label>
    <input type="radio" name="pheptinh" value="*" label="Nhân"><label id="pheptinh">Chia </label>
    <input type="radio" name="pheptinh" value="/" label="Chia"> <br><br>

    <label>Số thứ nhất: </label>
    <input type="text" name="so1" value="<?php echo $so1; ?>"><br><br>

    <label>Số thứ hai: </label>
    <input type="text" name="so2" value="<?php echo $so2; ?>"><br><br>
    <input type="submit" value="Tính"><br><br>
    <?php
    if (isset($ketqua)) {
        echo "<label> Kết quả - phép $pheptinh </label> : <input type='text' value='$ketqua' disabled>";
    } 
        ?>
</form>
<a href="javascript:window.history.back(-1);">Trở về trang trước</a>
</body>
</html>
