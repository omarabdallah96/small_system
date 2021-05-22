<?php

require 'auth.php';
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>


<link rel="stylesheet" href="css/styletbl.css">

<style type="text/css">
    .dyon{

font-weight: bold;
font-size: 20px;
margin-bottom: 10px;
background: #0984e3;
color: white;



    }
#val{

    margin-top: 122x;
}
body{
background:#dfe6e9;}
</style>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list product</title>
</head>
<body>
<a href="browse-users.php">back</a>
<a href="add_product.php"><img src="images/plus.png"></a>
<?php

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM argile";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
  
        echo "<table  id='table'>";
        echo "<thead>";
            echo "<tr class='active-row'>";
                echo "<th>id</th>";
               
                echo "<th>product name</th>";
                
        
                echo "<th>customer</th>";
                echo "<th>available</th>";

                echo "<th>action</th>";
                
                echo "<thead>";
        while($row = mysqli_fetch_array($result)){
          
echo        "<thead>"  ;
            echo "<tr class='active-row'>";
                echo "<td>" . $row['id_argileh'] . "</td>";
            
                echo "<td>" . $row['name_argileh'] . "</td>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['avalaible'] . "</td>";

            echo '
            
            <td>
            
         <a href="edit_argileh.php?id='.$row['id_argileh'].'"><img id="btn" src="images/edit.png"></a>

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
 
</body>
</html>