<?php
ob_start();
require 'auth.php';
require 'db.php';
    
    $userid = $_GET['id'];
    $get_user = mysqli_query($con,"SELECT * FROM `services` WHERE id_service='$userid'");
    
    if(mysqli_num_rows($get_user) === 1)
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
<title>تعديل خدمة</title>
<style>
<?php include 'css/css-grid.css'; ?>
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facture</title>
    
</head>


<body>
<div class="grid-container">
<div class="grid-item">
   
<?php
    include 'sidebar.php';
    ?>


    </div>
      
    <div class="grid-item">

            
            <form action="" method="post">
        <table id="no-hover">

        <tr>

        <td>رقم الخدمه</td>
        <td>   <input type="text" readonly name="id_product"  value="<?php echo $row['id_service'];?>"/>
</td>
        </tr>
        <tr>

        <td>اسم الخدمة</td>
        <td>                <input type="text" autocomplete="off" name="product_name"  value="<?php echo $row['service_name'];?>" required/>
</td>
        </tr>
        <tr>

        <td>سعر الخدمة</td>
        <td>                <input type="text" autocomplete="off"  name="price" value="<?php echo $row['price'];?>" required />
</td>

        </tr>
        <tr>

        <td>المدة</td>
        <td><input type="text" autocomplete="off"  name="validty" value="<?php echo $row['validty'];?>" required />
</td>
        </tr>
        <tr>
        <td>التكلفة</td>
        <td><input type="text" autocomplete="off"  name="price_value" value="<?php echo $row['price_value'];?>" required />
</td>
        </tr>
        <tr>

            <td>طريقه الاشتراك</td>
            <td><input type="text" autocomplete="off"  name="sms_to" value="<?php echo $row['sms_to'];?>" required />
</td>


        </tr>
        <tr>
            <td></td>
            <td>                <input type="submit" name="update" value="تعديل الخدمة">
</td>
        </tr>
        </table>

                

 
            </form>

        </div>
 
    </div>
</body>
</html>
<?php
require 'db.php';
if(isset($_POST['update']))
{
   
   $id_product = $_POST['id_product'];
   $product_name = $_POST['product_name'];
   $price= $_POST['price'];
   $validty=$_POST['validty'];
   $sms_to=$_POST['sms_to'];
   $price_value=$_POST['price_value'];
   $query = "UPDATE `services` SET `service_name`='".$product_name."' ,`price_value`='".$price_value."',`price`='".$price."' ,`validty`='".$validty."',`sms_to`='".$sms_to."'   WHERE `id_service` = $id_product";
   
   $result = mysqli_query($con, $query);
   
   if($result)
   {
       echo 'Data Updated';
       header("Location:services.php");
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($con);
}
ob_end_flush();
?>
