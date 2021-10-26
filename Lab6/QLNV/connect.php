<?php # Script - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL, 
// selects the database, and sets the encoding.

$conn=mysqli_connect("localhost",'root','','qlnv')or die ('không thê kết nối tới CSDL');
mysqli_set_charset($conn,'utf8');
?>
