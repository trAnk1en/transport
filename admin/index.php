<?php include('partials/menu.php'); ?>

		<!-- Main Content Section Starts -->
		<div class="main-content "> 
			<div class="wrapper">
				<h1>Dashboard</h1>
				
				<?php 
					if(isset($_SESSION['login']))
					{
						echo $_SESSION['login']; 
						unset($_SESSION['login']); 
					}
				?>
				
				<div class="col-4 text-center">
					<h1>Amin Manage</h1>
					<br />
					Categories
				</div>
				
				<div class="col-4 text-center">
					<h1>Shipping types</h1>
					<br />
					Categories
				</div>
				
				<div class="col-4 text-center">
					<h1>Registration</h1>
					<br />
					Categories
				</div>
				
				<div class="clearfix"></div>
				
			</div>
		</div>
		<!-- Main Content Ends -->
<?php include('partials/footer.php'); ?>