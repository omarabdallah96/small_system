<?php
ob_start();
require 'auth.php';
require 'db.php';
    
    $userid = $_GET['id'];
    $get_user = mysqli_query($con,"SELECT * FROM `products` WHERE id_product='$userid'");
    
    if(mysqli_num_rows($get_user) === 1)
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
<title>تعديل المنتج</title>
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
    ?></div>
<div class="grid-item">
            
            <form action="" method="post">
        <table id="no-hover">
            <tr>
            <td>رقم المنتج</td>

                <td><input type="text" readonly name="id_product"  value="<?php echo $row['id_product'];?>"/>
</td>


            </tr>
            <tr>                <td>اسم المنتج</td>

                <td><input type="text" autocomplete="off" name="product_name"  value="<?php echo $row['product_name'];?>" required/>
</td>


            </tr>


            <tr>
                <td>السعر</td>
                <td>                <input type="text" autocomplete="off"  name="price" value="<?php echo $row['price'];?>" required />
</td>


            </tr>


<tr>

<td></td>
<td>                <input type="submit" name="update" value="تعديل">
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
           
   // mysql query to Update data
   $query = "UPDATE `products` SET `product_name`='".$product_name."' ,`price`='".$price."' WHERE `id_product` = $id_product";
   
   $result = mysqli_query($con, $query);
   
   if($result)
   {
       echo 'Data Updated';
       header("Location:product.php");
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($con);
}
ob_end_flush();
?>
