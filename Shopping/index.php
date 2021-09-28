<?php

//start session
session_start();

require_once("php/CreateDb.php");
require_once('./php/component.php');

//create instance of Createdb class
$database = new CreateDb("elekstore","products");

if (isset($_POST['add'])) {

   // print_r($_POST['product_id']);

   if(isset($_SESSION['cart']))
   {

    $item_array_id = array_column($_SESSION['cart'],"product_id");   
    

    if (in_array($_POST['product_id'],$item_array_id)) {
        echo"<script>alert('Product is already added in the cart...!')</script>";

        echo "<script>window.location='index.php</script>";
        
    }
    else{
        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id'=>$_POST['product_id']
        ) ;

        $_SESSION['cart'][$count] = $item_array;

    }
    

   }
   else
   {
      $item_array = array(
          'product_id'=>$_POST['product_id']
      ) ;
      //create session

      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);


   }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping Cart</title>

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">


</head>
<body>

<?php require_once("php/header.php");?>
    <div class="container">
        <div class="row text-center py-5">
            
        <?php

        $result = $database->getData();

        while ($row = mysqli_fetch_assoc($result)) {

            component($row['product_title'],$row['product_price'],$row['product_image'],$row['product_id']);
            
        }


       ?>

        </div>


    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>