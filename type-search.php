<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
				$ser = $_POST['search'];
			?>
					
            <h2>Type Shipping on Your Search <a href="#" class="text-white">"<?php echo $ser; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">

			<?php 
			
				$ser = $_POST['search'];
			
				$sql = "SELECT * FROM tbl_shipping_type WHERE title LIKE '%$ser%' OR description LIKE '%$ser%' OR price LIKE '%$ser%'";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);
			
				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$id = $row['id'];
						$title = $row['title'];
						$price = $row['price'];
						$description = $row['description'];
						$image_name = $row['image_name'];
						?>
			<h2 class="text-center"><?php echo $title; ?> Service</h2>
						<div class="food-menu-box">
							<div class="food-menu-img">
								<?php
								
								if($image_name=="")
								{
									echo "<div class='error'>Image Not Available.</div>";
								}
								else
								{								
										?>
										<img src="<?php echo SITEURL; ?>images/type/<?php echo $image_name; ?>" alt="Normal Ship" class="img-responsive img-curve">
										<?php
								}
						
								?>	
							</div>

							<div class="food-menu-desc">
								<h4><?php echo $title; ?></h4>
								<p class="food-price"><?php echo $price; ?></p>
								<p class="food-detail"><?php echo $description; ?></p>
								
								<br>

								<a href="#" class="btn btn-primary">Order Now</a>
							</div>
						</div>
			
						<?php
					}
				}
				else
				{
					echo "<div class='error'>Type Not Found.</div>";
				}
			
			?>

            <div class="clearfix"></div>        

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>