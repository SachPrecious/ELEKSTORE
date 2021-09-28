<?php   include("../Functions/functions.php");
session_start();   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELEKSTORE</title>
    <link rel="stylesheet" href="../style_index.css" media="all">
    <link rel="stylesheet" href="../slider/slider_style.css">    
</head>

<body >

<!--    Main container Starts From Herer  -->
   <div class="main_wrapper">
  
           <!--    Header starts Here  -->   
           <!-- <div class="header_wrapper">-->
               <!--<a href="index.php"><img src="Images/Elek.png" alt="" srcset="" id="logo"></a>
               <img src="Images/2.png" alt="" srcset="" id="banner">       -->          
           <!--  </div> -->
           <!--    Header Ends Here  -->    
           <!--    Navigation Bar Starts From Here  -->              
           <div class="menubar">
                          
              <ul id="menu">
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="../Shopping/index.php">All Products</a></li>
                  <li><a href="customer/my_account.php">My Account</a></li>
                  <li><a href="../loginForm.html">Signup</a></li>
                 <!-- <li><a href="">Cart</a></li>-->
                 <li><a href="../Login.php">Login</a></li>
                  <li><a href="#">Contact Us</a></li>
                 
              </ul>  
              <?php

                    if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='Login.php'>Login</a>";
                    }
                    else{
                        echo "<a href='logout.php'>LogOut</a>   
                        ";
                    }  ?>

              <div id="form">
                          <form method="get" action="results.php" enctype="multipart/form-data"> 
                              <input type="text" name="user_query" placeholder="Search a Product"> 
                              <input type="submit" name="search"  value="Search">
                          </form>
              </div>        
                      
           </div>
           <!--    Navigation end Here  -->   

            <div class="">
            <?php
                    //greeting the customer

                    if (isset($_SESSION['customer_email'])) {
                        echo "<b>Welcome</b>".$_SESSION['customer_email'];
                    }  ?> 

                <div id="sidebar">
                        <div id="side_bar_title">My Account </div>                
                    
                          <ul id="cats">
                             
                             <?php

                                $user=$_SESSION['customer_email'];

                                $get_img="select * from customers where customer_email='$user'";

                                $run_img=mysqli_query($con,$get_img);

                                $row_img=mysqli_fetch_array($run_img);

                                $c_image=$row_img['customer_image'];

                                $c_name=$row_img['customer_name'];

                                echo "<img src='customer_images/$c_image' width='150' height='150' style='paddig:4px;'>";

                             
                             
                             ?>

                             <li><a href="my_account.php?my_orders">My Orders</a></li> 
                             <li><a href="my_account.php?my_orders">Edit Account</a></li>
                             <li><a href="my_account.php?my_orders">Change Password</a></li>
                             <li><a href="my_account.php?my_orders">Delete Account</a></li>

                          </ul>
                                                  
                       

                <div id="">
                 <?php  cart();  ?>

                <?php $ip=getIp();  ?>

                   <div id="products_box">
                      
                      


                     <?php
                       if (!isset($_GET['my_orders'])) {

                              if (!isset($_GET['edit_account'])) {

                                if (!isset($_GET['change_pass'])) {



                                    if (!isset($_GET['delete_account'])) {

                                        echo "<h2 style='padding: 20px;'>welcome $c_name; </h2>
                                        <b>See your orders'progress by clicking this</b>
                                        <a href='my_account.php?my_orders'>My Orders</a>

                                        ";
                   


                                  
                                    }



                                  
                                }


                                  
                              }

                       }


                     ?>

                     <?php

                                if (isset($_GET['my_orders'])) {
                                    include("my_orders.php");
                                }

                    ?>


                   </div>
               
                </div>

            </div>

       
         



   </div>
    <!--    Main Container Ends From Here  -->

    










</body>
</html>