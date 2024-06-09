<?php 
include("includes/db.php");

if(!isset($_SESSION['admin_email']))

{
echo "<script> window.open('login.php?not_admin=fuck are not a admin !','_self') </script>";
}

?>

<?php 
	
	$user_list = '';

	// getting user list
	$query = "SELECT * FROM customers WHERE customer_id>= 0 ";
	$users = mysqli_query($con,$query);
 
	{
		// in here data collected in users store to user one by one
		while ($user = mysqli_fetch_assoc($users)) {
			$user_list .= "<tr align=center>";
			$user_list .= "<td>{$user['customer_name']}</td>";
			$user_list .= "<td>{$user['customer_email']}</td>";
			$user_list .= "<td> <a href=\"edit_admins.php?user_id={$user['customer_id']}\">Edit</a> </td>";
			$user_list .= "</tr>";
		}
	}

     /////////////////////////////////////////

	 $admin_list = '';

	// getting user list
	$query = "SELECT * FROM admins WHERE admin_id>= 0 ";
	$admins = mysqli_query($con,$query);
 
	{
		// in here data collected in users store to user one by one
		while ($admin11 = mysqli_fetch_assoc($admins)) {
			$admin_list .= "<tr align=center>";
			$admin_list .= "<td>{$admin11['admin_name']}</td>";
			$admin_list .= "<td>{$admin11['admin_email']}</td>";
			$admin_list .= "<td> <a href=\"edit_admins11.php?user_id={$admin11['admin_id']}\">Edit</a> </td>";
			$admin_list .= "</tr>";
		}
	}
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
</head>
<body >
	

	<main style="background-color: skyblue">

	
	
	<br><br>
		<table width="1078"  align="center" class="masterlist">
			<<tr align="center">
				<td colspan="6"> <h2><?php echo "Customer list" ?></h2></td>
			</tr>
				<th>name</th>
				<th>email</th>
				<th>Edit</th>
			</tr>
			<?php echo $user_list; ?>
		</table>
		<br>
		<br>
		<br>



	<br><br>
		<table width="1078"  align="center" class="masterlist2">
		<<tr align="center">
				<td colspan="6"> <h2>	<?php echo "Admin list" ?></h2></td>
			</tr>
				<th>name</th>
				<th>email</th>
				<th>Edit</th>
			</tr>

			<?php echo $admin_list; ?>
		</table>
	
	</main>

	
</body>
</html>

