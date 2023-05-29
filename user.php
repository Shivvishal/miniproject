<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$comment = $_POST['comment'];


	if (!empty($username) || !empty($email) || !empty($phone) || !empty($password) ||  !empty($address) ) {
	    $host = "localhost";
	    $dbUsername = "root";
	    $dbPassword =" ";
	    $dbname = "test";
	
	    //create connection
	    $conn = new mysqli("$host", "$dbUsername","$dbPassword"," $dbname");
	    
	    if ($conn->connect_error){
	         die('Connection Failed  :'.$conn->connect_error);
	        
	    } else{
	        $stmt= $conn->prepare("insert into registration(username, email, phone, password, address, comment) values(?, ?, ?, ?, ?, ?)");
	        $stmt->bind_param("ssisss", $username, $email, $phone, $password, $address, $comment );
	        $stmt->execute();
	        echo "<h2> Submit Successfully.....</h2>";
	        $stmt->close();
	        $conn->close();
	        
	    }
	    
	}
	 else {
	    echo "All fields are required";
	    die();
	}
?>