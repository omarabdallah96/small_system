<?php
$con = mysqli_connect('sql110.eb2a.com','eb2a_28422515','Alfa512#','eb2a_28422515_omar');
mysqli_set_charset($con,"utf8");
if(mysqli_connect_errno()){
	echo 'فشل الاتصال بقاعدة البيانات';
}

?>