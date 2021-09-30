<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Đức Lộc 60135998 </title>


</head>


<body>

<?php 

if(isset($_POST['so1']))  

    $so1=trim($_POST['so1']); 

else $so1=0;

if(isset($_POST['so2'])) 

    $so2=trim($_POST['so2']); 

else $so2=0;

if(isset($_POST['tinh']))

        if (is_numeric($so1) && is_numeric($so2)) 

            switch ($_POST['pheptinh']) {
            case '+':
                $pheptinh = "cong";
                $ketqua = ($so1 + $so2);
                break;
            case '-':
                $pheptinh = "tru";
                $ketqua = ($so1 - $so2);
                break;
            case '*':
                $pheptinh = "nhan";
                $ketqua = ($so1 * $so2);
                break;
            case '/':
                $pheptinh = "chia";
                $ketqua = ($so1 / $so2);
                break;
        }
        else{
            echo "lỗi".$ketqua="";
        }

else $ketqua=0;

        
?>



<form align='center' action="" method="post">

<table>

    <thead>

        <th colspan="2" align="center"><h3>PHÉP TÍNH HAI SỐ</h3></th>

    </thead>
    <tr>
        <td colspan="2">
           Chọn phép tính:
           <input type="radio"  name="pheptinh" value="Cộng">
              <label for="cong">Cộng</label>
              <input type="radio"  name="pheptinh" value="Trừ">
              <label for="tru">Trừ</label>
              <input type="radio"  name="pheptinh" value="Nhân">
              <label for="nhan">Nhân</label>
              <input type="radio"  name="pheptinh" value="Chia">
              <label for="chia">Chia</label>
        </td>
    </tr>
    <tr><td>Số thứ nhất:</td>

     <td><input type="text" name="so1" value="<?php  echo $so1;?> "/></td>

    </tr>

    <tr><td>Số thứ hai:</td>

     <td><input type="text" name="so2" value="<?php  echo $so2;?> "/></td>

    </tr>

    <tr><td>Kết quả:</td>
     <td><input type="text" name="ketqua" disabled="disabled" value="<?php  echo $ketqua;?> "/></td>
    </tr>
    <tr>
     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
    </tr>

</table>
</form>
</body>
</html>