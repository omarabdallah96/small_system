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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="css/css-grid.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتوره</title>
    
</head>


<body>
     
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

                
<div class="grid-container">
  <div class="grid-item">
          <form method="post"  id="sticky" action="">
                <input type="text" id="time" name="date_up" readonly >
                <input type="text" readonly name="idc"  value="<?php echo $row['id'];?>"/>
                
           <input type="text"readonly autocomplete="off" name="customer_name"  value="<?php echo $row['customer_name'];?>" required>
                <input type="number" readonly value="<?php echo $row['balance'];?>" id="n1"/>
        <input type="number" autocomplete="off" readonly value="0" onchange="calc();" id="n2"/>

        <input type="number"  readonly  name="balance" value="0" id="result"/>
                <input type="submit" name="update" value="تحديث">
               <center><a  id="whatsapp" href="browse-users.php">الصفحة الرئيسيه</a></center> 

            </form>
</div>
  <div class="grid-item"><?php

include 'db.php';
        
$sql = "SELECT * FROM products";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
  
      echo "<table  id='table'>";
      echo "<thead >";
          echo "<tr class='active-row'>";
              
             
              echo "<th>اسم المنتج</th>";
              echo "<th>السعر</th>";
      
              
              echo "<th>خيارات</th>";
              
              echo "<thead>";
        while($row = mysqli_fetch_array($result)){
          
echo        "<thead>"  ;
            echo "<tr class='active-row'>";
               
            
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
             
           
            
           
           echo "<td><button id='add' name='buysell'  value=".$row['price'].">+</button>
           <button  id='delete' name='buysell' value=".$row['price'].">-</button></td>";
            
            
            echo "</tr>";
        }
        echo "</thead>";
        echo "
        </table>";
        // Free result set
        mysqli_free_result($result);
    
    }
    } else{
        echo "No records matching your query were found.";}




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
 </div>


        </div>

    </div>
</body>

  
       
 <script>

$(document).ready(function(){
    // Get value on button click and show alert
    $("button").click(function(e){
        

        var str = parseFloat($(this).val());

        var paid= parseFloat(document.getElementById('n2').value);
        
        

        if(e.target.id=="add")
            document.getElementById('n2').value = paid+str;            
        else
            document.getElementById('n2').value = paid-str;
        
        paid= parseFloat(document.getElementById('n2').value);
        if(paid<0)
        {
            document.getElementById('n2').value=0;
        }

        calc();


        
    });
});



              
function calc()
            {
                var n1 = parseFloat(document.getElementById('n1').value);
                var n2 = parseFloat(document.getElementById('n2').value);
                    document.getElementById('result').value = n1+n2;}
</script>       
              
</html>

