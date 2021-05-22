<?php
require 'auth.php';
require 'db.php';
    
    $userid = $_GET['id'];
    $get_user = mysqli_query($con,"SELECT * FROM `customer` WHERE id='$userid'");
    
    if(mysqli_num_rows($get_user) === 1)
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<title>تعديل زبون</title>
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
            <h1>تعديل معلومات الزبون</h1>
            <form action="" method="post">
        <table id="no-hover">
<tr>


<td>رقم</td>
<td><input type="text" readonly name="idc"  value="<?php echo $row['id'];?>"/>
</td>
</tr>

<tr>
<td>اسم الزبون</td>

<td><input type="text" autocomplete="off" name="customer_name"  value="<?php echo $row['customer_name'];?>" required/>
</td>

</tr>
<tr>

<td>رقم الهاتف</td>
<td><input type="number" autocomplete="off"  name="phone" value="<?php echo $row['customer_phone'];?>" required />
</td>
</tr>
<tr>

<td></td>
<td><input type="submit" name="update" value="تعديل معلومات الزبون">
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
   
   $idc = $_POST['idc'];
   $customer_name = $_POST['customer_name'];
   $phone= $_POST['phone'];
           
   // mysql query to Update data
   $query = "UPDATE `customer` SET `customer_name`='".$customer_name."' ,`customer_phone`='".$phone."' WHERE `id` = $idc";
   
   $result = mysqli_query($con, $query);
   
   if($result)
   {
       echo 'Data Updated';
       header("Location: browse-users.php");
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($con);
}

?>
