<?php 
include("includes/db.php");

session_start();
if(!isset($_SESSION['admin_email']))

{
echo "<script> window.open('login.php?not_admin=fuck are not a admin !','_self') </script>";
}

?>

<?php

 $user_id ='';
 $name ='';
 $email ='';
 $user_type ='';

 if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($con, $_GET['user_id']);

    $query = "SELECT * FROM admins WHERE admin_id='$user_id' LIMIT 1";
    $result_set = mysqli_query($con ,$query);

    if ($result_set) {

        if (mysqli_num_rows($result_set)>0) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $user_id100 = $result['admin_id'];
            $name100 = $result['admin_name'];
            $email100 = $result['admin_email'];
            $password100= $result['password'];
           
        }  else {
            // user not found
            header('Location: view_admin.php?err=user_not_found');	
        }
    } else {
        // query unsuccessful
        header('Location: view_admin.php?err=query_failed');
    }
 }

 if(isset($_POST['submit'])) {
    $name111=$_POST['name'];
    $email111=$_POST['email'];
    $password111=$_POST['password'];

    echo $name111;

    //$result_set = mysqli_query($conn, $query);


        // no errors found... adding new record
       // $user_type = mysqli_real_escape_string($con,$user_type11);
        //$id = mysqli_real_escape_string($con, $user_id11);  delete from customers where customer_id='$delete_id'

        $delete_id= $_GET['user_id'];
        $insert = "DELETE FROM admins WHERE admin_id = '$delete_id'";
        mysqli_query($con, $insert);
        header('location:view_admin.php');


        $result = mysqli_query($con, $query);

        if ($result) {
            // query successful... redirecting to users page
            header('Location: view_admin.php?user_modified=true');
        }
        else {
            header('Location: view_admin.php?err=user_not_found');	
        }

}

?>



 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View / Modify User</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<main>


		<form action="" method="post" class="userform">
            <input type="hidden" name="user_id" value="<?php echo $user_id100; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id100; ?>">

            <p>
				<label for="">Name:</label>
				<input type="text" name="name" <?php echo 'value="' . $name100 . '"'; ?> readonly>
			</p>

			<p>
				<label for="">email:</label>
				<input type="text" name="email" <?php echo 'value="' . $email100 . '"'; ?> readonly>
			</p>

            <p>
				<label for="">password:</label>
				<input type="password" name="password" <?php echo 'value="' . $password100 . '"'; ?>  readonly>
			</p>

			
            <select name="user_type" id="btnrole">
                <option value="admin">user</option>
            </select>

            <p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit" id="btnsubmit102">Save</button>
			</p>

			

		</form>

		
		
	</main>
</body>
</html>