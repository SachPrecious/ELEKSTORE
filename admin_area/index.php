<?php
session_start();

if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else{
    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is Admin Panel</title>
    <link rel="stylesheet" href="Style/style.css">
    
</head>
<body>
    
   <div class="main_wrapper">

   <div id="header"></div>

   <div id="right">
       <h2 style="text-align: center; color:aliceblue;">Admin Panel</h2>

       <a href="index.php?insert_product" >Insert New Products</a>
       <a href="index.php?view_products" >View All Products</a>
       <a href="index.php?insert_cat" >Insert New Category</a>
       <a href="index.php?insert_brand" >Insert New Brand</a>
       <a href="index.php?view_cats" >View All categories</a>
       <a href="index.php?view_brands" >View All Brands</a>
       <a href="index.php?view_customers" >View Customers</a>

       <a href="index.php?view_orders_bydate" >View Orders by date </a>
       <a href="index.php?view_today_orders" >View Today Orders</a>
      

       <a href="index.php?view_orders" >View Orders</a>
       <a href="index.php?view_payments" >View Payments</a>
       <a href="logout.php" >Admin Logout</a>   

   </div>
     
   
   <div id="left">
       <h2 style="text-align:center;"><?php echo @$_GET['logged_in'];?></h2>
       
   <?php 
   if(isset($_GET['insert_product'])){
       include("insert_product.php");

   }
   if(isset($_GET['view_products'])){
        include("view_products.php");
        
   }
    if(isset($_GET['edit_pro'])){
        include("edit_pro.php");
    
    }

    if(isset($_GET['insert_cat'])){
        include("insert_cat.php");
    
    }
    if(isset($_GET['view_cats'])){
        include("view_cats.php");
    
    }
    if(isset($_GET['edit_cat'])){
        include("edit_cat.php");
    
    }
    if(isset($_GET['insert_brand'])){
        include("insert_brand.php");
    
    }
    if(isset($_GET['view_brands'])){
        include("view_brands.php");
    
    }
    if(isset($_GET['edit_brand'])){
        include("edit_brand.php");
    
    }
    if(isset($_GET['view_customers'])){
        include("view_customers.php");
    
    }
    if(isset($_GET['view_orders'])){
        include("view_orders.php");
    
    }
    if(isset($_GET['view_orders_bydate'])){
        include("view_order_bydate.php");
    
    } if(isset($_GET['view_today_orders'])){
        include("view_today_orders.php");
    
    }

  

   ?>

   </div class>

   </div>



</body>
</html>
<?php
  }
?>