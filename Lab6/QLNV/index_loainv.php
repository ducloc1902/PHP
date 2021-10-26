<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách loại NV</title>
</head>
<body>
    <?php
    include('connect.php');
    include('header.php');
    session_start();
    ?>

    <?php
        if (!isset($_GET['page'])) {
            $page = 1;
        } 
        else {
            $page = $_GET['page'];
        }
    ?>

<div class="container">
    <div class="row">
        <h2 class="text-center" style="color: blue;">Danh sách loại nhân viên</h2>
        <form action="index_loainv.php" method="get" style="text-align: center">
            <button type="button" class="button_them"><a href="them_loainv.php">Thêm loại nhân viên</a></button>
            <input name="keyword" placeholder="" value="">
            <input type="submit" value="Tìm loại nhân viên">
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>Mã loại nhân viên</th>
                <th>Tên loại nhân viên</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $row_sql = "SELECT * FROM loainv";
                if (!empty($_GET['keyword']))
                    {
                        $search = $_GET['keyword'];
                         $row_sql = "select * from loainv where tenloainv like '%$search%'";
                    }
                    
                $row_thuchien=mysqli_query($conn,$row_sql);
                while($dulieu =mysqli_fetch_array($row_thuchien)){
                ?>
                <td><?php echo $dulieu['MALOAINV']; ?></td>
                <td><?php echo $dulieu['TENLOAINV']; ?> </td>
                <td>
                    <a onclick=" return confirm('Bạn có chắc muốn sửa không?')" href="sua_nv.php?id=<?php 
                    echo $dulieu['id'] ?>" title="sửa"><img src="icon/edit.png" width="25px">
                    </a>
                </td>
                <td>
                    <a onclick=" return confirm('Bạn có chắc muốn xóa không?') " href="xoa_loainv.php?id=<?php 
                    echo $dulieu['MALOAINV']; ?>" ><img src='icon/delete.png' width='25px' >
                    </a>
                </td>
            </tr>
            <?php   } ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>