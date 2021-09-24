<?php include('partials/menu.php'); ?>

<div class="main-content "> 
	<div class="wrapper">
		<h1>Manage Registration</h1>		
		<br /><br /><br />
				
		<?php
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
		?>
		
				<table class="tbl-full">
					<tr>
						<th>S.N</th>
						<th>Type</th>
						<th>Price</th>
						<th>Order Date</th>
						<th>Status</th>
						<th>Cus Name</th>
						<th>Cus Email</th>
						<th>Cus Phone</th>
						<th>Cus Address</th>
						<th>Delivery Address</th>
						<th>Pro Image</th>
						<th>Pro Weight</th>
						<th>Pro Shape</th>
						<th>Action</th>
						
					</tr>
					
					<?php 
						$sql = "SELECT * FROM tbl_registration";
						$res = mysqli_query($conn, $sql);
						$count = mysqli_num_rows($res);
						$sn = 1;
					
						if($count>0)
						{
							while($row=mysqli_fetch_assoc($res))
							{
								$id = $row['id'];
								$shipping_type = $row['shipping_type'];
								$price = $row['price'];
								$order_date = $row['order_date'];
								$status = $row['status'];
								$full_name = $row['full_name'];
								$email = $row['email'];
								$phone = $row['phone'];
								$address = $row['address'];
								$address2 = $row['delivery_address'];
								$image = $row['image_name2'];
								$weight = $row['weight'];
								$shape = $row['shape'];
								
								?>
								<tr>
									<td><?php echo $sn++; ?> </td>
									<td><?php echo $shipping_type; ?></td>
									<td><?php echo $price; ?></td>	
									<td><?php echo $order_date; ?></td>
									<td><?php echo $status; ?></td>
									<td><?php echo $full_name; ?></td>
									<td><?php echo $email; ?></td>	
									<td><?php echo $phone; ?></td>
									<td><?php echo $address; ?></td>	
									<td><?php echo $address2; ?></td>
									<td>
										<?php 
											if($image!="")
											{
												?>
												<img src="<?php echo SITEURL; ?>images/type/<?php echo $image; ?>" width="100px"> 
												<?php
											}
											else
											{
												echo "<div class='error'>No Image.</div>";
											}
										?>
									</td>
									<td><?php echo $weight; ?></td>
									<td><?php echo $shape; ?></td>
									<td>
										<a href="#" class="btn-secondary">Update</a> 
										<a href="#" class="btn-third">Delete</a> 
									</td>
								</tr>
								<?php 
							}
						}
						else
						{
							echo "<tr><td colspan='12' class='error'>Registration Not Available</td></tr>";
						}
					
					?>
															
		</table>
	</div>
</div>
	
	
<?php include('partials/footer.php'); ?>