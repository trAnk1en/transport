<?php include('partials-front/menu.php'); ?>	

<?php 
	if(isset($_GET['shipping_type_id']))
	{
		$shipping_type_id = $_GET['shipping_type_id'];
		
		$sql = "SELECT * FROM tbl_shipping_type WHERE id=$shipping_type_id";
		$res = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($res);
		
		if($count==1)
		{
			$row = mysqli_fetch_assoc($res);
			$title = $row['title'];
			$price = $row['price'];
			$image_name = $row['image_name'];
			$description = $row['description'];
		}
		else
		{	
			header('location:'.SITEURL);
		}
	}
	else
	{
		header('loction:'.SITEURL);
	}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your Registration.</h2>
			
			<?php
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
			?>

            <form action="" method="POST" enctype="multipart/form-data" class="order">
                <fieldset>
                    <legend>Selected Shipping Type</legend>

                    <div class="food-menu-img">
						<?php 						
							if($image_name=="")
							{
								echo "<div class='error'>Image Not Available.</div>";
							}
							else
							{
								?>
								<img src="<?php echo SITEURL; ?>images/type/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
								<?php 
							}						
						?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
						<input type="hidden" name="shipping_type" value="<?php echo $title; ?>">
						
                        <p class="food-price">$<?php echo $price; ?></p>
						<input type="hidden" name="price" value="<?php echo $price; ?>">    
						
						<p class="food-price">$<?php echo $description; ?></p>
						<input type="hidden" name="description" value="<?php echo $description; ?>">   
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="phone" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
					
					<div class="order-label">Delivery Address</div>
                    <textarea name="delivery_address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
					
					<div class="order-label">Product's Weight</div>
                    <input type="text" name="weight" placeholder="gam, kg, tons" class="input-responsive" required>
					
					<div class="order-label">Product's Shape</div>
                    <input type="text" name="shape" placeholder="A circle or A square, ..." class="input-responsive" required>
					
					<div class="order-label">Product's Image</div>
                    <input type="file" name="image2" placeholder="Put Product's Image In" class="input-responsive" required>

                    <input type="submit" name="submit" value="Registration Confirm" class="btn btn-primary">
                </fieldset>

            </form>
			
			<?php 
			
			if(isset($_POST['submit']))
			{
				$shipping_type = $_POST['shipping_type'];
				$price = $_POST['price'];
				
				$order_date = date("Y-m-d h:i:sa");
				
				$status = "Registered";
				
				$full_name = $_POST['full_name'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$delivery_address = $_POST['delivery_address'];
				$weight = $_POST['weight'];
				$shape = $_POST['shape'];
				
				if(isset($_FILES['image2']['name']))
				{
					$image_name2 = $_FILES['image2']['name'];
					
					if($image_name2!="")
					{
						//$ext = end(explode('.', $image_name2));
						
						//$image_name2 = "Shipping-Type-".rand(0000,9999).".".$ext; //New image name maybe "Shipping-Type-9.jpg"
											
						$src = $_FILES['image2']['tmp_name'];
						
						$dst = "images/type/".$image_name2;

						$upload = move_uploaded_file($src, $dst);
						
						if($upload==false)
						{
							$_SESSION['upload'] = "<div class='error'>Failed to Upload image.</div>";
							//header('location:'.SITEURL.'registration-shipping.php');
							die();
								
						}
					}
					
				}
				else
				{
					$image_name2 = ""; //Setting Default Value as Blank
				}
				
				$sql2 = "INSERT INTO `tbl_registration`(`full_name`, `email`, `phone`, `address`, `image_name2`, `weight`, `shape`, `shipping_type`, `order_date`, `status`, `delivery_address`,`price`) VALUES ('$full_name','$email','$phone','$address','$image_name2','$weight','$shape','$shipping_type','$order_date','$status','$delivery_address','$price')";
				
				//echo $sql2;
				$res2 = mysqli_query($conn, $sql2);
				if($res2==true)		
				{
					$_SESSION['registration'] = "<div class='success'>Registration Successfully.</div>";
					//header('logistics/index.php');
				}
				else
				{
					$_SESSION['registration'] = "<div class='error'>Registration Failed.</div>";
					//header('logistics/index.php');
				}
				
			}
						
	?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

   <?php include('partials-front/footer.php'); ?>


