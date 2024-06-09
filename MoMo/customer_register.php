<!DOCTYPE >
<?php
  session_start();
  include("functions/functions.php");
  include("includes/db.php");
?>

<html>
<head>
<title>Register | MoMo</title>
    
    <!-- FONTS -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,100;1,200;1,300;1,500;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS FILE -->
      <link rel="stylesheet" href="styles/style.css" media="all">

</head>

<body>

    <!-- NAVIGATION BAR STARTS HERE -->
        <div class="menubar">
            <div class="icon">
                <img  class="logo" src="images/logo.png" alt="">
            </div>
                
            <ul id="menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="all_products.php">ALL PRODUCTS</a></li>
                <li><a href="customer/my_account.php">MY ACCOUNTS</a></li>
                <li><a href="customer_register.php">SIGN UP</a></li>
                <li><a href="cart.php">SHOPPING CART</a></li>
            </ul>
                
            <div id="form">
		        <form method="get" action="results.php" enctype="multipart/form-data">
		            <input class="searchbar" type="text" name="user_query" placeholder="Feel Free To Search" />
		            <input class="btn" type="submit" name="search" value="search" />
		        </form>
            </div>
        </div>
        <div style="background-image: url('images/bg5.jpg');
                    background-repeat: no-repeat;
                    background-position: center; 
                    background-size: cover; 
                    height:100%">
        </div> 
    <!-- NAVIGATION BAR ENDS HERE -->

    <!-- CONTENT MENU BAR SECTION START HERE -->
      <?php cart(); ?>
      <div id=shopping_cart>
      <!-- CONTENT MENU BAR INLINE CSS -->
      <span style="float: center; font-size: 18px; padding: 10px; line-height: 40px">
      <b>Welcome ! &emsp;</b>
      <i>Total Items:<?php total_items(); ?> &emsp;</i>
      <b>Total Price:<?php total_price(); ?>&emsp;</b>
      <!-- GO TO CART INLINE CSS -->
      <a href="cart.php" style="color: yellow; text-decoration: none">                    
      <i>Cart &emsp;</i></a>
      <!-- &emsp; USED FOR CREATING SPACE -->
      </span>
      </div> 

    <!-- CONTENT MENU BAR SECTION END HERE -->

<div class="container" style="background-image: url('images/bg7.jpg');
                              background-repeat: no-repeat;
                              background-position: center;
                              background-size: cover;">

    <!-- SIDE MENU SECTION START HERE -->
      <div id="sidebar">
        <div id="sidebar_title">Categories</div>
          <ul id="cats">
            <?php  getCats();  ?> 
          </ul>

      <div id="sidebar_title">Brands</div>
        <ul id="cats">
          <?php  getBrands();  ?>
        </ul> 
      </div>
    <!-- SIDE MENU SECTION END HERE -->

    <!-- CONTENTS SECTION ENDS HERE -->
       <div id="register">

          <form action="customer_register.php" method="post" enctype="multipart/form-data">
            <h1>Register Now</h1>
              <input class="reg" type="text"  name="c_name" required placeholder="Enter your name">
              <input class="reg" type="text" name="c_email" required placeholder="Enter your email"></td>
              <input class="reg" type="Password" name="c_pass" required placeholder="Enter your password">
              <input class="reg" type="file" name="c_image" required>
              <select class="reg" name="c_country" required="">
            				 	<option>Select a Country</option>
            				 	<option>Sri Lanka</option>
            				 	<option>Australia</option>
            				 	<option>China</option>
            				 	<option>India</option>
            				 	<option>Japan</option>
            				 	<option>Pakistan</option>
            				 	<option>Russia</option>
            				 	<option>Israel</option>
            				 	<option>United Arab Emirates</option>
            				 	<option>United States</option>
            				 	<option>United Kingdom</option>
              </select>
              <input class="reg" type="text" name="c_city" placeholder="Enter your city">
              <input class="reg" type="text" name="c_contact" required placeholder="Enter your contact number">
              <textarea class="reg" cols="20" rows="1" name="c_address" placeholder="Enter your address"></textarea>
              <input class="regbtn" type="submit" name="register" value="Create Account">
          </form>
      </div>
  <!-- CONTENTS SECTION ENDS HERE -->

</div>

    <!-- FOOTER SECTION START HERE -->
    <div id="footer">
            <div class="feature">
                <img class="icon11" src="images/icons/quality-service.png" alt="">
                <div class="FeastureDesc">
                    <p class="FeastureDesc1">High quality</p>
                    <p class="FeastureDesc2">crafted from top materials</p>
                </div>       
            </div>

            <div class="feature">
                <img class="icon11" src="images/icons/warranty.png" alt="">
                <div class="FeastureDesc">
                    <p class="FeastureDesc1">Warrany Protection</p>
                    <p class="FeastureDesc2">Over 2 years</p>
                </div>       
            </div>

            <div class="feature">
                <img class="icon11" src="images/icons/delivery.png" alt="">
                <div class="FeastureDesc">
                    <p class="FeastureDesc1">Free Shipping</p>
                    <p class="FeastureDesc2">Order over 150 $</p>
                </div>       
            </div>

            <div class="feature">
                <img class="icon11" src="images/icons/support.png" alt="">
                <div class="FeastureDesc">
                    <p class="FeastureDesc1">24 / 7 Support</p>
                    <p class="FeastureDesc2">Dedicated support</p>
                </div>
            </div>
    <!-- FOOTER SECTION START HERE -->

</body>
</html>


<?php

 if(isset($_POST['register'])){
  $ip=getIp();

  $c_name=$_POST['c_name'];
  $c_email=$_POST['c_email'];
  $c_pass=$_POST['c_pass'];
  $c_image=$_FILES['c_image']['name'];
  $c_image_tmp=$_FILES['c_image']['tmp_name'];
  $c_country=$_POST['c_country'];
  $c_city=$_POST['c_city'];
  $c_contact=$_POST['c_contact'];
  $c_address=$_POST['c_address'];

  move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

  $insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) 
  values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

  $run_c=mysqli_query($con,$insert_c);

  $sel_cart="select * from cart where ip_add='$ip'";

  $run_cart=mysqli_query($con,$sel_cart);
           
  $check_cart=mysqli_num_rows($run_cart);

  if($check_cart==0){
    $_SESSION['customer_email']=$c_email;
    echo "<script> alert('Account Created Successfully..!') </script>";
    echo "<script>window.open('customer/my_account.php','_self')</script>";
  }
  else
  {
    $_SESSION['customer_email']=$c_email;
    echo "<script> alert('Account Created Successfully..!') </script>";
    echo "<script>window.open('checkout.php','_self')</script>";   
  }
  }
?>