<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<link href="login.css" rel="stylesheet">
	<title>Update Data</title>
</head>
<body id='b'>

	<div class="container">
	
		</div class="header">

			<h2>Update Data</h2>

		</div>

		<form action="update_data.php" method="post">

			<div>
				
				<label for="id">id</label>
				<input type="text" name="id" required> 

			</div>


			<div>
				
				<label for="event_name">Event name</label>
				<input type="text" name="event_name" required> 
				
			</div>


			<div>
				
				<label for="event_location">Event Location</label>
				<input type="text" name="event_location" required> 
				
			</div>


			<button type="submit" name="update"> update </button>

			<p>	<a href="index.php"><b>Return Back</b></a></p>



		</form>

	</div>

</body>
</html>