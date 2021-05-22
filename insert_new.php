<?php
require 'auth.php';
?>



<html dir="rtl">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<head>
<link rel="stylesheet" href="css/css-grid.css"></head>
<title>اضافة زبون</title>
</head>
<body>
<div class="grid-container">
<div class="grid-item"><?php


include 'sidebar.php';
?>
</div>

<div class="grid-item">
<h1>اضافه زبون جديد</h1>
<form method="post" action="">
   
   
  
   <input type="text" autocomplete="off" name="customer_name" placeholder="الاسم الكامل" required />
   


   <input type="number" autocomplete="off" name="customer_phone" placeholder="رقم الهاتف" required />

  <input type="submit" name="new_customer" VALUE="حفظ"/>
</form>



</body>
</html>

<?php


include 'db.php';

if(isset($_POST['new_customer']))
{	
	 $customer_name = $_POST['customer_name'];
	 
	 $customer_phone = $_POST['customer_phone'];
	 
	 


	 $sql = "INSERT INTO customer (customer_name, customer_phone)
	 VALUES ('$customer_name','$customer_phone')";
	 if (mysqli_query($con, $sql)) {
		echo "New record created successfully !";
 header("Location:config.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
}
?>
