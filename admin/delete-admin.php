<?php
	
	//Inclue constants.php file here
	include('../config/constants.php');


	//1. Get the ID of Admin to be delete
	$id = $_GET['id'];
		
	//2. Create SQL Query to Delete Admin
	$sql = "DELETE FROM tbl_admin WHERE id=$id";

	//Execute the Query
	$res = mysqli_query($conn, $sql);

	//Check whether the query executed successfully or not
	if($res==TRUE) 
		{
			//Data Delete
			//echo "Data Delete";
			//Create a Session Variable to Display Message
			$_SESSION['delete'] = "<div class='success'>Admin Delete Successfully.</div>";
			//Redirect Page to Manage Admin
			header("location:".SITEURL.'admin/manage-admin.php');
		}
		else
		{
			//Failed to Delete Data
			//echo "Failed to Delete Data";
			//Create a Session Variable to Display Message
			$_SESSION['delete'] = "<div class='error'>Failed to Delete Amin. Try Again Later!!!.</div>";
			//Redirect Page to Manage Admin
			header("location:".SITEURL.'admin/manage-admin.php');
		}
	
		
	//3. Redirect to manage Admin page with message (success/error)



?>

