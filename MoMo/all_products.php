<!DOCTYPE >
<?php
    session_start();
    include("functions/functions.php");
?>

<html>
<head>

    <title>Home | MoMo</title>

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
        <div style="background-image: url('images/bg1.jpg');
                    background-repeat: no-repeat;
                    background-position: center; 
                    background-size: cover; 
                    height:100%">
        </div> 
    <!-- NAVIGATION BAR ENDS HERE -->


    <!-- CONTENT MENU BAR SECTION START HERE -->
        <div id="shopping_cart">
                <!-- CONTENT MENU BAR INLINE CSS -->
                <span style="float: center; font-size: 18px; padding: 10px; line-height: 40px">
                <b>Welcome ! &emsp;</b>
                <i>Total Items: &emsp;</i>
                <b>Total Price: &emsp;</b>
                <!-- GO TO CART INLINE CSS -->
                <a href="cart.php" style="color: yellow; text-decoration: none">                    
                <i>Cart &emsp;</i></a>
                <!-- &emsp; USED FOR CREATING SPACE -->

                <?php
                    if(!isset($_SESSION['customer_email']))
                    {
                        echo "<a href='checkout.php' style='color:red; text-decoration:none;'>Login</a>";
                    }

                    else
                    {
                        echo "<a href='logout.php' style='color:red; text-decoration:none'>Logout</a>";
                    }
                ?>
                </span>
            </div>
    <!-- CONTENT MENU BAR SECTION END HERE -->

<div class="container">

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


    <!-- PRODUCT SECTION START HERE -->
        <div id="products_box">
			<?php
                global $con;
                $get_pro="select * from products";
                $run_pro=mysqli_query($con,$get_pro);
                while($row_pro=mysqli_fetch_array($run_pro)){
                    $pro_id=$row_pro['product_id'];	
                    $pro_cat=$row_pro['product_cat'];
                    $pro_brand=$row_pro['product_brand'];
                    $pro_title=$row_pro['product_title'];
                    $pro_price=$row_pro['product_price'];
                    $pro_image=$row_pro[5];
                                                       
                    echo "
                        <div id='single_product'>
                            <a href='details.php?pro_id=$pro_id' id='product'>
                                <img src='admin_area/product_images/$pro_image'>
                                <p id='itemtitle'><b>$pro_title</b></p>
                                <p id='itemprice'> &#8377 $pro_price</p>
                                <a href='index.php?pro_id=$pro_id' id='addtocart'>
                                    <button id='cart-btn'>Add to cart</button>
                                </a>
                            </a>
                        </div>
                    ";
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