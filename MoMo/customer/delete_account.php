<div id="deleteacc">
<form action="" method="post">
	<h1>Do you really want to delete your account?</h1>
	<input class="submitbtn" type="submit" name="yes" value="Yes I am quite Sure" />
  	&emsp;
	<input class="submitbtn" type="submit" name="no" value="No I was out of my Mind"/>
</form>
</div>

<?php
	include("includes/db.php");
	global $con;
	$user=$_SESSION['customer_email'];

	if(isset($_POST['yes'])){
		$delete_customer="delete from customers where customer_email='$user'";
		$run_customer=mysqli_query($con,$delete_customer) or die("Unable to delete");

		echo "<script>alert('We are really sorry,Your account has been deleted.! ');</script>";

		echo "<script>window.open('../index.php','_self')</script>";

		include("logout.php");
	}

	if(isset($_POST['no'])){
		echo "<script>alert('oh!  you scared me..!')</script>";
  		echo "<script>window.open('','_self')</script>";
	}

?>