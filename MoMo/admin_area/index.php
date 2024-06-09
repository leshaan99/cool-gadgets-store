<?php 
session_start();
if(!isset($_SESSION['admin_email']))
{

echo "<script> window.open('login.php?not_admin=fuck are not a admin !','_self') </script>";


}

else
{


?>

<!DOCTYPE html>
<html>
<head>

    <title>Admin Panel | MoMo</title>

        <!-- FONTS -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,100;1,200;1,300;1,500;1,700;1,800&display=swap" rel="stylesheet">
        <!-- CSS FILE -->
            <link rel="stylesheet" href="styles/style.css">

</head>
<body>


	<div class="main_wrapper">

  
     <div id="header"><h1>Wel Come to Admin Panel</h1></div>

     <div id="right">
     	    <h2 style="text-align: center; color: yellow;">Manage Content</h2>

     	    <a href="index.php?insert_product">Insert Product</a>
     	     <a href="index.php?view_products">View Product</a>
     	      <a href="index.php?insert_cat">Insert New Category</a>
     	       <a href="index.php?view_cats">View All Categories</a>
     	        <a href="index.php?insert_brand">Insert New Brand</a>
     	         <a href="index.php?view_brands">View All Brands</a>
     	          <a href="index.php?view_customers">View Customers</a>
                 <a href="index.php?view_admin">Edit admins</a>
     	             <a href="logout.php">Admin Logout</a>



     </div>

     <div id="left">
      <h2 style="color: red; text-align: center;"> <?php echo @$_GET['logged_in'];   ?> </h2>
     	<?php
               if(isset($_GET['insert_product']))
               {
               	include("insert_product.php");
               }

               if(isset($_GET['view_products']))
               {
               	include("view_products.php");
                }

                if(isset($_GET['edit_pro']))
               {
               	include("edit_pro.php");
               }

                if(isset($_GET['insert_cat']))
               {
                include("insert_cat.php");
               }

                if(isset($_GET['view_cats']))
               {
                include("view_cats.php");
               }

                if(isset($_GET['edit_cat']))
               {
                include("edit_cat.php");
               }

                if(isset($_GET['insert_brand']))
               {
                include("insert_brand.php");
               }

               if(isset($_GET['view_brands']))
               {
                include("view_brands.php");
               }
                
                if(isset($_GET['edit_brand']))
               {
                include("edit_brand.php");
               }

               if(isset($_GET['view_customers']))
               {
                include("view_customers.php");
               }

               if(isset($_GET['view_admin']))
               {
                include("view_admin.php");
               }

     	?>
     </div>


	</div>

</body>
</html>   


<?php } ?>