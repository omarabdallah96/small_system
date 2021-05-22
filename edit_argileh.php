<?php
ob_start();
require 'auth.php';
require 'db.php';
    
    $userid = $_GET['id'];
    $get_user = mysqli_query($con,"SELECT * FROM `argile` WHERE id_argileh='$userid'");
    
    if(mysqli_num_rows($get_user) === 1)
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>
<?php include 'css/style2.css'; ?>
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facture</title>
    
</head>


<body>
     <div class="container">
      
       <!-- UPDATE DATA -->
        <div class=".content">
            
            <form action="" method="post">
        
      <input type="text" readonly name="id_product"  value="<?php echo $row['id_argileh'];?>"/>
      <strong>argileh name</strong>

                
                <input type="text" autocomplete="off" name="product_name"  value="<?php echo $row['name_argileh'];?>" required/>
                <strong>customer name</strong>
                <input type="text" autocomplete="off"  name="customer_name" value="<?php echo $row['customer_name'];?>" required />
                <strong>available</strong>
                <select name="sub">
 
 <option value="YES">YES</option>
 <option value="NO">NO</option>
 >
 
 </select>

                <input type="submit" name="update" value="update">
 
<a href="argileh.php">back</a> 
            </form>

        </div>
 
        <!-- END OF UPDATE DATA SECTION -->
    </div>
</body>
</html>
<?php
require 'db.php';
if(isset($_POST['update']))
{
   
   $id_product = $_POST['id_product'];
   $product_name = $_POST['product_name'];
   $customer_name= $_POST['customer_name'];
   $sub = $_POST['sub'];
   $sql= "UPDATE `argile` SET  `avalaible`='".$sub."',`name_argileh`='".$product_name."',`customer_name`='".$customer_name."' WHERE `id_argileh` = $id_product ";
   $result = mysqli_query($con, $sql);
   
   if($result)
   {
       echo 'Data Updated';
       header("Location:argileh.php");
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($con);
}
ob_end_flush();
?>
