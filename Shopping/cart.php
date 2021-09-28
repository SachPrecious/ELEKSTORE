<?php
session_start();

require_once("php/CreateDb.php");
require_once("php/component.php");

$db = new CreateDb("elekstore","products");

if(isset($_POST['remove']))
{
   if($_GET['action']=='remove')
   {
       foreach($_SESSION['cart'] as $key=>$value)
       {
           if($value["product_id"]==$_GET['id'])
           {
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed....')</script>";
              echo "<script>window.location='cart.php'</script>";
           }
       }
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    
<?php

require_once('php/header.php');

?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="pl-0 py-5 shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;

               if(isset($_SESSION['cart']))
               {
                $product_id = array_column($_SESSION['cart'],"product_id");

                $result = $db->getData();

                while($row = mysqli_fetch_assoc($result))
                {

                    foreach($product_id as $id)
                    {
                        if($row['product_id']==$id)
                        {
                            cartElement($row['product_image'],$row['product_title'],$row['product_price'],$row['product_id']);

                            $total=$total+(int)$row['product_price'];
                        }

                    }
                }
                
               }else{
                    echo"<h5>Cart is Empty</h5>";
                }


?>

            
            </div>
        </div>

        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

        <div class="pt-4">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="row price-details">
                <div class="col-md-6">
                    <?php
                    if(isset($_SESSION['cart']))
                    {
                        $count =count($_SESSION['cart']);
                        echo "<h6>Price($count items)</h6>";
                    }
                    else
                    {
                        echo "<h6>Price(0 items)</h6>";
                    }

                    ?>
                    <h6>Delivery Charges</h6>
                    <hr>
                    <h6>Amount Payable</h6>


                </div>
                <div class="col-md-6">

                <h6>Rs <?php echo $total ?>/-</h6>
                <h6 class="text-success">FREE</h6>
                <hr>
                <h6>Rs <?php
                echo $total;
                ?>/-</h6>
<!-- -->
                </div>
                <div id="payment-box">
        
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type='hidden' name='business'value='Paypal Ac'>
             
               <input type='hidden'name='amount' value='<?php echo $total ?>'>
                <input type='hidden' name='no_shipping' value='1'> 
                <input type='hidden'name='currency_code' value='USD'>
                
                 <input type='hidden' name='notify_url' value='http://sitename/paypal-payment-gateway-integration-in-php/notify.php'>
            
                    <input type='hidden' name='cancel_return' value='http://sitename/paypal-payment-gateway-integration-in-php/cancel.php'>
            
                    <input type='hidden' name='return'value='http://sitename/paypal-payment-gateway-integration-in-php/return.php'>

                    <input type="hidden" name="cmd" value="_xclick"> 
                    
                    <input class="bg-success text-white" type="submit" name="pay_now" id="pay_now" Value="Pay Now">
        </form>
    </div>

    <!-- -->
            </div>
            

        </div>

        </div>

    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>