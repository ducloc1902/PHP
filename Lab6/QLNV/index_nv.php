<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh Sách Nhân Viên</title>
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
        } else {
            $page = $_GET['page'];
        }
    ?>
<div class="container">
	<div class="row">
		<h2 class="text-center" style="color: blue;">Danh sách nhân viên</h2>
		<h3 class="text-center" style="color: lightcoral;text-align: center"><?php echo "Trang".$page;?></h3>        
            <form action="index_nv.php" method="get" style="text-align: center">
            	<button type="button" class="button_them"><a href="them_nv.php">Thêm nhân viên</a></button>
                <input name="keyword" placeholder="" value="" >
                <input type="submit" value="Tìm nhân viên">
            </form>
			<table class="table">
				<thead>
					<tr>
						<th>Stt</th>
						<th>Họ và tên</th>
						<th>Ngày sinh</th>
						<th>Giới tính</th>
						<th>Địa chỉ</th>
						<th>Ảnh </th>
						<th>Loại nhân viên</th>
						<th>Phòng ban</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php 
                        $sql='SELECT * FROM NHANVIEN';
                        $rowsPerPage = 3;// tạo sẵn 3 trang 
                        $result = mysqli_query($conn, $sql);
                        $numRows = mysqli_num_rows($result);// đếm 
                        $maxPage = ceil($numRows/$rowsPerPage);///tính toán chia số trang

                        $offset = ($page-1)*$rowsPerPage; //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
                        $row_sql="SELECT MANV,HOTEN,NGAYSINH,GIOITINH,DIACHI,ANH,loainv.TENLOAINV,phongban.TENPHONG from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MALOAINV = loainv.MALOAINV and nhanvien.MAPHONG = phongban.MAPHONG LIMIT ".$offset.','.$rowsPerPage;
                        if (!empty($_GET['keyword']))
                        {
                            $search = $_GET['keyword'];
                            $row_sql = "SELECT MANV,HOTEN,NGAYSINH,GIOITINH,DIACHI,ANH,loainv.TENLOAINV,phongban.TENPHONG from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MALOAINV = loainv.MALOAINV and nhanvien.MAPHONG = phongban.MAPHONG and HOTEN like '%$search%' LIMIT ".$offset.','.$rowsPerPage;
                        }
                        $row_thuchien=mysqli_query($conn,$row_sql);

						while($dulieu =mysqli_fetch_array($row_thuchien)){
							?>
							<td><?php echo $dulieu['MANV']; ?></td>
							<td><?php echo $dulieu['HOTEN']; ?> </td>
							<td><?php echo $dulieu['NGAYSINH']; ?></td>
							<td>
								<?php 
								if ($dulieu['GIOITINH'] == 0)///0 Là Nam ngược lại 1 là nữ
								echo "Nam";
							else
								 echo "Nữ";
							?>		
							</td>
							<td><?php echo $dulieu['DIACHI']; ?></td>
                        	<td><img src="<?php echo 'icon/'.$dulieu['ANH']; ?>" alt="Avatar" class="avatar"></td>
							<td><?php echo $dulieu['TENLOAINV']; ?></td>
							<td><?php echo $dulieu['TENPHONG']; ?></td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn sửa không')" href="sua_nv.php?id=<?php 
								echo $dulieu['MANV'] ?>" title="sửa"><img src="icon/edit.png" width="25px">
								</a>
							</td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn xóa không') " href="xoa_nv.php?id=<?php 
								echo $dulieu['MANV']; ?>" ><img src='icon/delete.png' width='25px' >
								</a>
							</td>
						</tr>					
					<?php 	} ?>
				</tbody>
			</table>
            <?php
            // Hiển thị liên kết đến các trang
            if ($page!=1) echo '<a href="index_nv.php?page='.($page-1).'" style="padding-right: 5px;padding-left: 5px;">'."Back".'</a>';
            for ($i=1;$i<=$maxPage;$i++) {
              if ($i==$page)
                  echo '<b><a href="index_nv.php?page='.$i.'"  style="padding-right: 5px;padding-left: 5px;">' . $i . '</a></b> ';
              else
                  echo '<a href="index_nv.php?page='.$i.'" style="padding-right: 5px;padding-left: 5px;">' . $i . '</a>';
            }
            if ($page!=$maxPage) echo '<a href="index_nv.php?page='.($page+1).'" style="padding-right: 5px;padding-left: 5px;">'."Next".'</a>';
            ?>
		</div>
	</div>


</body>
</html>