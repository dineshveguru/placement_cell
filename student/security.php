<?php

session_start();
$auth = isset($_SESSION['student_email'])  && isset($_SESSION['student_key']) && isset($_SESSION['student_name']);

include "database/dbconfig.php";
if(!$auth)
{

    header("Location: index.php");
}


?>