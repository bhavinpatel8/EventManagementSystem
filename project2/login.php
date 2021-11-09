<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link href="login.css" rel="stylesheet">
	<title>Login</title>
</head>
<body id="b">

	<div class="container">
	
		</div class="header">

			<h2>Login</h2>

		</div>

		<form action="registration.php" method="post">

			<div>
				
				<label for="username">username</label>
				<input type="text" name="username" required> 

			</div>


			<div>
				
				<label for="password">Password</label>
				<input type="password" name="password" required> 
				
			</div>


			<button type="submit" name="login_user"> Login </button>

			<p>Not a user? 	<a href="registration.php"><b>Register Here</b></a></p>



		</form>

	</div>

</body>
</html>