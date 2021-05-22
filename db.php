<?php
$con = mysqli_connect('localhost','root','','system_db');
mysqli_set_charset($con,"utf8");
if(mysqli_connect_errno()){
	echo 'فشل الاتصال بقاعدة البيانات';
}

?>