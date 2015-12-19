<?php
  $dbhost = "localhost";
  $dbuser = "Ijah";
  $dbpass = "demo";
  $connection =  mysql_connect($dbhost,$dbuser,$dbpass);
  $database = mysql_select_db("MAILBASE",$connection);
  error_reporting(E_ERROR | E_PARSE);
  $id = $_GET["id"];
  $q = "SELECT * FROM message WHERE id = '$id' ";
  $rows = mysql_query($q);
  $sender = 0;
  $name = "";
  $reader = "";
  while($row = mysql_fetch_array($rows)){
     $sender = $row["user_id"];
     $subject = $row["subject"];
     $body = $row["body"];
     $reader  = $row["recipient_ids"];
  }
  $query = "SELECT * FROM user WHERE id = '$sender' ";
  $values = mysql_query($query);
  while($value = mysql_fetch_array($values)){
    $name = $value["FirstName"] . " " . $value["LastName"];
  }
  $today = getdate();
  $date = $today['mday'].'/'.$today['mon'].'/'.$today['year'];
  echo"<h3>From: $name</h3>
       <h2>$subject</h2>
       <p>$body</p>";
  $readMessagesQuery = "SELECT * FROM message_read WHERE message_id = '$id' AND reader_ids = '$reader'";
  $readMessages = mysql_query($readMessagesQuery);
  if( mysql_num_rows($readMessages) == 0){
      $connection = mysql_connect($dbhost,$dbuser,$dbpass);
      $newReadMessage = "INSERT INTO message_read (message_id, reader_id, date) VALUES (:message_id,:reader_id,:date)";
      $query = $connection->prepare($newReadMessage);
      $query->execute(array(':message_id'=>$id,':reader_id'=>$reader,':date'=>$date));
  }
       
  exit;
?>