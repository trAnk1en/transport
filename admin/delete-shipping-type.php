<?php 

	include('../config/constants.php');

	if(isset($_GET['id']) && isset($_GET['image_name']))
	{
		echo "Process to Delete";
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];
		
		if($image_name!="")
		{
			$path = "../images/type/".$image_name;
			
			$remove = unlink($path);
		
			if($remove==false)
			{
				$_SESSION['upload'] = "<div class='error'>Failed to remove image File</div>";
				header('location:'.SITEURL.'admin/manage-shipping-type.php');
				die();
			}
		}
		
		$sql = "DELETE FROM tbl_shipping_type WHERE id=$id";
		$res = mysqli_query($conn, $sql);
		if($res==true)
		{
			$_SESSION['delete'] = "<div class='success'>Shipping type delete Successfully.</div>";
			header('location:'.SITEURL.'admin/manage-shipping-type.php');
		}
		else
		{
			$_SESSION['delete'] = "<div class='error'>Failed to Delete the Type.</div>";
			header('location:'.SITEURL.'admin/manage-shipping-type.php');
		}
		
	}
	else
	{
		//echo "redirect";
		$_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
		header('location:'.SITEURL.'admin/manage-shipping-type.php');
	}


?>