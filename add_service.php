<?php
require 'auth.php';
?>



<html dir="rtl">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<head>
<title>اضافة خدمة</title>
<link rel="stylesheet" href="css/css-grid.css">
</head>
<body>
<div class="grid-container">
<div class="grid-item">
   
<?php
    include 'sidebar.php';
    ?>


    </div>
    <div class="grid-item">
<h1>اضافة خدمة جديدة</h1>
<form method="post" action="">
   
   
  
   <input type="text" autocomplete="off" name="customer_name" placeholder="اسم الخدمة" required />
   


   <input type="text" autocomplete="off" name="customer_phone" placeholder="السعر" required />
   <input type="text" autocomplete="off" name="price_value" placeholder="التكلفه" required />

   <input type="text" autocomplete="off" value="30 Days" name="validty" placeholder="الصلاحية" required />
   <input type="text" autocomplete="off" name="sms_to" value="" placeholder="send sms to" required />



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
	 
     $validty=$_POST['validty'];
     $sms_to=$_POST['sms_to'];
     $price_value=$_POST['price_value'];


	 $sql = "insert into services (service_name,price,validty,sms_to,price_value)
	 VALUES ('$customer_name','$customer_phone','$validty','$sms_to','$price_value')";
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
