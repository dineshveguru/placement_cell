<?php

session_start();
$auth = isset($_SESSION['dept_incharge_email'])  && isset($_SESSION['dept_incharge_key']) && isset($_SESSION['dept_incharge_name']);

include "database/dbconfig.php";
if(!$auth)
{

    header("Location: index.php");
}


?>