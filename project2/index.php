<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<link href="login.css" rel="stylesheet">
	<title>Home</title>
</head>
<body id=b>

<div class="header">
	<h2>Event Booking System</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>

    	<p><a href="insert_data.php"><b>Insert Event Booking</b></a></p>

    	<p><a href="update_data.php"><b>Update Event</b></a></p>

    	<p><a href="delete_data.php"><b>Delete Event Details</b></a></p>

    	<p><a href="retrieve_data.php"><b>Retrieve Event Data</b></a></p>

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>