<?php

require 'auth.php';
include 'db.php';
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>

<title>لائحة المنتجات</title>
<link rel="stylesheet" href="css/css-grid.css">

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list product</title>
</head>
<body>

<div class="grid-container">
<div class="grid-item"><?php


include 'sidebar.php';
?>
</div>

<div class="grid-item">
<?php

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM products";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
  
        echo "<table  id='table'>";
        echo "<thead>";
            echo "<tr class='active-row'>";
               
                echo "<th>اسم المنتج</th>";
                
        
                echo "<th>السعر</th>";

                echo "<th>تعديل</th>";
                
                echo "<thead>";
        while($row = mysqli_fetch_array($result)){
          
echo        "<thead>"  ;
            echo "<tr class='active-row'>";
            
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
             
            echo '
            
            <td>
            
         <a href="edit_product.php?id='.$row['id_product'].'"><img id="btn" src="images/edit.png"></a>

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
?>
 </div>
 
 </div>
</body>
</html>