<?php

  include("../DatabaseConnection.php");
  if(isset($_GET['delete_c'])){
      $delete_id = $_GET['delete_brand'];
      $delete_c = "DELETE FROM customers WHERE customer_id='$delete_id'";
      $run_delete = mysqli_query($con, $delete_c);

      if($run_delete){
          echo "<script>alert('A customer has been deleted!')</script>";

          echo "<script>window.open('index.php?view_customers','_self')</script>";
      }

  }


?>