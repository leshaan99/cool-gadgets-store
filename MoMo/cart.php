<!DOCTYPE >
<?php
    session_start();
    include("functions/functions.php");
?>

<html>
<head>

    <title>Cart | MoMo</title>

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
        <div style="background-image: url('images/bg2.jpg');
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
                <i>Total Items:<?php total_items(); ?>&emsp;</i>
                <b>Total Price:<?php total_price(); ?>&emsp;</b>
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

    <!-- CART SECTION START HERE -->
        <div id="cart_box">
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <table align ="center" width="800"  >
                    <tr id="cart_table_head">
                        <th>Remove</th>
                        <th>Product(s)</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                                              
                    <?php
                        $total=0;
						global $con;
						$ip=getIp();
						$sel_price="select * from cart where ip_add='$ip'";
						$run_price=mysqli_query($con,$sel_price);

						while($p_price=mysqli_fetch_array($run_price)){
							$pro_id=$p_price['p_id'];
                            global $qty;           //for test purpose
                            $qty=$p_price['qty'];  //for test purpose
                                 
														      
							$pro_price="select * from products where product_id='$pro_id'";
							$run_pro_price=mysqli_query($con,$pro_price);
														       
							while($pp_price=mysqli_fetch_array($run_pro_price)){
                                $product_price=array($pp_price['product_price']);
								$product_title=$pp_price['product_title']; 
								$product_image=$pp_price['product_image'];
								$single_price=$pp_price['product_price'];

								$values=array_sum($product_price);
								$total +=$values;   //echo " &#8377 $total";  
                    ?>

                    <tr align="center" id="cart_table_body">
                        <td><br><br><br><input type="checkbox"  name="remove[]" value="<?php echo $pro_id; ?>"></td>
                        <td><br><br><img src="admin_area/product_images/<?php echo "$product_image"  ?>" width="80" height="80" />
                            <br><?php echo "$product_title"; ?></td>
                        <td><br><br><br><input type="number"  name="qty" min="1" size="" value="<?php echo 'SESSION["qty"]'; ?>" /></td>
                                                       
                        <?php
                            if(isset($_POST['update_cart'])){    // used for updating quantity in the cart table.
                                $qty=$_POST['qty'];
                                $update_qty="update cart set qty='$qty'"; 
                                $run_qty=mysqli_query($con,$update_qty);
                                                                    
                                $_SESSION['qty']=$qty;
                                (int)$total=(int)$total* (int)$qty;
                                (int)$single_price=(int)$single_price* (int)$qty;
                            } 
                        ?>

                        <td><br><br><br><?php echo "&#8377 $single_price";  ?><br></td>
                    </tr>

                        <?php  } }  ?>  

                    <tr align="center" id="cart_table_body"> 
                        <td align="right" colspan="3"><br><br><br><b>Sub Total: </b></td>
                        <td><br><br><br><?php echo " &#8377 $total";  ?></td>
                    </tr>
                </table>

                <div class="cart-tbl-btn">
                    <input type="submit" name="update_cart" value="Update Cart" id="cart-tbl-btn">
                    <input type="submit" name="continue" value="Continue Shopping" id="cart-tbl-btn">
                    <button id="cart-tbl-btn" ><a  href="checkout.php" style="text-decoration: none;">Checkout</a></button>
                </div>
            </form>

            <?php           //function updatecart()
                global $con;          // used for removing the item from cart
                $ip=getIp();
                if(isset($_POST['update_cart'])){  
                    if(isset($_POST['remove'])){
                        foreach ($_POST['remove'] as $remove_id){
                            $delete_product= "delete from cart where p_id='$remove_id' and ip_add='$ip'";
                            $run_delete=mysqli_query($con,$delete_product) or die("query didn't worked");
                            if($run_delete){
                                echo "<script> window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
                                            
                if(isset($_POST['continue'])){           // used for redirecting to main page(index.php) from the cart page(cart.php).
                    echo "<script>window.open('index.php','_self')</script>";
                }           //echo @$up_cart=updatecart();   
            ?>
        </div>
    <!-- CART SECTION END HERE -->

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