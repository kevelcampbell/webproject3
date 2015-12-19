<?php 
if( isset( $_POST['button'] ) ) {
	session_start();
	$dbhost = 'localhost:3036'; 
	$dbuser = 'Ijah'; 
	$dbpass = 'demo'; 
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);  
	if(! $conn ) { 
		die('Could not connect: ' . mysql_error("connection fail")); 
	} 
	if(! get_magic_quotes_gpc() ) {  
		$password = addslashes ($_POST['password']);
		$username = addslashes ($_POST['username']);
	} 
	else {  
		$password =  ($_POST['password']); 
		$username =  ($_POST['username']);
	} 
	$sql = "SELECT * FROM user WHERE UserName = '$username' AND Password = '$password'"; 
	mysql_select_db('MAILBASE'); 
	$retval = mysql_query( $sql, $conn ); 
	if(! $retval ) { 
		die('Could not get data: ' . mysql_error("connection fail"));
	} 
	else if(mysql_num_rows($retval) == 0) {
		echo "<p>Invalid username or password</p>";
		exit;
	}
	else {
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
		    $_SESSION["id"] = $row["id"];
			$_SESSION["firstname"] = $row["FirstName"];
			$_SESSION["lastname"] = $row["LastName"];
			$_SESSION["username"]= $row["UserName"];
			$_SESSION["password"] = $row["Password"]; 
	    } 
	} 
	mysql_close($conn);
 }
?>