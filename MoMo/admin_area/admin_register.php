<?php

include("includes/db.php");

if(isset($_POST['submit'])){

    $a_name=$_POST['a_name'];
    $a_email=$_POST['a_email'];
    $a_pass=$_POST['a_pass'];
    $a_image=$_POST['a_image'];

   $select = " SELECT * FROM admins WHERE admin_email = '$a_email' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'admin already exist!';

   }else{

         $insert = "INSERT INTO admins(admin_name, admin_email, password, admin_dp) VALUES('$a_name','$a_email','$a_pass','$a_image')";
         mysqli_query($con, $insert);
         header('location:login.php');
   }

};


?>

<!DOCTYPE html>
<html>
<head>
<title>Register | MoMo</title>
    
    <!-- FONTS -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,100;1,200;1,300;1,500;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS FILE -->
      <link rel="stylesheet" href="styles/style1.css" media="all">

</head>
<body>
   
<div id="admin_reg">

   <form action="" method="post">
      <<h1>Register Now</h1>
     
      <input class="admin_reg" type="text" name="a_name" required placeholder="enter your name">
      <input class="admin_reg" type="email" name="a_email" required placeholder="enter your email">
      <input class="admin_reg" type="text" name="a_pass" required placeholder="enter your password">
      <input class="admin_reg" type="text" name="a_image" required placeholder="enter your image link">

     
      <input class="admin_regbtn" type="submit" name="submit" value="register now" class="form-btn">
      <p class="login_p">already have an account? <a class="admin_regbtn" href="login.php">login now</a>></p>
   </form>

</div>

</body>
</html>