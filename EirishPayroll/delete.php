<?php
  include "connection.php";

  if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "DELETE FROM `employee` WHERE id = '$id'";  
    $run = mysqli_query($con,$query);  
    if ($run) {  
         header('location:employee.php');  
    }else{  
         echo "Error: ".mysqli_error($con);  
    }  
}  
          
     
     
 
?>