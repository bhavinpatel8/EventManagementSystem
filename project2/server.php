<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project2');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $phone= mysqli_real_escape_string($db, $_POST['phone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query) or die(mysqli_error($db));
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password, phone) 
  			  VALUES('$username', '$email', '$password', '$phone')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combin ation");
  	}
  }
}


//insert data into db
if (isset($_POST['insert'])) {

	$id = mysqli_real_escape_string($db, $_POST['id']);
	$event_name = mysqli_real_escape_string($db, $_POST['event_name']);
	$event_location = mysqli_real_escape_string($db, $_POST['event_location']);
	$event_date = mysqli_real_escape_string($db, $_POST['event_date']);
	$org_name = mysqli_real_escape_string($db, $_POST['org_name']);

	$query = "INSERT INTO evt (id, event_name, event_location, event_date, org_name) 
  			  VALUES('$id', '$event_name', '$event_location', '$event_date', '$org_name')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "data inserted successfully";
  	  header('location: index.php');
}


//update data in db
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
	$event_location = mysqli_real_escape_string($db, $_POST['event_location']);
	$event_name = mysqli_real_escape_string($db, $_POST['event_name']);

  if (empty($id)) {
  	array_push($errors, "id is required");
  }
  if (empty($event_location)) {
  	array_push($errors, "event_location is required");
  }
  if (empty($event_name)) {
  	array_push($errors, "event_name is required");
  }

  if (count($errors) == 0) {
  	$query = "UPDATE evt SET event_name='$event_name' WHERE id='$id'";
  	$results = mysqli_query($db, $query);
    	$query1 = "UPDATE evt SET event_location='$event_location' WHERE id='$id'";
  	$results1 = mysqli_query($db, $query1);
  	  $_SESSION['success'] = "updated successfully";
  	  header('location: index.php');  
  	
  }
}


//delete data from db
if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);

  if (empty($id)) {
  	array_push($errors, "id is required");
  }
  
 
  if (count($errors) == 0) {
  	$query = "DELETE FROM evt WHERE id='$id'";
    $results = mysqli_query($db, $query);
  	$_SESSION['success'] = "deleted successfully";
  	header('location: index.php');
  
  }
}


//printing table
 if (isset($_POST['retrieve'])) {

        $query = "SELECT * FROM evt";
    $result = mysqli_query($db, $query);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>id---</th><th>event_name---</th><th>event_location--- </th><th>event_date--- </th><th>org_name</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["event_name"]."</td><td>".$row["event_location"]."</td><td>".$row["event_date"]."</td><td>".$row["org_name"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        
}



?>