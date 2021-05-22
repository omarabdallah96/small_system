<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <link rel="stylesheet" href="css/css-grid.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاعدادات</title>
</head>
<body>
<div class="grid-container">
<div class="grid-item">
   
<?php
    include 'sidebar.php';
    ?>


    </div>
    <div class="grid-item" id="config">

    <table id="no-hover">
	<tr>		<td><img src="images/shutdown_32px.png"></td>

		<td> <form method="post">

<input id="logout" type="submit" value="تسجيل خروج" name="logout"/>

   


<?php
// عند استدعاء هذا الملف يتم منع غير الاعضاء من دخول هذه الصفحه
require 'auth.php';

// الترحيب بالعضو


if(isset($_POST['logout'])){
    unset($_SESSION['username']);
    header("Location: login.php");
    exit();
}


?></td>


	</tr>
	<tr>		<td><img src="images/add_user_male_32px.png"></td>

		<td><a href="insert_new.php">اضافه زبون جديد</a></td>


	</tr>

	<tr>		<td><img src="images/product.png"></td>

		<td><a href="add_product.php">اضافة منتج</a></td>


	</tr>

	<tr>		<td><img src="images/service_32px.png"></td>

		<td><a href="add_service.php">اضافة خدمة</a></td>


	</tr>
	<tr>		<td><img src="images/password_32px.png"></td>

		<td><a href="update_pass.php">تغيير كلمة السر</a></td>



	</tr>




</table>

</div></div>
</body>
</html>