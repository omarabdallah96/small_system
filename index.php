
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	

	
</style>
<title></title>
</head>
<body>
	<div class="sticky">


	<form  class="lis" method="post">

<input id="logout" type="submit" value="logout" name="logout"/>

   

</form >
	






	</div>


<?php
// عند استدعاء هذا الملف يتم منع غير الاعضاء من دخول هذه الصفحه
require 'auth.php';

// الترحيب بالعضو


if(isset($_POST['logout'])){
	unset($_SESSION['username']);
	header("Location: login.php");
	exit();
}


?>
</body>
</html>