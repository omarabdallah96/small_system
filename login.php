

</body></html>

<!DOCTYPE html>
<html lang="en">
<head>

<!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/style2.css">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <title>تسجيل الدخول</title>
</head>
<body>


<br>
 <center><h1>Omar.Net</h1>
 <h3>Login to system</h3>
 <h1>79 175 660</h1>
 </center>
    <!-- Icon -->
      
   
<br>
    <!-- Login Form -->
    <form method="post" action="">
      <input type="text" id="login" autocomplete="off" name="username" value="omar" placeholder="username">
      <input type="password" id="password" autocomplete="off" name="password" placeholder="password">
	  <br>
	  <input type="submit"  name="login" value="تسجيل دخول">

    </form>

  </div>
</div>
</body>
</html>
<?php
// استدعاء ملف الاتصال بقاعدة البيانات
require 'db.php';
// فتح جلسه
session_start();

// دالة الشرط للتحقق من ضغط زر login
if(isset($_POST['login'])){
	// تخزين الحقول فى متغيرات
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	// انشاء استعلام
	// فى هذا الاستعلام استخدمنا الشرط وجود اسم المستخدم وكلمة المرور
	$qu = "select * from users where username = '$user' && password_user = '$pass'";
	
	// ارسال الاستعلام والتحقق من وجود العضو
	if(mysqli_num_rows(mysqli_query($con, $qu)) > 0){
		// اذا تم وجود النتيجة يتم اضافة اسم العضو فى الجلسه 
		$_SESSION['username'] = $user;
		// ثم يتم الانتقال الى منطقة الاعضاء
		header("Location: index.php");
header("Location: browse-users.php");
	} else {
		// اذا لم يتم ايجاد اى قيمه 0
		echo 'اسم المستخدم او كلمة المرور خاطأ';
	}
	
	
}
?>