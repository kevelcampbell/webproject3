<?php
echo $_SESSION["first_name"];
session_start();
if(session_destroy()) {
    header("Location: index.html");
}
?>