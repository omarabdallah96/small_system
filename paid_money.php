<?php
ob_start();
require 'auth.php';
require 'db.php';
    
    $userid = $_GET['id'];
    $get_user = mysqli_query($con,"SELECT * FROM `customer` WHERE id='$userid'");
    
    if(mysqli_num_rows($get_user) === 1)
        $row = mysqli_fetch_assoc($get_user);
    
?>
<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
<title>تسديد دفعه</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
<?php 

include 'css/css-grid.css';
 ?>
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
<script>function getDateTime() {
        var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth()+1; 
        var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
        if(month.toString().length == 1) {
             month = '0'+month;
        }
        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
         return dateTime;
    }

    // example usage: realtime clock
    setInterval(function(){
        currentTime = getDateTime();
        document.getElementById("time").value = currentTime;
    }, 1000);

    
    
                    </script>

                
          <form method="post" action="">
                <input type="text" id="time" name="date_up" readonly >
                <input type="text" readonly name="idc"  value="<?php echo $row['id'];?>"/>
                <input type="text" readonly autocomplete="off" id="numb"  value="<?php echo $row['customer_phone'];?>">

           <input type="text" readonly autocomplete="off" id="customer" name="customer_name"  value="<?php echo $row['customer_name'];?>" required>
                <input type="number" readonly value="<?php echo $row['balance'];?>" id="n1" required>
        <input type="number" autocomplete="off"  value="0" oninput ="calc();" id="n2" required>
    
        <input type="text"  readonly  name="balance"  id="result" required>
                <input type="submit" name="update" value="تسديد دفعه">
               <center>
               <a id="whatsapp" href = "javascript:;" onclick = "this.href='https:/'+'/'+'api.whatsapp.com/send?phone=' +''+
                 document.getElementById('numb').value +'&'+
            'text='+ document.getElementById('customer').value +' تم تسديد ' +document.getElementById('n2').value +' باقي ' +document.getElementById('result').value +' شكرا لكم لاختياركم omar net '
            " target="_blank">رسالة واتساب </a>
               
               
               
               </center> 
 

            </form>
</div></div>
</body>

  
              
              
</html>
<?php

if(isset($_POST['update']))
{
   
   $idc = $_POST['idc'];
   $balance = $_POST['balance'];
   $date_up= $_POST['date_up'];
           
   // mysql query to Update data
   $query = "UPDATE `customer` SET `balance`='".$balance."' ,`date_up`='".$date_up."' WHERE `id` = $idc";
   
   $result = mysqli_query($con, $query);
   
   if($result)
   {
       
       header("Location: browse-users.php");
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($con);
}
ob_end_flush();
?>

<script>
              
function calc(){


        var paid= parseFloat(document.getElementById('n2').value);

        
        

            
        
        if(paid<0 || paid=='' || paid> document.getElementById('n1').value)
        {
            document.getElementById('result').value=document.getElementById('n1').value;
        }
        else{
            document.getElementById('result').value=
            document.getElementById('n1').value- document.getElementById('n2').value;


        }

        calc();
    }
</script>