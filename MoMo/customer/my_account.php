<!DOCTYPE >
<?php
    session_start();
    include("functions/functions.php");
?>

<html>
<head>

    <title>My Account | MoMo</title>

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
                <li><a href="MoMo/index.php">HOME</a></li>
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

    <!-- NAVIGATION BAR ENDS HERE -->

    <!-- CONTENT MENU BAR SECTION START HERE -->
        <?php cart(); ?>
            <div id="shopping_cart">
            <!-- CONTENT MENU BAR INLINE CSS -->
            <span style="float: center; font-size: 18px; padding: 10px; line-height: 40px">
            <?php
                if(isset($_SESSION['customer_email']))
                {
                    echo "<b>Welcome &emsp;</b>".$_SESSION['customer_email'];
                }
            ?>

            <?php
                if(!isset($_SESSION['customer_email']))
                {
                    echo "<a href='checkout.php' style='color:red; text-decoration:none;'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Login</a>";
                }

                else
                {
                    echo "<a href='logout.php' style='color:red; text-decoration:none'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Logout</a>";
                }
               ?>
            </span>
            </div> 
    <!-- CONTENT MENU BAR SECTION END HERE -->

<div class="container" style=  "background-image: url('images/bg7.jpg');
                                background-repeat: no-repeat;
                                background-position: center; 
                                background-size: cover; 
                                height:100%">

    <!-- SIDE MENU SECTION START HERE -->
        <div id="sidebar">
			    <div id="sidebar_title">My Account</div>
			        <ul id="cats">
                    <?php
                        $user=$_SESSION['customer_email'];
                        $get_img="select * from customers where customer_email='$user'";
                        $run_img=mysqli_query($con,$get_img);
                        $row_img=mysqli_fetch_array($run_img);
                        $c_image=$row_img['customer_image'];
                        $c_name=$row_img['customer_name'];
                        echo "
                            <p style='text-align:center;'>
                            <img src='customer_images/$c_image' width='150' height='150' />";
                    ?>

			        <li><a href="my_account.php?my_orders">My Orders</a></li>
			        <li><a href="my_account.php?edit_account">Edit Account</a></li>
			        <li><a href="my_account.php?change_pass">Change Password</a></li>
			        <li><a href="my_account.php?delete_account">Delete Account</a></li>
			        </ul>
                </div>
    <!-- SIDE MENU SECTION END HERE -->


    <!-- PRODUCT SECTION START HERE -->
		<div id="products_box" >
            <?php
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['edit_account'])){
                        if(!isset($_GET['change_pass'])){
                            if(!isset($_GET['delete_account'])){
                                echo "<h2> Welcome  $c_name </h2><br>";
                                echo "<b>You Can See Your orders progress by clicking this <a href='my_account.php?my_orders text'>link</a></b>";
			                }
                        }
			        }
                }
            ?>

            <?php
                if(isset($_GET['edit_account'])){
                    include("edit_account.php");
                }

                if(isset($_GET['change_pass'])){
                    include("change_pass.php");
                }

                if(isset($_GET['delete_account'])){
                    include("delete_account.php");
                }
            ?>
		</div>
    <!-- PRODUCT SECTION END HERE -->

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