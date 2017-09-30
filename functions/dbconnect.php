<?php 
//khởi tạo đối tượng mới
$mysqli = new mysqli("localhost","root","","admincp");
//thiết lập font tiếng việt
$mysqli->set_charset("utf8");
//thông báo lỗi
if (mysqli_connect_errno()) {
	echo "Không thể kết nối đến database.".mysqli_connect_errno();
	exit();
}
?>