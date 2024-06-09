<div id="change_password">
    <form action="" method="post">
        <h1>Change Your Password</h2>

        <input class="change_password" type="password" name="current_pass" placeholder="Enter Current Password" required>
        <input class="change_password" type="password" name="new_pass" placeholder="Enter New Password" required> 
        <input class="change_password" type="password" name="new_pass_again" placeholder="Enter New Password Again" required>   
        <input class="change_password_btn" type="submit" name="change_pass" value="Change Password">
    </form>
</div>  

<?php
    global $con;
    include("includes/db.php");
    if(isset($_POST['change_pass'])){
        $current_pass=$_POST['current_pass'];
        $new_pass=$_POST['new_pass'];
        $new_again=$_POST['new_pass_again'];

        $sel_pass ="select * from customers where customer_pass='$current_pass' and customer_email='$user'";
   
        $run_pass=mysqli_query($con,$sel_pass);

        $check_pass=mysqli_num_rows($run_pass);

    if($check_pass==0){
        echo "<script>alert('Your current password is wrong..!'); </script>";
        exit();
    }

    if($new_pass!=$new_again){
        echo "<script>alert('New Password do not match..!'); </script>";
        exit();
    }

    else{
     	$update_pass="update customers set customer_pass='$new_pass' where customer_email='$user' ";
     	$run_update=mysqli_query($con,$update_pass);

     	echo "<script>alert('Password updated Successfully..!'); </script>";

     	echo "<script>window.open('my_account.php','_self');</script>";
    }
    }
?>


