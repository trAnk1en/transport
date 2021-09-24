<?php
	//Include Constants File
	include('../config/constants.php');

	//echo "Delete Page";
	//Check whether the id and image_name value is set or not
	if(isset($_GET['id']) AND isset($_GET['image_name']))
	{
		//Get the value and Delete
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];
		
		//REmove the physical image file is available
		if($image_name!="")
		{
			//Image is available. Soremove it
			$path = "../images/category/".$image_name;
			//Remove the image
			$remove = unlink($path);
			
			//If failed to remove image then add an error message and stop the process
			if($remove==false)
			{
				//Set the Session Message
				$_SESSION['remove'] = "<div class='error'>Fail to remove Category image.</div>";
				//Redirect to Manage Category page
				header('location:'.SITEURL.'admin/manage-category.php');
				//Stop the process
				die();
			}
		}
		
		//Delete Data from Database
		//SQL Query to Delete data from database
		$sql = "DELETE FROM tbl_category WHERE id=$id";
		
		//Execute the Query
		$res = mysqli_query($conn, $sql);
		
		//Check whether the data is delete from databse or not
		if($res==true)
		{
			//Set success Message adn Redirect
			$_SESSION['delete'] = "<div class='success'>Category Delete successfully.</div>";
			//Redirect to Manage Category
			header('location:'.SITEURL.'admin/manage-category.php');
		}
		else
		{
			//SET fail message adn redirect
			$_SESSION['delete'] = "<div class='error'>Category Delete Failed.</div>";
			//Redirect to Manage Category
			header('location:'.SITEURL.'admin/manage-category.php');				
		}
		
		//Redirect to Manage Category Page with Message
	}
	else
	{
		//Redirect to Manage Category Page
		header('location:'.SITEURL.'admin/manage-category.php');
	}

?>