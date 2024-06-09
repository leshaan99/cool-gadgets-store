<!DOCTYPE >
<?php
  include("includes/db.php");
  include("functions/functions.php");
?>

<html>
<head>

    <title>Log In | MoMo</title>

        <!-- FONTS -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,100;1,200;1,300;1,500;1,700;1,800&display=swap" rel="stylesheet">
        <!-- CSS FILE -->
            <link rel="stylesheet" href="styles/style.css" media="all">

</head>

<body style="background-image: url('images/bg.jpg');
             background-repeat: no-repeat;
             background-position: center; 
             background-size: cover; 
             height:100%">

<div id="customer_login">	   
	<form  method="post" action="">
    <h1>Log In</h1>
    <input class="login" type="text" name="email" placeholder="Enter Your Email" required>
    <input class="login" type="Password" name="pass"  placeholder="Enter Your Password" required>
    <a class="forgotpw" href="checkout.php?forgot_pass">Forgot Password</a>            
    <input class="loginbtn" type="submit" name="login" value="Log in"/>
    <p class="login_p">don't have an account? <a class="reg_btn" href="customer_register.php"> Register Here</a></p>
    <br><p><a class="reg_btn" href="admin_area/login.php">Log In as Admin</a></p>
  </form>

  <?php
    if(isset($_POST['login'])){
      $c_email=$_POST['email'];
      $c_pass=$_POST['pass'];

      $sel_c="select * from customers where customer_pass='$c_pass' and customer_email='$c_email'";

      $run_c=mysqli_query($con,$sel_c);

      $check_customer=mysqli_num_rows($run_c);

      if($check_customer==0){
        echo "<script>alert('Password or Email Incorrect, Try again..!') </script>";
        exit();
      }
            
      $ip=getIp();
      $sel_cart="select * from cart where ip_add='$ip'";

      $run_cart=mysqli_query($con,$sel_cart);
           
      $check_cart=mysqli_num_rows($run_cart); 

      if($check_customer>0 and $check_cart==0){
        $_SESSION['customer_email']=$c_email;
        echo "<script> alert('You Logged in Successfully..!') </script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
      }
      else{
        $_SESSION['customer_email']=$c_email;
        echo "<script> alert('You logged in Successfully..!') </script>";
        echo "<script>window.open('checkout.php','_self')</script>";
      }
    }
  ?>
</div>

</body>
</html>