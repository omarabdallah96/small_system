<?php
require 'auth.php';
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <title>تغيير كلمة السر</title>
</head>

<style>
<?php include 'css/css-grid.css'; ?>
</style>
<body>
<div class="grid-container">
<div class="grid-item">
   
<?php
    include 'sidebar.php';
    ?>


    </div>
    <div class="grid-item">
            <h1>تغيير كلمة السر</h1>
 <form action="" method="post">
        <table id="no-hover">


        <tr>

        <td>اسم المستخدم</td>

        <td> <input type="text" autocomplete="off" name="username"  required/></td>
        </tr>
        <tr>
        <td>كلمة السرالحاليه</td>

        <td><input type="text" autocomplete="off" name="username"  required/>
</td>


        </tr>
        <tr>
           <td> كلمة السر الجديده</td>
           <td>                <input type="text" autocomplete="off"  name="password_user"  required />
</td>




        </tr>
        <tr>
           <td></td>
           <td>  <input type="submit" name="update" value="تغيير كلمة السر"></form></td>
        </tr>
        </table>
     
      

</div>
                
</body>
</html>


<?php
require 'db.php';
if(isset($_POST['update']))
{
   
   
   $username = $_POST['username'];
   $password_user= $_POST['password_user'];
   $oldpass= $_POST['oldpass'];
   $sql=mysqli_query($con,"SELECT password_user FROM users where password_user='$oldpass'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
           
   // mysql query to Update data
   $query = "UPDATE `users` SET `username`='".$username."' ,`password_user`='".$password_user."' WHERE `id` = 1";
   
   $result = mysqli_query($con, $query);


       echo 'Data Updated';
       header("Location: browse-users.php");
 }
  
   else{
       echo 'Data Not Updated';
   }
   mysqli_close($con);
}

?>
