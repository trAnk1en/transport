<?php include('../config/constants.php'); ?>

<html>
	<head>
		<meta >
		<title>Login - Logistics System</title>
		<link rel="stylesheet" href="../css/admin.css">
	</head>
	
	<body>
		<div class="login">
			<h1 class="text-center">Login</h1>
			<br> <br>
			
			<?php 
				if(isset($_SESSION['login']))
				{
					echo $_SESSION['login']; 
					unset($_SESSION['login']); 
				}
			?>
			
			<!-- Start Login here -->
			<form action="" method="POST" class="text-center">
			Username: <br>
			<input type="text" name="username" placeholder="Enter Username"><br><br>
			Password: <br>
			<input type="password" name="password" placeholder="Enter Password"><br><br>
				
			<input type="submit" name="submit" value="Login" class="btn-primary">
			</form>
			<!-- End Login here -->
			
			<p class="text-center"> </p>			
		</div>
		
	</body>
</html>

<?php 
	//Check whether the Submit Button is Clicked or not
	if(isset($_POST['submit']))
	{
		//Process for login
		//1. Get the date from login form
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		//2. SQL to check whether the user with username and password exists or not
		$sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
		
		//3. Execute the Query
		$res = mysqli_query($conn, $sql);
		
		//4. Count rows to check whether the user exists or not
		$count=mysqli_num_rows($res);
		
		if($count==1)
		{
			//User vailable and Login Success
			$_SESSION['login'] = "<div class='success text-center'>Login Successfully.</div>";
			//Redirect to Home Page/DashBoard
			header('location:'.SITEURL.'admin/index.php');
		}
		else 
		{
			//User vailable and Login Failed
			$_SESSION['login'] = "<div class='error text-center'>Login Failed.</div>";
			//Redirect to Login Page
			header('location:'.SITEURL.'admin/login.php'); 
		}
	}


?>










