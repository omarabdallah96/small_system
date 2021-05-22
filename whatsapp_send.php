


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

<style>
<?php include 'css/css-grid.css'; ?>
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ارسال عبر واتساب</title>
    
</head>

<body>
<div class="grid-container">
<div class="grid-item">
   
<?php
    include 'sidebar.php';
    ?></div>
<div class="grid-item">
        <div class="form">
  
            <form action="" method="post">
                
                <strong>رقم الهاتف</strong><br>
                <input type="text" id="numb" value="<?php echo $row['customer_phone'];?>" ><br>
                
                <input type="text" id="txtcustomer"value="<?php echo $row['customer_name'];?>&nbsp" ><br>
                <input type="text" id="txthello" value="أهلا بك في محل عمر نت حسابك هو "/><br>

                <input type="text" id="txtmsg" value="<?php echo $row['balance'];?>"/><br>
         <center>
         
         <a id="whatsapp" href = "javascript:;" onclick = "this.href='https:/'+'/'+'api.whatsapp.com/send?phone=' +''+
                 document.getElementById('numb').value +'&'+
            'text='+ document.getElementById('txtcustomer').value +document.getElementById('txthello').value+

 document.getElementById('txtmsg').value
            
           " target="_blank">ارسال عبر واتساب</a>
          
         </center>     
 
            </form>
 
        </div></div>
<br>
   </html>