<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Đức Lộc 60135998 </title>

<style type="text/css">

        body {  
            background-color: #7FFFD4;       
            margin-top: 200px;
            margin-left: 450px;      
        }
        table{

             background: #FFDAB9;
             border-radius: 10px;
             border: 7px solid #DC143C;
             width: 400px;
        }
        thead{
            background: #FFD700;
        }
        td {
            color: blue;
        }

        h3{
            font-family: verdana;
            text-align: center;
            color: #ff8100;
         }

    </style>
</head>


<body>

<?php 

// if (isset($_POST["ten"],$_POST['ten']))
//     echo "Xin chào ".$_POST['ten'];


if(isset($_POST['soCu'])) 

    $soCu=trim($_POST['soCu']); 

else $soCu=0;

if(isset($_POST['soMoi'])) 

    $soMoi=trim($_POST['soMoi']); 

else $soMoi=0;

if(isset($_POST['donGia'])) 

    $donGia=trim($_POST['donGia']); 

else $donGia=20000;


if(isset($_POST['tinh']))

        if ( is_numeric($soCu) && is_numeric ($soMoi) && is_numeric($donGia)) 
            if ($soMoi > $soCu) 
                $thanhToan= ($soMoi- $soCu) * $donGia;
            else
                echo "<font color='red'> Cần nhập lại chỉ số mới không hợp lệ !!! </font>".
                $thanhToan="";

        else {
                echo "<font color='red'> Cần nhập lại,Không hợp lệ !!! </font>";
                $thanhToan="";
          }

else $thanhToan =0;

?>



<form align='center' action="" method="post">

<table>

    <thead>

        <th colspan="3" align="center"><h3>THANH TOÁN TIỀN ĐIỆN</h3></th>

    </thead>

    <tr>
        <td>Tên Chủ hộ:</td>
        <td><input type="test" name="ten" size=20 
    value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>" />
    </tr>

    <tr>
        <td>Chi số cũ:</td>
        <td><input type="text" name="soCu" value="<?php  echo $soCu;?> "/></td>
        <td>(Kw)</td>
    </tr>

     <tr>
        <td>Chi số mới:</td>
        <td><input type="text" name="soMoi" value="<?php  echo $soMoi;?> "/></td>
        <td>(Kw)</td>
    </tr>

        <tr>
        <td>Đơn giá:</td>
        <td><input type="text" name="donGia" value="<?php  echo $donGia;?> "/></td>
        <td>(VNĐ)</td>
    </tr>

    <tr><td>Số tiền thanh toán:</td>
     <td><input type="text" name="thanhToan" disabled="disabled" value="<?php  echo $thanhToan ?> "/></td>
    <td>(VNĐ)</td>
    </tr>

    <tr>
     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
     
    </tr>

</table>
</form>
</body>
</html>     