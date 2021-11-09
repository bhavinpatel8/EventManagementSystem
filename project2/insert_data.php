<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<link href="login.css" rel="stylesheet">
	<title>Insert Event Booking</title>
</head>
<body id=b>

	<div class="container">
	
		</div class="header">

			<h2>Insert Data</h2>

		</div>

		<form action="insert_data.php" method="post">

			<div>
				
				<label for="id">id</label>
				<input type="text" name="id" required> 

			</div>


			<div>
				
				<label for="event_name">event name</label>
				<input type="text" name="event_name" required> 
				
			</div>

			<div>
				
				<label for="event_location">event location</label>
				<input type="text" name="event_location" required> 
				
			</div>

			<div>
				
				<label for="event_date">event date</label>
				<input type="text" name="event_date" required> 
				
			</div>

			<div>
				
				<label for="org_name">org name</label>
				<input type="text" name="org_name" required> 
				
			</div>


			<button type="submit" name="insert"> Insert </button>

			<p>	<a href="index.php"><b>Return Back</b></a></p>



		</form>

	</div>

</body>
</html>