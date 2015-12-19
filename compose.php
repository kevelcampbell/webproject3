<?php
    session_start();
    $dbhost = "localhost";;
    $dbuser = "Ijah";
    $dbpassword = "demo";
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if(isset($_GET["recipient"]) && !empty($_GET["recipient"])){
        $Recipient = $_GET["recipient"];
        $q1 = "SELECT id FROM user WHERE UserName='$Recipient'";
        $rows = $conn->query($q1);
        $rec_id = 0;
        foreach($rows as $row) {
            $rec_id = $row["id"];
        }
        $Subject = $_GET["subject"];
        $Message = $_GET["message"];
        $insert = "INSERT INTO message (body, subject, user_id, recipient_ids) VALUES (:Message,:Subject,:User,:Recipient)";
        $q = $conn->prepare($insert);
        $q->execute(array(':Message'=>$Message, ':Subject'=>$Subject, ':User'=>$_SESSION["id"], ':Recipient'=>$rec_id));   
    }
    exit;
?>