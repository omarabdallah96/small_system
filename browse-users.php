<?php
require 'auth.php';
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>لائحة الزبائن</title>
<link rel="stylesheet" href="css/css-grid.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

</style>
</head>
<body>

<div class="grid-container" id=full>
<div class="grid-item" id="sidebar">
  
<?php


include 'sidebar.php';

?>

</div>
  <div class="grid-item" id="all">
  <button id="show">Show</button>

     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="البحث عن اسم زبون">
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<?php
include 'db.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 
// Check connection
if($con=== false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM customer  ORDER BY customer_name";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
  
        echo "<table  id='table'>";
        echo "<thead>";
            echo "<tr class='active-row'>";
               
               
                echo "<th>الاسم الكامل</th>";
             
        
                echo "<th>الحساب</th>";

                echo "<th>خيارات</th>";
                
                echo "<thead>";
        while($row = mysqli_fetch_array($result)){
          
echo        "<thead>"  ;
            echo "<tr class='active-row'>";
               
            
                echo "<td>" . $row['customer_name'] . "</td>";
              
             echo "<td>" . $row['balance'] . "</td>";
          
            echo '
            
            <td>
            <a href="update.php?id='.$row['id'].'"><img id="btn"src="images/plus.png"></a> 
            <a href="whatsapp_send.php?id='.$row['id'].'"><img id="btn" src="images/whatsapp.png"></a>
         <a href="edit_user.php?id='.$row['id'].'"><img id="btn" src="images/edit.png"></a>
         <a href="paid_money.php?id='.$row['id'].'"><img id="btn" src="images/paid.png"></a>

            </td>';
            echo "</tr>";
        }
        echo "</thead>";
        echo "
        </table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?></div>
  

</div>
<script>
            
            var table = document.getElementById("table"), sumVal = 0;
            
            for(var i = 2; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[1].innerHTML);
            }
            
            document.getElementById("val").innerHTML =  sumVal;
            console.log(sumVal);
            
        </script> 
        <script>
$(document).ready(function(){
  $("#hide").click(function(){
    

      document.getElementById("sidebar").style.display = "none";
  document.getElementById("all").style.width = "100%";
    $("div").removeClass("grid-container");

     
  });
  $("#show").click(function(){
    $("#all").show();
      document.getElementById("sidebar").style.display = "block";

   document.getElementById("full").classList.add("grid-container");
;

  });
});
</script>
</body>
</html>
