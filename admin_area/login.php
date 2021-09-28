<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>Login Form</title>
        <link rel="stylesheet" href="Style/login_style.css" media="all"/>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover">Sign Up </h2>
    <br>
<h2 style="color:black; text-align:center;">
    <?php  echo @$_GET['not_admin'];    ?>
</h2>

<br>
<h2 style="color:black; text-align:center;">
    <?php  echo @$_GET['logged_out'];   ?>
</h2>

    <!-- Login Form -->
    <img src="../Images/Elek2.png" alt="" srcset="">
    <h1>Admin Login</h1>
    <form method="post" action="login.php">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email " required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" requireds>
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>

<?php


include("../DatabaseConnection.php");

  if(isset($_POST['login'])){
      $email =mysqli_real_escape_string($con,$_POST['email']);
      $password =mysqli_real_escape_string($con,$_POST['password']);

      $sel_user ="SELECT * FROM admins WHERE user_email='$email' AND user_pass='$password'";
      echo $sel_user;
      $run_user = mysqli_query($con, $sel_user);

      $check_user =mysqli_num_rows($run_user);
      echo $check_user;

      if($check_user==1){
        $_SESSION['user_email']=$email;
        echo "<script>window.open('index.php?logged_in=Login Success','_self')</script>";  

      }else{
        echo "<script>alert('Password or Email is wrong, try again!')</script>";
          
      }
  }



?>