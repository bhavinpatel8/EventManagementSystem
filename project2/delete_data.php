<?php include('server.php') ?>
<!DOCTYPE html>
<html>	
<head>
<link href="login.css" rel="stylesheet">
	<title>Delete Data</title>
</head>
<body id=b>

	<div class="container">
	
		</div class="header">

			<h2>Delete Data</h2>

		</div>

		<form action="delete_data.php" method="post">

			<div>
				
				<label for="id">id</label>
				<input type="text" name="id" required> 

			</div>


			


			<button type="submit" name="delete"> Delete </button>

			<p>	<a href="index.php"><b>Return Back</b></a></p>



		</form>

	</div>

</body>
</html>