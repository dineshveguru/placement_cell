<?php

session_start();
$auth = isset($_SESSION['pl_officer_email'])  && isset($_SESSION['pl_officer_key']) && isset($_SESSION['pl_officer_name']);

include "database/dbconfig.php";
if(!$auth)
{

    header("Location: index.php");
}


?>