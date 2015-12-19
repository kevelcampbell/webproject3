<?php 
	if (isset($_POST['button'])) {
		$dbhost = 'localhost:3036';
		$dbuser = 'Ijah'; 
		$dbpass = 'demo'; 
		$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
		if(! $conn ) { 
		    die('Could not connect: ' . mysql_error("connection fail")); 
		} 
		echo 'Connected successfully<br />'; 
		if(! get_magic_quotes_gpc() ) { 
			$firstname = addslashes ($_POST['firstname']); 
			$lastname = addslashes ($_POST['lastname']); 
			$password = addslashes ($_POST['password']);
			$username = addslashes ($_POST['username']);
		} 
		else { 
			$firstname = ($_POST['firstname']); 
			$lastname =  ($_POST['lastname']); 
			$password =  ($_POST['password']); 
			$username =  ($_POST['username']);
		} 
		$sql = "INSERT INTO user "
		. "(firstname,lastname, password,username) "
		. "VALUES "
		. "($firstname,$lastname,$password,$username)";
        mysql_select_db("MAILBASE");
		$retval = mysql_query( $sql, $conn ); 
		if(! $retval ) { 
		    die('Could not create database: ' . mysql_error("connection fail")); 
		} 
		mysql_close($conn);
	}
?>